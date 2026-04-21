<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('blogs', 'slug')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('slug')->nullable()->unique()->after('id');
            });
        }

        // Generate slugs for existing blogs using translations
        $blogs = DB::table('blogs')->get();
        foreach ($blogs as $blog) {
            $translation = DB::table('blog_translations')
                ->where('blog_id', $blog->id)
                ->first();
            $title = $translation->title ?? 'blog';
            $slug = Str::slug($title);
            if (empty($slug)) {
                $slug = Str::slug(Str::transliterate($title));
            }
            if (empty($slug)) {
                $slug = 'blog-' . $blog->id;
            }
            $count = DB::table('blogs')->where('slug', $slug)->where('id', '!=', $blog->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . $blog->id;
            }
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
