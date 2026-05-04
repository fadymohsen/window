<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Fix all blog translations that have /contact" instead of /contacts"
        DB::table('blog_translations')
            ->where('description', 'like', '%/ar/contact"%')
            ->update([
                'description' => DB::raw("REPLACE(description, '/ar/contact\"', '/ar/contacts\"')"),
            ]);

        DB::table('blog_translations')
            ->where('description', 'like', '%/en/contact"%')
            ->update([
                'description' => DB::raw("REPLACE(description, '/en/contact\"', '/en/contacts\"')"),
            ]);
    }

    public function down(): void
    {
        // No rollback needed
    }
};
