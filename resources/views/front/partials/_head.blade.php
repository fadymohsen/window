<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@php
    $pageMetaTitle = View::yieldContent('meta_title');
    $pageTitle = View::yieldContent('title');
    $siteName = __('custom.site-name');
    $fullTitle = $pageMetaTitle ?: ($siteName . ' - ' . $pageTitle);
@endphp

<title>{{ $fullTitle }}</title>
<meta property="og:title" content="{{ $fullTitle }}">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta property="og:site_name" content="{{ $siteName }}">

<meta name="description" content="@yield('description', $website_settings->description)">
<meta property="og:description" content="@yield('description', $website_settings->description)">
<meta name="twitter:description" content="@yield('description', $website_settings->description)">

<meta property="og:url" content="{{ url()->current() }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'ar_SA' : 'en_US' }}">
<meta property="og:locale:alternate" content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'en_US' : 'ar_SA' }}">

<!-- Hreflang Tags -->
<link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
<link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
<link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">

<meta name="keywords" content="@yield('keywords', $website_settings->keywords)">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="@yield('display_image', $website_settings->display_cover)">
<meta property="og:image" content="@yield('display_image', $website_settings->display_cover)">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">


<link rel="shortcut icon" href="{{ $website_settings->display_logo }}" type="image/x-icon">
<link rel="icon" type="image/x-icon" href="{{ $website_settings->display_logo }}">

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
<!-- Preload Critical Font -->
<link rel="preload" href="{{ asset('front/fonts/Almarai-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('front/fonts/Almarai-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Preconnect to CDNs -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<!-- Bootstrap CSS -->
<link href="{{ asset('front/libs/bootstrap/css/bootstrap'. (LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? '.rtl' : '') .'.min.css') }}" rel="stylesheet">
<!-- Swiper Css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Fonts Awesome - defer non-critical -->
<link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}"></noscript>
<!-- Sweet Alert2 -->
<link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}"></noscript>
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/libs/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5CS6PV98');</script>
<!-- End Google Tag Manager -->