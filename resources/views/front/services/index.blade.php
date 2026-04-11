@extends('front.layout.main')

@section('title', __('custom.services'))
@section('meta_title', __('custom.services-meta-title'))
@section('description', __('custom.services-meta-description'))
@section('keywords', __('custom.services-meta-keywords'))

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
    }]
}
</script>
@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "{{ __('custom.our-services') }}",
    "itemListElement": [
        @foreach($services as $index => $service)
        {
            "@type": "ListItem",
            "position": {{ $index + 1 }},
            "name": "{{ $service->title }}",
            "url": "{{ route('front.services.show', $service) }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="[
        ['label' => __('custom.home'), 'url' => url('/')],
        ['label' => __('custom.services'), 'url' => route('front.services.index')],
    ]" />

    <section id="services-header" class="py-2 pb-0 mb-4">
        <div class="container">
            <div class="row px-2">
                <div class="col-lg-12 px-4 mt-2" style="z-index:1;position:relative;">
                    <img src="{{ asset('front/images/car.png') }}" alt="@lang('custom.our-services') - {{ $website_settings->title }}" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </section>
    <div class="flex-fill d-flex flex-column justify-content-center">
        <div class="title pt-3 mx-auto">
            <h1 class="mb-0">@lang('custom.our-services')</h1>
            <div class="title-underline-container">
                <div class="title-underline w-100"></div>
            </div>
        </div>
        <div class="service-container d-flex flex-wrap justify-content-evenly py-4">
            <x-services-list :services="$services" />
            <div class="ServiceLoader justify-content-center w-100">
                <span class="loader"></span>
            </div>
        </div>
    </div>
@endsection

@section('js-after')
    <script>
        const lang = document.querySelector('html').getAttribute('lang')
        let LastServiceId = {{ $services->last()?->id | null }}
    </script>
@endsection