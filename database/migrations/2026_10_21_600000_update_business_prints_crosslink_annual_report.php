<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $service = DB::table('services')->where('slug', 'business-prints')->first();
        if (!$service) {
            return;
        }

        // Update English: add cross-link in the annual report section
        $en = DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'en')
            ->first();

        if ($en && $en->content) {
            $enContent = str_replace(
                '<h2>Annual Report and Corporate Report Design</h2>
<p>Annual reports and corporate reports communicate performance, transparency, and organizational credibility to shareholders, clients, and government stakeholders. These documents demand the highest standard of design — clear data visualization, structured narrative flow, and a print finish that conveys professionalism.</p>
<p>Window Advertising designs annual reports and corporate reports for companies in Riyadh, handling everything from infographic design and data visualization to final print production. Both Arabic and English versions are produced to the same design standard, with bilingual layouts available where required.</p>',
                '<h2>Annual Report and Corporate Report Design</h2>
<p>Annual reports and corporate reports communicate performance, transparency, and organizational credibility to shareholders, clients, and government stakeholders. These documents demand the highest standard of design — clear data visualization, structured narrative flow, and a print finish that conveys professionalism.</p>
<p>Window Advertising designs annual reports and corporate reports for companies in Riyadh, handling everything from infographic design and data visualization to final print production. Both Arabic and English versions are produced to the same design standard, with bilingual layouts available where required. Learn more about our dedicated <a href="/en/services/annual-report">annual report design service</a>.</p>',
                $en->content
            );

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'en')
                ->update(['content' => $enContent]);
        }

        // Update Arabic: add cross-link in the annual report section
        $ar = DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'ar')
            ->first();

        if ($ar && $ar->content) {
            $arContent = str_replace(
                '<p>تصمم ويندو للإعلان التقارير السنوية والتقارير الشركاتية للشركات في الرياض، وتتولى كل شيء من تصميم الإنفوجرافيك وتصور البيانات إلى الإنتاج النهائي للطباعة. تُنتج النسختان العربية والإنجليزية بنفس معيار التصميم، مع توفر تخطيطات ثنائية اللغة حسب الحاجة.</p>',
                '<p>تصمم ويندو للإعلان التقارير السنوية والتقارير الشركاتية للشركات في الرياض، وتتولى كل شيء من تصميم الإنفوجرافيك وتصور البيانات إلى الإنتاج النهائي للطباعة. تُنتج النسختان العربية والإنجليزية بنفس معيار التصميم، مع توفر تخطيطات ثنائية اللغة حسب الحاجة. تعرف على المزيد حول خدمة <a href="/ar/services/annual-report">تصميم التقارير السنوية</a> المتخصصة.</p>',
                $ar->content
            );

            DB::table('service_translations')
                ->where('service_id', $service->id)
                ->where('locale', 'ar')
                ->update(['content' => $arContent]);
        }
    }

    public function down(): void
    {
        // Reversing cross-links is not critical; content will be overwritten by a future seed if needed.
    }
};
