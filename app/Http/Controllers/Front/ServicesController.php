<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Portofolio;
use App\Models\Service;
use App\Services\ServicesService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServicesService $servicesService)
    {
        $services = $servicesService->get_services_paginated(12);
        return view('front.services.index', compact('services'));
    }

    public function getMoreServices(Int $last_service_id, Int $limit, ServicesService $servicesService)
    {
        $services = $servicesService->get_services($last_service_id, $limit);

        if($services->count() > 0)
        {
            return response()->json([
                'message' => __('response.get-more-services-success'),
                'content' => view('components.services-list', compact('services'))->render(),
                'length' => $services->count() >= $limit ? $limit : $services->count(),
                'last_service_id' => $services->last()?->id
            ]);
        }
        else
        {
            return response()->json([
                'errors' => ['data' => [__('response.no-services')]]
            ], 404);
        }
    }
    
    public function getMorePortofolios(Int $service_id, Int $last_service_id, Int $limit, ServicesService $servicesService)
    {
        $portofolios = $servicesService->get_portofolios($service_id, $last_service_id, $limit);

        if($portofolios->count() > 0)
        {
            return response()->json([
                'message' => __('response.get-more-portofolios-success'),
                'content' => view('components.portofolios-list', compact('portofolios'))->render(),
                'length' => $portofolios->count() >= $limit ? $limit : $portofolios->count(),
                'last_portofolio_id' => $portofolios->last()?->id
            ]);
        }
        else
        {
            return response()->json([
                'errors' => ['data' => [__('response.no-portofolios')]]
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Per-service SEO config: parent breadcrumb, related services, portfolio heading.
     */
    private const SERVICE_CONFIG = [
        'events-conferences' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['event-management', 'exhibition-booth-execution', 'backdrop'],
            'portfolioHeading_en' => 'Events & Conferences Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الفعاليات والمؤتمرات بالرياض',
        ],
        'event-management' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['events-conferences', 'exhibition-booth-execution', 'backdrop'],
            'portfolioHeading_en' => 'Event Management Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في إدارة الفعاليات بالرياض',
        ],
        'embossed-letters' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['project-signboards-walls', 'directional-signage', '3d-fabrication'],
            'portfolioHeading_en' => 'Embossed Letters Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الأحرف البارزة بالرياض',
        ],
        'exhibition-booth-execution' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['event-management', 'events-conferences', '3d-fabrication'],
            'portfolioHeading_en' => 'Exhibition Booth Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في أجنحة المعارض بالرياض',
        ],
        'project-signboards-walls' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['embossed-letters', 'directional-signage', 'banner-printing-installation'],
            'portfolioHeading_en' => 'Project Signboards Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في لوحات المشاريع بالرياض',
        ],
        'display-stands' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['roll-up', 'pop-up', 'exhibition-booth-execution'],
            'portfolioHeading_en' => 'Display Stands Portfolio',
            'portfolioHeading_ar' => 'أعمالنا في الاستندات الدعائية',
        ],
        'promotional-gifts' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['employee-gift-boxes', 'honor-shields', 'promotional-bags'],
            'portfolioHeading_en' => 'Promotional Gifts Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الهدايا الدعائية بالرياض',
        ],
        'employee-gift-boxes' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['promotional-gifts', 'honor-shields', 'national-day-celebrations'],
            'portfolioHeading_en' => 'Employee Gift Boxes Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في بوكس هدايا الموظفين بالرياض',
        ],
        'business-prints' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['profile-design-printing', 'business-cards', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Business Prints Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في المطبوعات التجارية بالرياض',
        ],
        'car-stickers' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['wall-stickers', 'banner-printing-installation', 'project-signboards-walls'],
            'portfolioHeading_en' => 'Car Stickers Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في استيكرات السيارات بالرياض',
        ],
        'banner-printing-installation' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['backdrop', 'project-signboards-walls', 'display-stands'],
            'portfolioHeading_en' => 'Banner Printing Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في طباعة البنرات بالرياض',
        ],
        'backdrop' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['banner-printing-installation', 'events-conferences', 'roll-up'],
            'portfolioHeading_en' => 'Backdrop Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الباك دروب بالرياض',
        ],
        'flags' => [
            'parentBreadcrumb' => ['name_en' => 'Apparel & Flags', 'name_ar' => 'الملابس والأعلام', 'slug' => 'apparel-flags'],
            'relatedSlugs' => ['banner-printing-installation', 'display-stands', 'national-day-celebrations'],
            'portfolioHeading_en' => 'Flags Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الأعلام بالرياض',
        ],
        'cup-printing' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['promotional-gifts', 'employee-gift-boxes', 'honor-shields'],
            'portfolioHeading_en' => 'Cup Printing Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في طباعة الأكواب بالرياض',
        ],
        'pop-up' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['roll-up', 'display-stands', 'backdrop'],
            'portfolioHeading_en' => 'Pop-up Display Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في بوب أب بالرياض',
        ],
        'uniforms' => [
            'parentBreadcrumb' => ['name_en' => 'Apparel & Flags', 'name_ar' => 'الملابس والأعلام', 'slug' => 'apparel-flags'],
            'relatedSlugs' => ['t-shirt-design-printing', 'promotional-gifts', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Uniforms Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في اليونيفورم بالرياض',
        ],
        'honor-shields' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['promotional-gifts', 'employee-gift-boxes', 'event-management'],
            'portfolioHeading_en' => 'Honor Shields Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الدروع التذكارية بالرياض',
        ],
        'roll-up' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['pop-up', 'lama-stand', 'exhibition-booth-execution'],
            'portfolioHeading_en' => 'Roll-up Banner Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في استندات الرول أب بالرياض',
        ],
        'lama-stand' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['roll-up', 'pop-up', 'exhibition-booth-execution'],
            'portfolioHeading_en' => 'Lama Stand Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في استندات اللاما بالرياض',
        ],
        'promotional-cubes' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['lama-stand', 'exhibition-booth-execution', 'display-stands'],
            'portfolioHeading_en' => 'Portfolio — Promotional Cubes in Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في المكعبات الدعائية بالرياض',
        ],
        'directional-signage' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['project-signboards-walls', 'embossed-letters', 'display-screens'],
            'portfolioHeading_en' => 'Directional Signage Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في اللافتات الإرشادية بالرياض',
        ],
        'digital-marketing' => [
            'parentBreadcrumb' => ['name_en' => 'Digital Services', 'name_ar' => 'الخدمات الرقمية', 'slug' => 'digital-services'],
            'relatedSlugs' => ['social-media', 'websites', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Digital Marketing Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في التسويق الرقمي بالرياض',
        ],
        'websites' => [
            'parentBreadcrumb' => ['name_en' => 'Digital Services', 'name_ar' => 'الخدمات الرقمية', 'slug' => 'digital-services'],
            'relatedSlugs' => ['digital-marketing', 'corporate-visual-identity-design', 'social-media'],
            'portfolioHeading_en' => 'Website Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في تصميم المواقع بالرياض',
        ],
        'social-media' => [
            'parentBreadcrumb' => ['name_en' => 'Digital Services', 'name_ar' => 'الخدمات الرقمية', 'slug' => 'digital-services'],
            'relatedSlugs' => ['digital-marketing', 'websites', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Social Media Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في السوشال ميديا بالرياض',
        ],
        'wall-stickers' => [
            'parentBreadcrumb' => ['name_en' => 'Stickers & Print', 'name_ar' => 'الاستيكرات والطباعة', 'slug' => 'stickers-print'],
            'relatedSlugs' => ['car-stickers', 'directional-signage', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Wall Stickers Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في استيكرات الجدران بالرياض',
        ],
        'event-festival' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['event-management', 'national-day-celebrations', 'backdrop'],
            'portfolioHeading_en' => 'Event and Festival Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الفعاليات والمهرجانات بالرياض',
        ],
        'assorted-stamps' => [
            'parentBreadcrumb' => ['name_en' => 'Stickers & Print', 'name_ar' => 'الاستيكرات والطباعة', 'slug' => 'stickers-print'],
            'relatedSlugs' => ['corporate-visual-identity-design', 'business-cards', 'business-prints'],
            'portfolioHeading_en' => 'Stamps Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الأختام بالرياض',
        ],
        't-shirt-design-printing' => [
            'parentBreadcrumb' => ['name_en' => 'Apparel & Flags', 'name_ar' => 'الملابس والأعلام', 'slug' => 'apparel-flags'],
            'relatedSlugs' => ['uniforms', 'promotional-gifts', 'employee-gift-boxes'],
            'portfolioHeading_en' => 'T-shirt Design and Printing Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في تصميم وطباعة التيشيرت بالرياض',
        ],
        'profile-design-printing' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['corporate-visual-identity-design', 'business-prints', 'business-cards'],
            'portfolioHeading_en' => 'Profile Design Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في تصميم البروفيل بالرياض',
        ],
        'display-screens' => [
            'parentBreadcrumb' => ['name_en' => 'Display Systems', 'name_ar' => 'أنظمة العرض', 'slug' => 'display-systems'],
            'relatedSlugs' => ['lama-stand', 'exhibition-booth-execution', 'digital-marketing'],
            'portfolioHeading_en' => 'Display Screens Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في شاشات العرض بالرياض',
        ],
        'scarf-printing' => [
            'parentBreadcrumb' => ['name_en' => 'Apparel & Flags', 'name_ar' => 'الملابس والأعلام', 'slug' => 'apparel-flags'],
            'relatedSlugs' => ['promotional-gifts', 'employee-gift-boxes', 't-shirt-design-printing'],
            'portfolioHeading_en' => 'Scarf Printing Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في طباعة الأوشحة بالرياض',
        ],
        'business-cards' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['corporate-visual-identity-design', 'profile-design-printing', 'business-prints'],
            'portfolioHeading_en' => 'Business Cards Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في بطاقات الأعمال بالرياض',
        ],
        'national-day-celebrations' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['national-day-prints', 'employee-gift-boxes', 'flags'],
            'portfolioHeading_en' => 'National Day Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في احتفالات اليوم الوطني بالرياض',
        ],
        'national-day-prints' => [
            'parentBreadcrumb' => ['name_en' => 'Apparel & Flags', 'name_ar' => 'الملابس والأعلام', 'slug' => 'apparel-flags'],
            'relatedSlugs' => ['national-day-celebrations', 'flags', 'wall-stickers'],
            'portfolioHeading_en' => 'National Day Prints Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في مطبوعات اليوم الوطني بالرياض',
        ],
        'founding-day-celebrations' => [
            'parentBreadcrumb' => ['name_en' => 'Events & Exhibitions', 'name_ar' => 'الفعاليات والمعارض', 'slug' => 'events-exhibitions'],
            'relatedSlugs' => ['national-day-celebrations', 'employee-gift-boxes', 'flags'],
            'portfolioHeading_en' => 'Founding Day Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في احتفالات يوم التأسيس بالرياض',
        ],
        'corporate-visual-identity-design' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['profile-design-printing', 'business-cards', '3d-designs'],
            'portfolioHeading_en' => 'Corporate Identity Design Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في تصميم الهوية بالرياض',
        ],
        '3d-fabrication' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['3d-designs', 'exhibition-booth-execution', 'directional-signage'],
            'portfolioHeading_en' => '3D Fabrication Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في التصنيع ثلاثي الأبعاد بالرياض',
        ],
        '3d-designs' => [
            'parentBreadcrumb' => ['name_en' => 'Printing & Publications', 'name_ar' => 'الطباعة والمطبوعات', 'slug' => 'printing'],
            'relatedSlugs' => ['3d-fabrication', 'exhibition-booth-execution', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => '3D Design Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في التصميم ثلاثي الأبعاد بالرياض',
        ],
        'promotional-bags' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['promotional-gifts', 'employee-gift-boxes', 'promotional-dangler'],
            'portfolioHeading_en' => 'Promotional Bags Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الشنط الدعائية بالرياض',
        ],
        'promotional-dangler' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['promotional-bags', 'wall-stickers', 'assorted-stamps'],
            'portfolioHeading_en' => 'Danglers Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الدانقلرات الدعائية بالرياض',
        ],
        'thermal-delivery-box' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['employee-gift-boxes', 'promotional-bags', 'promotional-gifts'],
            'portfolioHeading_en' => 'Thermal Delivery Box Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في صناديق التوصيل الحرارية بالرياض',
        ],
        'pvc-file-with-clip-manufacturing' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['medical-files', 'promotional-gifts', 'business-cards'],
            'portfolioHeading_en' => 'PVC File Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في ملفات PVC بالرياض',
        ],
        'medical-files' => [
            'parentBreadcrumb' => ['name_en' => 'Promotional Items', 'name_ar' => 'المواد الترويجية', 'slug' => 'promotional-items'],
            'relatedSlugs' => ['pvc-file-with-clip-manufacturing', 'business-cards', 'corporate-visual-identity-design'],
            'portfolioHeading_en' => 'Medical Files Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الملفات الطبية بالرياض',
        ],
        'smart-glass-smart-film' => [
            'parentBreadcrumb' => ['name_en' => 'Signage & Signs', 'name_ar' => 'اللافتات واللوحات', 'slug' => 'signage'],
            'relatedSlugs' => ['directional-signage', 'wall-stickers', 'display-screens'],
            'portfolioHeading_en' => 'Smart Glass Portfolio — Riyadh',
            'portfolioHeading_ar' => 'أعمالنا في الزجاج الذكي بالرياض',
        ],
    ];

    public function show(Service $service, ServicesService $servicesService)
    {
        $portofolios = $servicesService->get_portofolios_paginated($service->id, 12);

        $config = self::SERVICE_CONFIG[$service->slug] ?? null;

        // Related services: use specific slugs if configured, otherwise random
        if ($config && !empty($config['relatedSlugs'])) {
            $relatedServices = Service::withTranslation()
                ->whereIn('slug', $config['relatedSlugs'])
                ->limit(3)
                ->get();
        } else {
            $relatedServices = Service::withTranslation()
                ->where('id', '!=', $service->id)
                ->inRandomOrder()
                ->limit(3)
                ->get();
        }

        // Parent breadcrumb for 4-level schema
        $parentBreadcrumb = null;
        if ($config && !empty($config['parentBreadcrumb'])) {
            $pb = $config['parentBreadcrumb'];
            $locale = app()->getLocale();
            $parentBreadcrumb = [
                'name' => $locale === 'ar' ? $pb['name_ar'] : $pb['name_en'],
                'url' => url($locale . '/services/' . $pb['slug']),
            ];
        }

        // Custom portfolio heading
        $portfolioHeading = null;
        if ($config) {
            $locale = app()->getLocale();
            $portfolioHeading = $locale === 'ar'
                ? ($config['portfolioHeading_ar'] ?? null)
                : ($config['portfolioHeading_en'] ?? null);
        }

        $latestBlogs = Blog::withTranslation()->latest()->limit(3)->get();

        return view('front.services.portofolio', compact('portofolios', 'service', 'relatedServices', 'parentBreadcrumb', 'portfolioHeading', 'latestBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
