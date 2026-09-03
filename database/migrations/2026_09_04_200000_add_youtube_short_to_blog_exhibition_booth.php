<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'exhibition-booth-manufacturing-saudi-arabia-window';

    private string $videoEmbed = <<<'HTML'
<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/B54k2PmfWYQ" title="Window Advertising Agency"
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
            $this->insertVideoAfterFirstComponent($blog->id, $locale);
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
                    ->update(['description' => str_replace($this->videoEmbed, '', $translation->description)]);
            }
        }
    }

    private function insertVideoAfterFirstComponent(int $blogId, string $locale): void
    {
        $translation = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->first();

        if (!$translation || str_contains($translation->description, 'youtube.com/embed/B54k2PmfWYQ')) {
            return;
        }

        $description = trim($translation->description);
        $updated = $this->videoEmbed . "\n\n" . $description;

        // Insert before the second <h2> (after hero + first component)
        if (preg_match_all('/<h2[^>]*>/', $description, $matches, PREG_OFFSET_CAPTURE) && isset($matches[0][1])) {
            $insertAt = $matches[0][1][1];
            $updated = substr($description, 0, $insertAt)
                . $this->videoEmbed . "\n\n"
                . substr($description, $insertAt);
        }

        DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->update(['description' => $updated]);
    }
};
