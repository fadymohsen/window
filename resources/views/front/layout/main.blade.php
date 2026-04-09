<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('front.partials._head')
    @include('front.partials._structured-data')
    @yield('page_schema')
</head>

<body class="min-vh-100 d-flex flex-column">
    <!-- Page Preloader -->
    <div id="preloader">
        <img src="{{ asset('front/images/window-final logo-1.png') }}" alt="Loading..." class="preloader-logo">
        <div class="preloader-spinner"></div>
    </div>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CS6PV98"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @include('front.partials._nav')

    @yield('content')

    @include('front.partials._footer')
    @include('front.partials._jslibs')
</body>

</html>