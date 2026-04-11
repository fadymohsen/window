<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Service;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('image');
        });

        // Generate slugs for existing services using English title
        foreach (Service::with('translations')->get() as $service) {
            $title = $service->translate('en')?->title ?? $service->translate('ar')?->title ?? 'service';
            $slug = Str::slug($title);
            if (empty($slug)) {
                $slug = Str::slug(Str::transliterate($title));
            }
            if (empty($slug)) {
                $slug = 'service-' . $service->id;
            }
            // Ensure uniqueness
            $count = Service::where('slug', $slug)->where('id', '!=', $service->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . $service->id;
            }
            $service->slug = $slug;
            $service->saveQuietly();
        }
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
