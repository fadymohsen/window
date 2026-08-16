<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

return new class extends Migration
{
    private string $slug = 'flags-design-manufacturing-saudi-arabia-window';
    private string $coverPath = 'blogs/covers/flags-design-manufacturing-saudi-arabia-window.webp';

    private string $videoEmbed = <<<'HTML'
<div style="max-width: 360px; margin: 24px auto;">
    <div style="position: relative; padding-bottom: 177.78%; height: 0; border-radius: 12px; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/b2Pli6mQmTg" title="Window Advertising Agency"
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

        $this->updateCover($blog->id);
        $this->insertVideoAfterFirstComponent($blog->id, 'ar');
        $this->insertVideoAfterFirstComponent($blog->id, 'en');
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        if ($blog->cover === $this->coverPath) {
            DB::table('blogs')->where('id', $blog->id)->update(['cover' => 'blogs/covers/placeholder-flags.webp']);
        }

        $fullPath = storage_path('app/public/' . $this->coverPath);
        if (is_file($fullPath)) {
            unlink($fullPath);
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

    private function updateCover(int $blogId): void
    {
        $source = base_path('resources/blog-assets/flags-design-manufacturing-saudi-arabia-window.jpg');
        if (!is_file($source)) {
            return;
        }

        $destination = storage_path('app/public/' . $this->coverPath);
        if (!is_dir(dirname($destination))) {
            mkdir(dirname($destination), 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($source)
            ->scale(height: 450)
            ->encode(new AutoEncoder('webp', quality: 75))
            ->save($destination);

        DB::table('blogs')->where('id', $blogId)->update(['cover' => $this->coverPath]);
    }

    private function insertVideoAfterFirstComponent(int $blogId, string $locale): void
    {
        $translation = DB::table('blog_translations')
            ->where('blog_id', $blogId)
            ->where('locale', $locale)
            ->first();

        if (!$translation || str_contains($translation->description, 'youtube.com/embed/b2Pli6mQmTg')) {
            return;
        }

        $description = trim($translation->description);
        $updated = $this->videoEmbed . $description;

        if (preg_match('/^<([a-zA-Z0-9]+)[^>]*>/', $description, $matches)) {
            $tag = $matches[1];
            $closingTag = "</{$tag}>";
            $closingPos = strpos($description, $closingTag);

            if ($closingPos !== false) {
                $insertAt = $closingPos + strlen($closingTag);
                $updated = substr($description, 0, $insertAt)
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
