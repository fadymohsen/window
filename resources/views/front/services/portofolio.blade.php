@extends('front.layout.main')

@section('title', $service->title)
@section('meta_title', $service->meta_title ?: $service->title)
@section('description', $service->meta_description ?: '')
@section('keywords', $service->meta_keywords ?: '')
@section('display_image', $service->display_image)

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
        "name": "{{ $service->title }}",
        "item": "{{ route('front.services.show', $service->id) }}"
    }]
}
</script>
@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "{{ $service->title }}",
    "description": "{{ $service->meta_description ?: $service->title }}",
    "image": "{{ $service->display_image }}",
    "url": "{{ route('front.services.show', $service->id) }}",
    "provider": {
        "@type": "AdvertisingAgency",
        "name": "{{ $website_settings->title }}",
        "url": "{{ url('/') }}"
    },
    "areaServed": {
        "@type": "Country",
        "name": "Saudi Arabia"
    }
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="[
        ['label' => __('custom.home'), 'url' => url('/')],
        ['label' => __('custom.services'), 'url' => route('front.services.index')],
        ['label' => $service->title, 'url' => route('front.services.show', $service->id)],
    ]" />

    <div class="d-flex flex-column" style="min-height:100vh;">
        <section id="services-header" class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="title pt-3 mx-auto">
                        <h1 class="mb-2">{{ $service->title }}</h1>
                        <div class="title-underline-container">
                            <div class="title-underline w-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="portofolio" class="py-4 pt-5 bg-light flex-fill">
            <div class="container-fluid">
                <div id="porto-data" class="row px-2 row-gap-2">
                    <x-portofolios-list :portofolios="$portofolios" />
                    <div class="PortofolioLoader justify-content-center w-100">
                        <span class="loader"></span>
                    </div>
                </div>
        </section>

        <section class="py-4 text-center">
            <div class="container">
                <p class="text-gr mb-3">@lang('custom.contact-us')</p>
                <a href="{{ route('front.contacts.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
            </div>
        </section>

        <!-- Image Model -->
        <div id="porto-modal" class="modal" tabindex="-1">
            <div class="modal-dialog my-0 vh-100 d-flex align-items-center" style="max-width: 100%;">
                <div class="modal-content d-flex justify-content-center align-items-center" style="background: transparent;border: 0;">
                    <div class="modal-body position-relative" style="width: fit-content;">
                        <button class="bg-transparent border-0 text-white fw-bold position-absolute m-1 fs-3" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        <img class="rounded" src="" alt="{{ $service->title }}" style="width: auto;max-height: 90vh;max-width: 100%;">
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js-after')
    <script>
        const lang = document.querySelector('html').getAttribute('lang')
        let LastPortofolioId = {{ $portofolios->last()?->id | null }}
        const SERVICE_ID = {{ $service->id }}
    </script>
@endsection