<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

return new class extends Migration
{
    private string $slug = 'employee-welcome-box-saudi-arabia';
    private string $coverPath = 'blogs/covers/employee-welcome-box-saudi-arabia.webp';

    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        $this->updateCover($blog->id);
    }

    public function down(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        if ($blog->cover === $this->coverPath) {
            DB::table('blogs')->where('id', $blog->id)->update(['cover' => 'blogs/covers/placeholder-employee-welcome-box-saudi-arabia.webp']);
        }

        $fullPath = storage_path('app/public/' . $this->coverPath);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }

    private function updateCover(int $blogId): void
    {
        $source = base_path('resources/blog-assets/employee-welcome-box-saudi-arabia-window.jpeg');
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

        DB::table('blogs')->where('id', $blogId)->update(['cover' => $this->coverPath]);
    }
};
