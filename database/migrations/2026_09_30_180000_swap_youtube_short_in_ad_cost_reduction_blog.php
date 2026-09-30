<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'reduce-advertising-costs-large-companies';
    private string $oldVideoId = 'L3VjGgSP9_o';
    private string $newVideoId = 'YCK9u3w7qhE';

    public function up(): void
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

            if ($translation && str_contains($translation->description, $this->oldVideoId)) {
                DB::table('blog_translations')
                    ->where('blog_id', $blog->id)
                    ->where('locale', $locale)
                    ->update([
                        'description' => str_replace($this->oldVideoId, $this->newVideoId, $translation->description),
                    ]);
            }
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

            if ($translation && str_contains($translation->description, $this->newVideoId)) {
                DB::table('blog_translations')
                    ->where('blog_id', $blog->id)
                    ->where('locale', $locale)
                    ->update([
                        'description' => str_replace($this->newVideoId, $this->oldVideoId, $translation->description),
                    ]);
            }
        }
    }
};
