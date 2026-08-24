<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Social Media: shorten EN + AR titles
        $socialMedia = DB::table('services')->where('slug', 'social-media')->first();
        if ($socialMedia) {
            DB::table('service_translations')
                ->where('service_id', $socialMedia->id)
                ->where('locale', 'en')
                ->update(['title' => 'Social Media Marketing']);

            DB::table('service_translations')
                ->where('service_id', $socialMedia->id)
                ->where('locale', 'ar')
                ->update(['title' => 'تسويق السوشيال ميديا']);
        }

        // Websites: shorten EN + AR titles
        $websites = DB::table('services')->where('slug', 'websites')->first();
        if ($websites) {
            DB::table('service_translations')
                ->where('service_id', $websites->id)
                ->where('locale', 'en')
                ->update(['title' => 'Web Design & Development']);

            DB::table('service_translations')
                ->where('service_id', $websites->id)
                ->where('locale', 'ar')
                ->update(['title' => 'تصميم المواقع']);
        }
    }

    public function down(): void
    {
        $socialMedia = DB::table('services')->where('slug', 'social-media')->first();
        if ($socialMedia) {
            DB::table('service_translations')
                ->where('service_id', $socialMedia->id)
                ->where('locale', 'en')
                ->update(['title' => 'Social Media Management and Marketing in Riyadh']);

            DB::table('service_translations')
                ->where('service_id', $socialMedia->id)
                ->where('locale', 'ar')
                ->update(['title' => 'إدارة وتسويق السوشيال ميديا في الرياض']);
        }

        $websites = DB::table('services')->where('slug', 'websites')->first();
        if ($websites) {
            DB::table('service_translations')
                ->where('service_id', $websites->id)
                ->where('locale', 'en')
                ->update(['title' => 'Website Design and Development']);

            DB::table('service_translations')
                ->where('service_id', $websites->id)
                ->where('locale', 'ar')
                ->update(['title' => 'تصميم وتطوير المواقع الإلكترونية']);
        }
    }
};
