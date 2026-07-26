<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $service = DB::table('services')->where('slug', 'medical-files')->first();

        if ($service) {
            DB::table('service_translations')->where('service_id', $service->id)->delete();
            DB::table('portofolios')->where('service_id', $service->id)->delete();
            DB::table('services')->where('id', $service->id)->delete();
        }
    }

    public function down(): void
    {
        // Re-seeded by 2026_06_28_000039_seed_medical_files_service_content.php
    }
};
