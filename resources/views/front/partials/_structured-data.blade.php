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
    "alternateName": "Window Advertising",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('android-chrome-512x512.png') }}",
    "image": "{{ asset('front/images/og-image.png') }}",
    "description": "{{ $website_settings->description }}",
    "email": "{{ $website_settings->email }}",
    "telephone": "{{ $website_settings->phone_number }}",
    "foundingDate": "2000",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Riyadh",
        "addressCountry": "SA",
        "streetAddress": "{{ $website_settings->location }}"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ $website_settings->phone_number }}",
        "contactType": "customer service",
        "availableLanguage": ["Arabic", "English"],
        "areaServed": "SA"
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
    "logo": "{{ asset('android-chrome-512x512.png') }}",
    "image": "{{ asset('front/images/og-image.png') }}",
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
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"],
        "opens": "09:00",
        "closes": "18:00"
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
    "alternateName": "Window Advertising",
    "url": "{{ url('/') }}",
    "inLanguage": ["ar", "en"],
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/') }}/{{ app()->getLocale() }}/services?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

{{-- BreadcrumbList Schema --}}
@hasSection('breadcrumb_schema')
    @yield('breadcrumb_schema')
@endif
