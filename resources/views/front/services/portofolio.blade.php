@extends('front.layout.main')

@section('title', $service->title ?? '')
@section('meta_title', $service->meta_title ?: ($service->title ?? ''))
@section('description', $service->meta_description ?? '')
@section('keywords', $service->meta_keywords ?? '')
@section('display_image', $service->display_image)

@section('hreflang')
<link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', route('front.services.show', $service)) }}" />
<link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', route('front.services.show', $service)) }}" />
<link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL('en', route('front.services.show', $service)) }}" />
@endsection

@section('breadcrumb_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "{{ __('custom.home') }}",
        "item": "{{ url('/') }}"
    }, {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ __('custom.services') }}",
        "item": "{{ route('front.services.index') }}"
    }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $service->title ?? '' }}",
        "item": "{{ route('front.services.show', $service) }}"
    }]
}
</script>
@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "{{ $service->title ?? '' }}",
    "name": "{{ $service->meta_title ?: ($service->title ?? '') }}",
    "description": "{{ $service->meta_description ?: ($service->title ?? '') }}",
    "image": "{{ $service->display_image }}",
    "url": "{{ route('front.services.show', $service) }}",
    "provider": {
        "@type": "LocalBusiness",
        "name": "{{ $website_settings->title }}",
        "url": "{{ url('/') }}",
        "telephone": "{{ $website_settings->phone_number }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Riyadh",
            "addressCountry": "SA"
        }
    },
    "areaServed": {
        "@type": "City",
        "name": "Riyadh",
        "addressCountry": "SA"
    },
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "priceCurrency": "SAR",
        "priceSpecification": {
            "@type": "PriceSpecification",
            "description": "Custom pricing based on project requirements. Contact for a free quote."
        }
    }
}
</script>
@endsection

@section('content')

    <div class="d-flex flex-column" style="min-height:100vh;">
        <section id="services-header" class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="title pt-3 mx-auto">
                        <h1 class="mb-2">{{ $service->title ?? '' }}</h1>
                        <div class="title-underline-container">
                            <div class="title-underline w-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($service->content)
        <section id="service-content" class="py-4">
            <div class="container">
                <div class="service-body">
                    {!! $service->content !!}
                </div>
            </div>
        </section>
        @endif

        @if($portofolios->count() > 0)
        <section id="portofolio" class="py-4 pt-5 bg-light flex-fill">
            <div class="container-fluid">
                <div id="porto-data" class="row px-2 row-gap-2">
                    <x-portofolios-list :portofolios="$portofolios" />
                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                    {{ $portofolios->links() }}
                </div>
            </div>
        </section>
        @endif

        @if(isset($relatedServices) && $relatedServices->count() > 0)
        <section id="related-services" class="py-5">
            <div class="container">
                <div class="title mx-auto mb-4">
                    <h2 class="mb-2">{{ app()->getLocale() === 'ar' ? 'خدمات ذات صلة' : 'Related Services' }}</h2>
                    <div class="title-underline-container">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach($relatedServices as $related)
                    <div class="col-md-4">
                        <a href="{{ route('front.services.show', $related) }}" class="text-decoration-none">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ $related->display_image }}" class="card-img-top" alt="{{ $related->title }}" loading="lazy">
                                <div class="card-body text-center">
                                    <h3 class="card-title fs-5 text-dark">{{ $related->title }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <section class="py-4 text-center">
            <div class="container">
                <p class="text-gr mb-3">@lang('custom.contact-us')</p>
                <a href="{{ route('front.contact.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
            </div>
        </section>
    </div>

@endsection
