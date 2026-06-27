<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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

        return view('front.services.portofolio', compact('portofolios', 'service', 'relatedServices', 'parentBreadcrumb', 'portfolioHeading'));
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
