<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Shorten Arabic blog meta titles: replace long suffix with shorter one
        DB::table('blogs')
            ->where('meta_title', 'like', '%| ويندو للدعاية والإعلان الرياض')
            ->update([
                'meta_title' => DB::raw("REPLACE(meta_title, '| ويندو للدعاية والإعلان الرياض', '| ويندو')")
            ]);

        // Shorten English blog meta titles: replace long suffix with shorter one
        DB::table('blogs')
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
