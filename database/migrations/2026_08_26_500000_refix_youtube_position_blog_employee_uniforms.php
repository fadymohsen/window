<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'employee-uniforms-corporate-identity-printing';

    private string $newEmbed = <<<'HTML'
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
            $this->fixVideo($blog->id, $locale);
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

            if (!$translation) {
                continue;
            }

            $description = str_replace("\n\n" . $this->newEmbed, '', $translation->description);

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', $locale)
                ->update(['description' => $description]);
        }
    }

    private function fixVideo(int $blogId, string $locale): void
    {
        $translation = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->first();

        if (!$translation) {
            return;
        }

        $description = $translation->description;

        // Strip anything before <blockquote> (stray divs left by previous migrations)
        $blockquotePos = strpos($description, '<blockquote>');
        if ($blockquotePos !== false && $blockquotePos > 0) {
            $description = substr($description, $blockquotePos);
        }

        // Remove any existing YouTube embeds inside the content
        $description = preg_replace('~\n*<div[^>]*lxiBowyqGgw[^>]*>.*?</div>\s*</div>~s', '', $description);
        $description = preg_replace('~\n*<div[^>]*max-width:\s*360px[^>]*>.*?</div>\s*</div>~s', '', $description);

        // Skip if the embed is already correctly placed
        if (str_contains($description, 'lxiBowyqGgw')) {
            DB::table('blog_translations')
                ->where('blog_id', $blogId)
                ->where('locale', $locale)
                ->update(['description' => $description]);
            return;
        }

        // Insert after first </blockquote>
        $closingTag = '</blockquote>';
        $pos = strpos($description, $closingTag);

        if ($pos !== false) {
            $insertAt   = $pos + strlen($closingTag);
            $description = substr($description, 0, $insertAt)
                . "\n\n" . $this->newEmbed
                . substr($description, $insertAt);
        }

        DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->update(['description' => $description]);
    }
};
