<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $service = DB::table('services')->where('slug', 'employee-gift-boxes')->first();

        if (!$service) {
            return;
        }

        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'ar')
            ->update([
                'meta_title' => 'بوكس هدايا للموظفين في الرياض | ويندو للإعلان',
            ]);
    }

    public function down(): void
    {
        $service = DB::table('services')->where('slug', 'employee-gift-boxes')->first();

        if (!$service) {
            return;
        }

        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'ar')
            ->update([
                'meta_title' => 'بوكس هدايا للموظفين في الرياض | هدايا شركاتية السعودية | ويندو للإعلان',
            ]);
    }
};
