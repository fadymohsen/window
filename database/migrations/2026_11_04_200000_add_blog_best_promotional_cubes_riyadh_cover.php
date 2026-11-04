<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'best-promotional-cubes-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }

        $source = resource_path('blog-assets/best-promotional-cubes-riyadh-window.png');
        $dest   = storage_path('app/public/blogs/covers/best-promotional-cubes-riyadh-window.png');

        if (File::exists($source)) {
            File::ensureDirectoryExists(dirname($dest));
            File::copy($source, $dest);

            DB::table('blogs')->where('id', $blog->id)->update([
                'cover'      => 'blogs/covers/best-promotional-cubes-riyadh-window.png',
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        $slug = 'best-promotional-cubes-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blogs')->where('id', $blog->id)->update([
                'cover'      => 'blogs/covers/placeholder-best-promotional-cubes-riyadh.webp',
                'updated_at' => now(),
            ]);

            $dest = storage_path('app/public/blogs/covers/best-promotional-cubes-riyadh-window.png');
            if (File::exists($dest)) {
                File::delete($dest);
            }
        }
    }
};
