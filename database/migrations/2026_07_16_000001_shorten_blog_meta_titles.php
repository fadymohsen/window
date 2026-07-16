<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Shorten Arabic blog meta titles
        DB::table('blogs')
            ->where('meta_title', 'like', '%| ويندو للدعاية والإعلان الرياض')
            ->update([
                'meta_title' => DB::raw("REPLACE(meta_title, '| ويندو للدعاية والإعلان الرياض', '| ويندو')")
            ]);

        // Shorten English blog meta titles
        DB::table('blogs')
            ->where('meta_title', 'like', '%| Window Advertising Agency Riyadh')
            ->update([
                'meta_title' => DB::raw("REPLACE(meta_title, '| Window Advertising Agency Riyadh', '| Window Riyadh')")
            ]);

        // Shorten Arabic service meta titles
        DB::table('service_translations')
            ->where('locale', 'ar')
            ->where('meta_title', 'like', '%| ويندو للدعاية والإعلان الرياض')
            ->update([
                'meta_title' => DB::raw("REPLACE(meta_title, '| ويندو للدعاية والإعلان الرياض', '| ويندو')")
            ]);

        // Shorten English service meta titles
        DB::table('service_translations')
            ->where('locale', 'en')
            ->where('meta_title', 'like', '%| Window Advertising Agency Riyadh')
            ->update([
                'meta_title' => DB::raw("REPLACE(meta_title, '| Window Advertising Agency Riyadh', '| Window Riyadh')")
            ]);
    }

    public function down(): void
    {
        // Not reversible
    }
};
