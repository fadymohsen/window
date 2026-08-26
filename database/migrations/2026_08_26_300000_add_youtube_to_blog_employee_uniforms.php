<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')
            ->where('slug', 'employee-uniforms-corporate-identity-printing')
            ->first();

        if (!$blog) {
            return;
        }

        $videoEmbed = <<<'HTML'
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

        foreach (['ar', 'en'] as $locale) {
            $translation = DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', $locale)
                ->first();

            if ($translation && $translation->description) {
                DB::table('blog_translations')
                    ->where('blog_id', $blog->id)
                    ->where('locale', $locale)
                    ->update([
                        'description' => $videoEmbed . $translation->description,
                    ]);
            }
        }
    }

    public function down(): void
    {
        $blog = DB::table('blogs')
            ->where('slug', 'employee-uniforms-corporate-identity-printing')
            ->first();

        if (!$blog) {
            return;
        }

        $embedStart = '<div style="display:flex;justify-content:center;margin:0 0 32px;">';
        $embedEnd   = "</div>\n\n";

        foreach (['ar', 'en'] as $locale) {
            $translation = DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->where('locale', $locale)
                ->first();

            if ($translation && $translation->description) {
                $description = $translation->description;
                if (str_starts_with($description, $embedStart)) {
                    $description = substr($description, strpos($description, $embedEnd) + strlen($embedEnd));
                    DB::table('blog_translations')
                        ->where('blog_id', $blog->id)
                        ->where('locale', $locale)
                        ->update(['description' => $description]);
                }
            }
        }
    }
};
