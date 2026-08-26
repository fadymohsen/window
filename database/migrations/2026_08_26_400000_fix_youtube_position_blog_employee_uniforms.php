<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'employee-uniforms-corporate-identity-printing';

    // Exact embed added by migration 300000 (prepended at top)
    private string $oldEmbed = <<<'HTML'
<div style="display:flex;justify-content:center;margin:0 0 32px;">
  <div style="position:relative;width:100%;max-width:340px;aspect-ratio:9/16;border-radius:14px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.15);">
    <iframe
      src="https://www.youtube.com/embed/lxiBowyqGgw?rel=0&playsinline=1"
      title="يونيفورم الموظفين وطباعة الهوية — وكالة ويندو للدعاية والإعلان"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen
      loading="lazy"
      style="position:absolute;top:0;left:0;width:100%;height:100%;">
    </iframe>
  </div>
</div>

HTML;

    // New embed placed after the first </blockquote>
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
            $this->moveVideo($blog->id, $locale);
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

            // Remove the repositioned embed, then re-prepend the old one
            $description = str_replace("\n\n" . $this->newEmbed, '', $translation->description);
            $description = $this->oldEmbed . $description;

            DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', $locale)
                ->update(['description' => $description]);
        }
    }

    private function moveVideo(int $blogId, string $locale): void
    {
        $translation = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->first();

        if (!$translation) {
            return;
        }

        $description = $translation->description;

        // 1. Remove the old prepended embed (exact string match from migration 300000)
        $description = str_replace($this->oldEmbed, '', $description);
        $description = ltrim($description);

        // 2. Skip if new embed already in place
        if (str_contains($description, $this->newEmbed)) {
            DB::table('blog_translations')
                ->where('blog_id', $blogId)
                ->where('locale', $locale)
                ->update(['description' => $description]);
            return;
        }

        // 3. Insert new embed after the first </blockquote>
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
