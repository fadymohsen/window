<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'acrylic-fabrication';

    public function up(): void
    {
        $service = DB::table('services')->where('slug', $this->slug)->first();
        if (!$service) {
            return;
        }

        // Arabic meta
        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'ar')
            ->update([
                'meta_title' => 'تصنيع أكريليك في الرياض | ستاندات ولوحات أكريليك حسب الطلب | ويندو للدعاية والإعلان',
                'meta_description' => 'تصنيع أكريليك احترافي في الرياض من ويندو للدعاية والإعلان. نصمم وننفذ ستاندات أكريليك، لوحات إعلانية، حاملات منتجات، بوكسات إضاءة، وحلول عرض مبتكرة للشركات والمعارض والمحلات التجارية في السعودية. اطلب عرض سعر مجاناً.',
                'meta_keywords' => 'تصنيع أكريليك الرياض, ستاندات أكريليك السعودية, لوحات أكريليك إعلانية, حاملات أكريليك للمنتجات, بوكسات إضاءة أكريليك, تصنيع أكريليك حسب الطلب, شركة أكريليك الرياض, أكريليك للمعارض, ويندو للدعاية والإعلان',
            ]);

        // English meta
        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'en')
            ->update([
                'meta_title' => 'Acrylic Fabrication in Riyadh | Custom Acrylic Displays & Signage | Window Advertising',
                'meta_description' => 'Professional acrylic fabrication in Riyadh by Window Advertising Agency. We design and manufacture custom acrylic stands, display cases, light boxes, product holders, signage panels, and branded retail fixtures for companies, exhibitions, and stores across Saudi Arabia. Request a free quote today.',
                'meta_keywords' => 'acrylic fabrication Riyadh, custom acrylic displays Saudi Arabia, acrylic signage Riyadh, acrylic stands Saudi Arabia, acrylic light boxes, acrylic product holders, acrylic manufacturing Riyadh, exhibition acrylic displays, Window Advertising Agency',
            ]);
    }

    public function down(): void
    {
        // Revert to generic meta (original values before this migration)
        $service = DB::table('services')->where('slug', $this->slug)->first();
        if (!$service) {
            return;
        }

        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'ar')
            ->update([
                'meta_title' => 'تصنيع الأكريليك',
                'meta_description' => '',
                'meta_keywords' => '',
            ]);

        DB::table('service_translations')
            ->where('service_id', $service->id)
            ->where('locale', 'en')
            ->update([
                'meta_title' => 'Acrylic Fabrication',
                'meta_description' => '',
                'meta_keywords' => '',
            ]);
    }
};
