<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            'national-day-prints' => [
                'en' => 'National Day 96 Gifts | Offers & Giveaways',
                'ar' => 'هدايا اليوم الوطني 96 | عروض وتوزيعات',
            ],
            'national-day-celebrations' => [
                'en' => 'National Day 96 Offers | Gifts & Giveaways',
                'ar' => 'عروض اليوم الوطني 96 | هدايا وتوزيعات',
            ],
        ];

        foreach ($updates as $slug => $titles) {
            $service = DB::table('services')->where('slug', $slug)->first();

            if (!$service) {
                continue;
            }

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'en')
                ->update(['title' => $titles['en']]);

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'ar')
                ->update(['title' => $titles['ar']]);
        }
    }

    public function down(): void
    {
        $rollback = [
            'national-day-prints' => ['en' => 'National Day Prints', 'ar' => 'مطبوعات اليوم الوطني'],
            'national-day-celebrations' => ['en' => 'National Day Celebrations', 'ar' => 'احتفالات اليوم الوطني'],
        ];

        foreach ($rollback as $slug => $titles) {
            $service = DB::table('services')->where('slug', $slug)->first();

            if (!$service) {
                continue;
            }

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'en')
                ->update(['title' => $titles['en']]);

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'ar')
                ->update(['title' => $titles['ar']]);
        }
    }
};
