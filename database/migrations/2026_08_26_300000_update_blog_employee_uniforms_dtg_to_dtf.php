<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', 'employee-uniforms-corporate-identity-printing')->first();
        if (!$blog) {
            return;
        }

        $translations = DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->get();

        foreach ($translations as $translation) {
            DB::table('blog_translations')
                ->where('id', $translation->id)
                ->update([
                    'description' => str_replace('DTG', 'DTF', $translation->description),
                    'keywords'    => str_replace('DTG', 'DTF', $translation->keywords),
                ]);
        }
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', 'employee-uniforms-corporate-identity-printing')->first();
        if (!$blog) {
            return;
        }

        $translations = DB::table('blog_translations')
            ->where('blog_id', $blog->id)
            ->get();

        foreach ($translations as $translation) {
            DB::table('blog_translations')
                ->where('id', $translation->id)
                ->update([
                    'description' => str_replace('DTF', 'DTG', $translation->description),
                    'keywords'    => str_replace('DTF', 'DTG', $translation->keywords),
                ]);
        }
    }
};
