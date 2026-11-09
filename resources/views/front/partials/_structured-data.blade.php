@php
    $sameAs = array_values(array_filter([
        $website_settings->facebook_url,
        $website_settings->instagram_url,
        $website_settings->linkedin_url,
        $website_settings->twitter_url,
        $website_settings->youtube_url,
        $website_settings->tiktok_url,
        $website_settings->snapchat_url,
        'https://maps.app.goo.gl/hJBnz8GRZqQd86rq7',
    ]));
    $baseUrl = rtrim(config('app.url'), '/');
@endphp

{{-- Organization Schema (all pages) --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "@id": "{{ $baseUrl }}/#organization",
    "name": "{{ $website_settings->title }}",
    "alternateName": ["Window Advertising", "Window Advertising Agency", "ويندو للدعاية والإعلان", "وكالة ويندو"],
    "url": "{{ $baseUrl }}",
    "logo": {
        "@type": "ImageObject",
        "@id": "{{ $baseUrl }}/#logo",
        "url": "{{ asset('android-chrome-512x512.png') }}",
        "width": 512,
        "height": 512,
        "caption": "Window Advertising Agency Logo"
    },
    "image": "{{ asset('front/images/og-image.jpeg') }}",
    "description": "{{ $website_settings->description }}",
    "email": "{{ $website_settings->email }}",
    "telephone": "{{ $website_settings->phone_number }}",
    "foundingDate": "2000",
    "foundingLocation": {
        "@type": "Place",
        "name": "Riyadh",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Riyadh",
            "addressCountry": "SA"
        }
    },
    "numberOfEmployees": {
        "@type": "QuantitativeValue",
        "minValue": 50
    },
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Riyadh",
        "addressRegion": "Riyadh Province",
        "addressCountry": "SA",
        "streetAddress": "{{ $website_settings->location }}"
    },
    "contactPoint": [{
        "@type": "ContactPoint",
        "telephone": "{{ $website_settings->phone_number }}",
        "contactType": "customer service",
        "availableLanguage": ["Arabic", "English"],
        "areaServed": "SA"
    }, {
        "@type": "ContactPoint",
        "telephone": "{{ $website_settings->phone_number }}",
        "contactType": "sales",
        "availableLanguage": ["Arabic", "English"],
        "areaServed": "SA"
    }],
    "knowsAbout": [
        "Advertising",
        "Event Management",
        "Exhibition Design",
        "Corporate Branding",
        "Signage Manufacturing",
        "3D Embossed Letters",
        "Company Profile Design",
        "Annual Report Design",
        "Promotional Gifts",
        "Digital Marketing",
        "Print Media",
        "Visual Identity Design",
        "Trade Show Booths",
        "Wayfinding Systems",
        "Large Format Printing"
    ],
    "knowsLanguage": ["ar", "en"],
    "slogan": "{{ app()->getLocale() === 'ar' ? 'أكثر من 25 عامًا من الخبرة في الدعاية والإعلان' : 'Over 25 years of advertising excellence' }}",
    "sameAs": {!! json_encode($sameAs) !!}
}
</script>

{{-- LocalBusiness / AdvertisingAgency Schema (all pages) --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AdvertisingAgency",
    "@id": "{{ $baseUrl }}/#localbusiness",
    "name": "{{ $website_settings->title }}",
    "alternateName": "Window Advertising Agency",
    "url": "{{ $baseUrl }}",
    "logo": "{{ asset('android-chrome-512x512.png') }}",
    "image": "{{ asset('front/images/og-image.jpeg') }}",
    "description": "{{ $website_settings->description }}",
    "email": "{{ $website_settings->email }}",
    "telephone": "{{ $website_settings->phone_number }}",
    "priceRange": "$$",
    "currenciesAccepted": "SAR",
    "paymentAccepted": "Cash, Bank Transfer",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Riyadh",
        "addressRegion": "Riyadh Province",
        "addressCountry": "SA",
        "streetAddress": "{{ $website_settings->location }}"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": "24.7136",
        "longitude": "46.6753"
    },
    "areaServed": [
        {
            "@type": "Country",
            "name": "Saudi Arabia",
            "sameAs": "https://en.wikipedia.org/wiki/Saudi_Arabia"
        },
        {
            "@type": "City",
            "name": "Riyadh",
            "sameAs": "https://en.wikipedia.org/wiki/Riyadh"
        }
    ],
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"],
        "opens": "09:00",
        "closes": "18:00"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "{{ app()->getLocale() === 'ar' ? 'خدمات ويندو للدعاية والإعلان' : 'Window Advertising Services' }}",
        "url": "{{ $baseUrl }}/{{ app()->getLocale() }}/services"
    },
    "sameAs": {!! json_encode($sameAs) !!}
}
</script>

{{-- WebSite Schema --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": "{{ $baseUrl }}/#website",
    "name": "{{ $website_settings->title }}",
    "alternateName": "Window Advertising",
    "url": "{{ $baseUrl }}",
    "publisher": {
        "@id": "{{ $baseUrl }}/#organization"
    },
    "inLanguage": ["ar", "en"],
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ $baseUrl }}/{{ app()->getLocale() }}/services?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

{{-- BreadcrumbList Schema --}}
@hasSection('breadcrumb_schema')
    @yield('breadcrumb_schema')
@endif
