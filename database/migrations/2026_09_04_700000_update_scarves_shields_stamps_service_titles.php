<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            'scarf-printing' => [
                'en' => 'Corporate Logo Scarves',
                'ar' => 'أوشحة بشعار الشركات',
            ],
            'honor-shields' => [
                'en' => 'Corporate & Institutional Honor Shields',
                'ar' => 'دروع شركات ومؤسسات',
            ],
            'assorted-stamps' => [
                'en' => 'Corporate & Institutional Stamps',
                'ar' => 'أختام شركات ومؤسسات',
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
            'scarf-printing' => ['en' => 'Scarf Printing', 'ar' => 'طباعة الأوشحة'],
            'honor-shields' => ['en' => 'Honor Shields', 'ar' => 'دروع التكريم'],
            'assorted-stamps' => ['en' => 'Assorted Stamps', 'ar' => 'أختام متنوعة'],
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
