<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

return new class extends Migration
{
    private string $slug = 'flags-design-manufacturing-saudi-arabia-window';
    private string $coverPath = 'blogs/covers/flags-design-manufacturing-saudi-arabia-window.webp';

    public function up(): void
    {
        $blog = DB::table('blogs')->where('slug', $this->slug)->first();
        if (!$blog) {
            return;
        }

        $source = base_path('resources/blog-assets/flags-design-manufacturing-saudi-arabia-window.jpg');
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

        DB::table('blogs')->where('id', $blog->id)->update([
            'cover' => $this->coverPath,
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        //
    }
};
