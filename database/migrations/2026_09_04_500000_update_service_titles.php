<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            'flags' => [
                'en' => 'Promotional Flags & Flag Manufacturing',
                'ar' => 'أعلام دعائية وتصنيع الأعلام',
            ],
            'embossed-letters' => [
                'en' => 'Embossed Letters & Illuminated Letter Signs',
                'ar' => 'أحرف بارزة ولوحات حروف مضيئة',
            ],
            'exhibition-booth-execution' => [
                'en' => 'Exhibition Booth Design & Execution',
                'ar' => 'تصميم وتنفيذ بوثات وأجنحة المعارض',
            ],
            'events-conferences' => [
                'en' => 'Event & Conference Management',
                'ar' => 'تنظيم وإدارة الفعاليات والمؤتمرات',
            ],
            'display-stands' => [
                'en' => 'Promotional & Display Stands',
                'ar' => 'ستاندات دعائية وستاندات عرض',
            ],
            'promotional-gifts' => [
                'en' => 'Promotional & Corporate Gifts',
                'ar' => 'هدايا دعائية وهدايا الشركات',
            ],
            'employee-gift-boxes' => [
                'en' => 'Employee & Corporate Gift Boxes',
                'ar' => 'بوكسات هدايا الموظفين والشركات',
            ],
            'car-stickers' => [
                'en' => 'Car Stickers & Vehicle Wrapping',
                'ar' => 'استيكرات سيارات وتغليف السيارات',
            ],
            'backdrop' => [
                'en' => 'Backdrop for Events & Conferences',
                'ar' => 'باك دروب للفعاليات والمؤتمرات',
            ],
            'banner-printing-installation' => [
                'en' => 'Banner Printing & Billboard Installation',
                'ar' => 'طباعة وتركيب البنرات واللوحات الإعلانية',
            ],
            'uniforms' => [
                'en' => 'Corporate Uniforms & Workwear',
                'ar' => 'يونيفورم وزي موحد للشركات',
            ],
            'pop-up' => [
                'en' => 'Pop-Up Display Stands',
                'ar' => 'بوب أب ستاندات عرض',
            ],
            'promotional-cubes' => [
                'en' => 'Promotional & Advertising Cubes',
                'ar' => 'مكعبات دعائية وإعلانية',
            ],
            'lama-stand' => [
                'en' => 'Display Stands & Lama Stands',
                'ar' => 'ستاندات عرض ولاما ستاند',
            ],
            'directional-signage' => [
                'en' => 'Signs & Directional Signage',
                'ar' => 'لافتات ولوحات إرشادية',
            ],
            'websites' => [
                'en' => 'Corporate Website Design',
                'ar' => 'تصميم مواقع إلكترونية للشركات',
            ],
            'event-festival' => [
                'en' => 'Party, Festival & Event Planning',
                'ar' => 'تنظيم حفلات ومهرجانات وفعاليات',
            ],
            'wall-stickers' => [
                'en' => 'Wall Stickers & Wall Decals',
                'ar' => 'استيكرات حوائط وملصقات جدارية',
            ],
            't-shirt-design-printing' => [
                'en' => 'T-Shirt Design & Printing',
                'ar' => 'تصميم وطباعة تيشيرتات',
            ],
            'corporate-visual-identity-design' => [
                'en' => 'Corporate Visual Identity Design',
                'ar' => 'تصميم الهوية البصرية للشركات',
            ],
            'promotional-bags' => [
                'en' => 'Promotional & Corporate Bags',
                'ar' => 'شنط دعائية وشنط الشركات',
            ],
            'thermal-delivery-box' => [
                'en' => 'Custom Thermal Delivery Boxes',
                'ar' => 'صناديق توصيل حرارية مخصصة للشركات',
            ],
            'promotional-dangler' => [
                'en' => 'Promotional & Advertising Danglers',
                'ar' => 'دنجلر دعائي وإعلاني',
            ],
            '3d-designs' => [
                'en' => 'Canvas Print Boards',
                'ar' => 'طباعة لوحات كانفس',
            ],
            '3d-fabrication' => [
                'en' => 'Promotional & Advertising 3D Model Manufacturing',
                'ar' => 'تصنيع مجسمات دعائية وإعلانية',
            ],
            'profile-design-printing' => [
                'en' => 'Corporate Profile Design & Printing',
                'ar' => 'تصميم وطباعة بروفايل الشركات',
            ],
            'business-cards' => [
                'en' => 'Business Card Printing',
                'ar' => 'طباعة كروت شخصية وبطاقات أعمال',
            ],
            'display-screens' => [
                'en' => 'Display Screens for Events & Exhibitions',
                'ar' => 'شاشات عرض للفعاليات والمعارض',
            ],
            'project-signboards-walls' => [
                'en' => 'Project Fencing, Hoarding & Billboard Manufacturing',
                'ar' => 'تسوير المشاريع وتصنيع أسوار المشاريع واللوحات الإعلانية',
            ],
            'smart-glass-smart-film' => [
                'en' => 'Frosted & Sandblasted Glass Sticker Installation & Tinting',
                'ar' => 'تركيب استيكر زجاج ثلجي ومرمل وتظليل الزجاج',
            ],
            'roll-up' => [
                'en' => 'Roll-Up Stand & Printing',
                'ar' => 'رول أب ستاند وطباعة رول أب',
            ],
            'business-prints' => [
                'en' => 'Corporate Annual Report Design',
                'ar' => 'تصميم التقارير السنوية للشركات',
            ],
            'cup-printing' => [
                'en' => 'Promotional Cup & Mug Printing',
                'ar' => 'طباعة الأكواب والمجات الدعائية',
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
            'flags' => ['en' => 'Flags', 'ar' => 'الأعلام'],
            'embossed-letters' => ['en' => 'Embossed Letters', 'ar' => 'الأحرف البارزة'],
            'exhibition-booth-execution' => ['en' => 'Exhibition Booth Execution', 'ar' => 'تنفيذ أجنحة المعارض'],
            'events-conferences' => ['en' => 'Events & Conferences', 'ar' => 'الفعاليات والمؤتمرات'],
            'display-stands' => ['en' => 'Display Stands', 'ar' => 'الاستندات الدعائية'],
            'promotional-gifts' => ['en' => 'Promotional Gifts', 'ar' => 'الهدايا الدعائية'],
            'employee-gift-boxes' => ['en' => 'Employee Gift Boxes', 'ar' => 'بوكس هدايا الموظفين'],
            'car-stickers' => ['en' => 'Car Stickers', 'ar' => 'استيكرات السيارات'],
            'backdrop' => ['en' => 'Backdrop', 'ar' => 'باك دروب'],
            'banner-printing-installation' => ['en' => 'Banner Printing & Installation', 'ar' => 'طباعة وتركيب البنرات'],
            'uniforms' => ['en' => 'Uniforms', 'ar' => 'يونيفورم'],
            'pop-up' => ['en' => 'Pop-up Display', 'ar' => 'بوب أب'],
            'promotional-cubes' => ['en' => 'Promotional Cubes', 'ar' => 'مكعبات دعائية'],
            'lama-stand' => ['en' => 'Lama Stand', 'ar' => 'لاما ستاند'],
            'directional-signage' => ['en' => 'Directional Signage', 'ar' => 'لافتات إرشادية'],
            'websites' => ['en' => 'Web Design & Development', 'ar' => 'تصميم المواقع'],
            'event-festival' => ['en' => 'Event and Festival Production', 'ar' => 'تنظيم حفلات ومهرجانات'],
            'wall-stickers' => ['en' => 'Wall Stickers', 'ar' => 'استيكرات حوائط'],
            't-shirt-design-printing' => ['en' => 'T-shirt Design and Printing', 'ar' => 'تصميم وطباعة تيشيرت'],
            'corporate-visual-identity-design' => ['en' => 'Corporate Visual Identity Design', 'ar' => 'تصميم الهوية البصرية الشركاتية'],
            'promotional-bags' => ['en' => 'Promotional Bags', 'ar' => 'شنط دعائية'],
            'thermal-delivery-box' => ['en' => 'Thermal Delivery Boxes', 'ar' => 'صناديق التوصيل الحرارية'],
            'promotional-dangler' => ['en' => 'Promotional Danglers', 'ar' => 'دانقلرات دعائية'],
            '3d-designs' => ['en' => '3D Designs', 'ar' => 'التصميم ثلاثي الأبعاد'],
            '3d-fabrication' => ['en' => '3D Fabrication', 'ar' => 'التصنيع ثلاثي الأبعاد'],
            'profile-design-printing' => ['en' => 'Profile Design and Printing', 'ar' => 'تصميم وطباعة بروفيل الشركات'],
            'business-cards' => ['en' => 'Business Cards', 'ar' => 'بطاقات الأعمال'],
            'display-screens' => ['en' => 'Display Screens', 'ar' => 'شاشات العرض'],
            'project-signboards-walls' => ['en' => 'Project Signboards & Walls', 'ar' => 'لوحات المشاريع والأسوار'],
            'smart-glass-smart-film' => ['en' => 'Smart Glass & Film', 'ar' => 'الزجاج الذكي والفيلم الذكي'],
            'roll-up' => ['en' => 'Roll-up', 'ar' => 'رول أب'],
            'business-prints' => ['en' => 'Business Prints', 'ar' => 'المطبوعات التجارية'],
            'cup-printing' => ['en' => 'Cup Printing', 'ar' => 'طباعة الأكواب'],
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
