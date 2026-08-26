<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'employee-uniforms-corporate-identity-printing';

    private string $videoEmbed = <<<'HTML'
<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/lxiBowyqGgw" title="Window Advertising Agency"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
</div>
HTML;

    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        foreach (['ar', 'en'] as $locale) {
            $this->fixVideoPosition($blog->id, $locale);
        }
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        foreach (['ar', 'en'] as $locale) {
            $translation = DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', $locale)
                ->first();

            if ($translation && str_contains($translation->description, $this->videoEmbed)) {
                DB::table('blog_translations')
                    ->where('blog_id', $blog->id)
                    ->where('locale', $locale)
                    ->update([
                        'description' => str_replace("\n\n" . $this->videoEmbed, '', $translation->description),
                    ]);
            }
        }
    }

    private function fixVideoPosition(int $blogId, string $locale): void
    {
        $translation = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->first();

        if (!$translation) {
            return;
        }

        // Strip any previously prepended video embed (from migration 300000)
        $description = $translation->description;
        $description = preg_replace(
            '~<div[^>]*display:flex[^>]*>.*?</div>\s*\n*~s',
            '',
            $description
        );
        $description = trim($description);

        // Skip if video already correctly placed
        if (str_contains($description, 'youtube.com/embed/lxiBowyqGgw')) {
            DB::table('blog_translations')
                ->where('blog_id', $blogId)
                ->where('locale', $locale)
                ->update(['description' => $description]);
            return;
        }

        // Insert video after the first closing tag (same logic as national-day-96)
        $updated = $description;
        if (preg_match('/^<([a-zA-Z0-9]+)[^>]*>/', $description, $matches)) {
            $tag        = $matches[1];
            $closingTag = "</{$tag}>";
            $closingPos = strpos($description, $closingTag);

            if ($closingPos !== false) {
                $insertAt = $closingPos + strlen($closingTag);
                $updated  = substr($description, 0, $insertAt)
                    . "\n\n" . $this->videoEmbed
                    . substr($description, $insertAt);
            }
        }

        DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->update(['description' => $updated]);
    }
};
