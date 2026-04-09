@php
    $sameAs = array_values(array_filter([
        $website_settings->facebook_url,
        $website_settings->instagram_url,
        $website_settings->linkedin_url,
        $website_settings->twitter_url,
        $website_settings->youtube_url,
        $website_settings->tiktok_url,
        $website_settings->snapchat_url,
    ]));
@endphp

{{-- Organization Schema (all pages) --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $website_settings->title }}",
    "url": "{{ url('/') }}",
    "logo": "{{ $website_settings->display_logo }}",
    "image": "{{ $website_settings->display_cover }}",
    "description": "{{ $website_settings->description }}",
    "email": "{{ $website_settings->email }}",
    "telephone": "{{ $website_settings->phone_number }}",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Riyadh",
        "addressCountry": "SA",
        "streetAddress": "{{ $website_settings->location }}"
    },
    "sameAs": {!! json_encode($sameAs) !!}
}
</script>

{{-- LocalBusiness Schema (all pages) --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AdvertisingAgency",
    "name": "{{ $website_settings->title }}",
    "url": "{{ url('/') }}",
    "logo": "{{ $website_settings->display_logo }}",
    "image": "{{ $website_settings->display_cover }}",
    "description": "{{ $website_settings->description }}",
    "email": "{{ $website_settings->email }}",
    "telephone": "{{ $website_settings->phone_number }}",
    "priceRange": "$$",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Riyadh",
        "addressRegion": "Riyadh",
        "addressCountry": "SA",
        "streetAddress": "{{ $website_settings->location }}"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": "24.7136",
        "longitude": "46.6753"
    },
    "areaServed": {
        "@type": "Country",
        "name": "Saudi Arabia"
    },
    "sameAs": {!! json_encode($sameAs) !!}
}
</script>

{{-- WebSite Schema --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $website_settings->title }}",
    "url": "{{ url('/') }}",
    "inLanguage": ["ar", "en"]
}
</script>

{{-- BreadcrumbList Schema --}}
@hasSection('breadcrumb_schema')
    @yield('breadcrumb_schema')
@endif
