<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

return new class extends Migration
{
    private string $slug = 'project-signs-hoarding-boards-saudi-arabia-window';
    private string $coverPath = 'blogs/covers/project-signs-hoarding-boards-saudi-arabia-window.webp';

    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        $source = base_path('resources/blog-assets/project-signs-hoarding-boards-saudi-arabia-window.jpg');
        if (!is_file($source)) {
            return;
        }

        $destination = storage_path('app/public/' . $this->coverPath);
        if (!is_dir(dirname($destination))) {
            mkdir(dirname($destination), 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($source)
            ->scale(height: 450)
            ->encode(new AutoEncoder('webp', quality: 75))
            ->save($destination);

        DB::table('blogs')->where('id', $blog->id)->update(['cover' => $this->coverPath]);
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if ($blog && $blog->cover === $this->coverPath) {
            DB::table('blogs')->where('id', $blog->id)->update([
                'cover' => 'blogs/covers/placeholder-project-signs-hoarding.webp',
            ]);
        }

        $fullPath = storage_path('app/public/' . $this->coverPath);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
};
