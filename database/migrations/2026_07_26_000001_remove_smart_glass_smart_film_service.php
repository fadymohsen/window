<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $service = DB::table('services')->where('slug', 'smart-glass-smart-film')->first();

        if ($service) {
            DB::table('service_translations')->where('service_id', $service->id)->delete();
            DB::table('portofolios')->where('service_id', $service->id)->delete();
            DB::table('services')->where('id', $service->id)->delete();
        }
    }

    public function down(): void
    {
        // Re-seeded by 2026_06_28_000040_seed_smart_glass_smart_film_service_content.php
    }
};
