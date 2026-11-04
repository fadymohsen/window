<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    public function up(): void
    {
        $slug = 'company-profile-design-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if (!$blog) {
            return;
        }

        $source = resource_path('blog-assets/company-profile-design-riyadh-window.png');
        $dest   = storage_path('app/public/blogs/covers/company-profile-design-riyadh-window.png');

        if (File::exists($source)) {
            File::ensureDirectoryExists(dirname($dest));
            File::copy($source, $dest);

            DB::table('blogs')->where('id', $blog->id)->update([
                'cover'      => 'blogs/covers/company-profile-design-riyadh-window.png',
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        $slug = 'company-profile-design-riyadh';
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        if ($blog) {
            DB::table('blogs')->where('id', $blog->id)->update([
                'cover'      => 'blogs/covers/placeholder-company-profile-design-riyadh.webp',
                'updated_at' => now(),
            ]);

            $dest = storage_path('app/public/blogs/covers/company-profile-design-riyadh-window.png');
            if (File::exists($dest)) {
                File::delete($dest);
            }
        }
    }
};
