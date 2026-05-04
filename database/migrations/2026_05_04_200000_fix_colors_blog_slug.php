<?php

use App\Models\SlugRedirect;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $oldSlug = 'httpswindowadvcomarblogscolors-in-printing-and-advertising';
        $newSlug = 'colors-in-printing-and-advertising';

        $blog = DB::table('blogs')->where('slug', $oldSlug)->first();

        if (!$blog) {
            return;
        }

        DB::table('blogs')
            ->where('id', $blog->id)
            ->update(['slug' => $newSlug]);

        // Add redirect from old slug to new slug
        DB::table('slug_redirects')->updateOrInsert(
            ['from_slug' => $oldSlug, 'type' => 'blog'],
            ['to_slug' => $newSlug, 'updated_at' => now(), 'created_at' => now()],
        );
    }

    public function down(): void
    {
        // No rollback needed
    }
};
