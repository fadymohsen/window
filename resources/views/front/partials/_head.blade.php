<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@php
    $currentPage = (int) request()->get('page', 1);
    $isPaginated = $currentPage > 1;
    $pageSuffix = $isPaginated ? ' - ' . (app()->getLocale() === 'ar' ? 'صفحة ' : 'Page ') . $currentPage : '';

    $rawTitle = View::yieldContent('meta_title') ?: ($website_settings->title . ' - ' . View::yieldContent('title'));
    $pageTitle = mb_strlen($rawTitle . $pageSuffix) > 65 ? mb_substr($rawTitle, 0, 62 - mb_strlen($pageSuffix)) . '...' . $pageSuffix : $rawTitle . $pageSuffix;

    $baseDescription = View::yieldContent('description') ?: $website_settings->description;
    $pageDescription = $isPaginated ? mb_substr($baseDescription, 0, 140) . $pageSuffix : $baseDescription;

    // Paginated pages get self-referencing canonical; page 1 strips ?page= param
    $canonicalUrl = $isPaginated
        ? request()->fullUrlWithQuery(['page' => $currentPage])
        : rtrim(request()->fullUrlWithQuery(['page' => null]), '?');
@endphp
<title>{{ $pageTitle }}</title>
<meta property="og:title" content="{{ $pageTitle }}">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta property="og:site_name" content="{{ $website_settings->title }}">

<meta name="description" content="{{ $pageDescription }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta name="twitter:description" content="{{ $pageDescription }}">

<meta property="og:url" content="{{ $canonicalUrl }}">
<link rel="canonical" href="{{ $canonicalUrl }}">
@if($isPaginated)
<link rel="prev" href="{{ rtrim(request()->fullUrlWithQuery(['page' => $currentPage - 1 == 1 ? null : $currentPage - 1]), '?') }}">
@endif
@if(isset($services) && method_exists($services, 'hasMorePages') && $services->hasMorePages() || isset($blogs) && method_exists($blogs, 'hasMorePages') && $blogs->hasMorePages() || isset($portofolios) && method_exists($portofolios, 'hasMorePages') && $portofolios->hasMorePages())
<link rel="next" href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}">
@endif
@hasSection('hreflang')
    @yield('hreflang')
@endif
<meta property="og:type" content="website">

<meta name="keywords" content="@yield('keywords', $website_settings->keywords)">

<meta name="twitter:image" content="@yield('display_image', asset('front/images/og-image.jpeg'))">
<meta property="og:image" content="@yield('display_image', asset('front/images/og-image.jpeg'))">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="{{ app()->getLocale() === 'ar' ? 'ar_SA' : 'en_US' }}">
<meta property="og:locale:alternate" content="{{ app()->getLocale() === 'ar' ? 'en_US' : 'ar_SA' }}">
@if($isPaginated)
<meta name="robots" content="noindex, follow">
@else
<meta name="robots" content="index, follow">
@endif

<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">

<!-- Preloader Critical CSS -->
<style>
#preloader{position:fixed;inset:0;z-index:9999;background:#1f1f1f;display:flex;flex-direction:column;justify-content:center;align-items:center;transition:opacity .4s ease}
#preloader.hide{opacity:0;pointer-events:none}
.preloader-logo{width:120px;margin-bottom:20px;animation:pulse 1.5s ease-in-out infinite}
.preloader-spinner{width:40px;height:40px;border:3px solid rgba(249,161,27,.3);border-top-color:#f9a11b;border-radius:50%;animation:rotation .8s linear infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.5}}
</style>
<!-- AOS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"></noscript>
<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css"></noscript>
<!-- Preload Critical Fonts -->
<link rel="preload" href="{{ asset('front/fonts/Almarai-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('front/fonts/Almarai-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Preconnect & DNS Prefetch to CDNs -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<!-- Bootstrap CSS -->
<link href="{{ asset('front/libs/bootstrap/css/bootstrap'. (LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? '.rtl' : '') .'.min.css') }}" rel="stylesheet">
<!-- Swiper Css - deferred -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>
<!-- Fonts Awesome - defer non-critical -->
<link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}"></noscript>
<!-- Sweet Alert2 -->
<link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}"></noscript>
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">
<!-- Custom CSS -->
@if(app()->environment('production') && file_exists(public_path('front/css/main.min.css')))
<link rel="stylesheet" href="{{ asset('front/css/main.min.css') }}?v={{ filemtime(public_path('front/css/main.min.css')) }}">
@else
<link rel="stylesheet" href="{{ asset('front/css/main.css') }}?v={{ filemtime(public_path('front/css/main.css')) }}">
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5CS6PV98');</script>
<!-- End Google Tag Manager -->