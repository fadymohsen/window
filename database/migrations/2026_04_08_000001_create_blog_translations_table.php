<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->unique(['blog_id', 'locale']);
        });

        // Migrate existing blog data to translations as Arabic
        $blogs = DB::table('blogs')->get();
        foreach ($blogs as $blog) {
            DB::table('blog_translations')->insert([
                'blog_id' => $blog->id,
                'locale' => 'ar',
                'title' => $blog->title,
                'description' => $blog->description,
                'keywords' => $blog->keywords,
                'meta_title' => $blog->meta_title ?? null,
                'meta_description' => $blog->meta_description ?? null,
            ]);
        }

        // Drop old columns from blogs table
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'keywords', 'meta_title', 'meta_description']);
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->text('keywords')->nullable()->after('description');
            $table->string('meta_title')->nullable()->after('keywords');
            $table->text('meta_description')->nullable()->after('meta_title');
        });

        // Restore Arabic translations back to blogs table
        $translations = DB::table('blog_translations')->where('locale', 'ar')->get();
        foreach ($translations as $translation) {
            DB::table('blogs')->where('id', $translation->blog_id)->update([
                'title' => $translation->title,
                'description' => $translation->description,
                'keywords' => $translation->keywords,
                'meta_title' => $translation->meta_title,
                'meta_description' => $translation->meta_description,
            ]);
        }

        Schema::dropIfExists('blog_translations');
    }
};
