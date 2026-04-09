<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Blog;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });

        // Generate slugs for existing blogs
        foreach (Blog::all() as $blog) {
            $slug = Str::slug($blog->title);
            // Ensure uniqueness
            $count = Blog::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . $blog->id;
            }
            $blog->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
