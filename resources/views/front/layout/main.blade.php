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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBGC86X4"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @include('front.partials._nav')

    @yield('content')

    @include('front.partials._footer')
    @include('front.partials._jslibs')

    <!-- National Day 96 Offers Popup -->
    <div id="nd96-popup-overlay" style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(0,0,0,0.6); backdrop-filter:blur(4px); justify-content:center; align-items:center;">
        <div id="nd96-popup" style="background:linear-gradient(145deg, #003d1e 0%, #006837 100%); border-radius:20px; max-width:420px; width:92%; padding:36px 28px 28px; position:relative; box-shadow:0 24px 64px rgba(0,0,0,0.5); border:2px solid rgba(249,161,27,0.4); text-align:center; animation: nd96PopIn 0.35s ease-out;">
            <button id="nd96-popup-close" style="position:absolute; top:12px; {{ app()->getLocale() === 'ar' ? 'left' : 'right' }}:14px; background:rgba(255,255,255,0.15); border:none; color:#fff; width:32px; height:32px; border-radius:50%; font-size:1.1rem; cursor:pointer; display:flex; align-items:center; justify-content:center;" aria-label="Close">&times;</button>
            <div style="font-size:2.8rem; margin-bottom:10px;">🇸🇦</div>
            <h3 style="color:#f9a11b; font-weight:800; font-size:1.35rem; margin-bottom:8px;">
                {{ app()->getLocale() === 'ar' ? 'عروض اليوم الوطني الـ96 وصلت!' : 'National Day 96 Offers Are Here!' }}
            </h3>
            <p style="color:rgba(255,255,255,0.85); font-size:0.92rem; line-height:1.7; margin-bottom:22px;">
                {{ app()->getLocale() === 'ar' ? 'أسعار مميزة على الهدايا، الوشاحات، الطباعة، باقات السوشيال ميديا وأكثر — العروض لفترة محدودة!' : 'Special prices on gifts, scarves, printing, social media packages & more — Limited-time offers!' }}
            </p>
            <a href="{{ route('front.national-day-offers') }}" id="nd96-popup-cta" style="display:inline-block; background:#f9a11b; color:#111; font-weight:800; font-size:1rem; padding:13px 32px; border-radius:10px; text-decoration:none; transition:all 0.25s;">
                {{ app()->getLocale() === 'ar' ? 'اكتشف العروض الآن' : 'Explore Offers Now' }}
                <i class="fa-solid fa-arrow-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="margin-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}:6px;"></i>
            </a>
            <p style="color:rgba(255,255,255,0.4); font-size:0.72rem; margin-top:14px; margin-bottom:0;">
                {{ app()->getLocale() === 'ar' ? '* الأسعار لا تشمل ضريبة القيمة المضافة' : '* Prices are exclusive of VAT' }}
            </p>
        </div>
    </div>
    <style>
        @keyframes nd96PopIn {
            from { opacity: 0; transform: scale(0.9) translateY(20px); }
            to   { opacity: 1; transform: scale(1)   translateY(0); }
        }
        #nd96-popup-cta:hover { background: #c8780a !important; transform: translateY(-2px); }
        #nd96-popup-close:hover { background: rgba(255,255,255,0.3) !important; }
    </style>
    <script>
    (function(){
        var POPUP_KEY = 'nd96_popup_shown';
        if (sessionStorage.getItem(POPUP_KEY)) return;

        var shown = false;
        function showPopup() {
            if (shown) return;
            shown = true;
            var overlay = document.getElementById('nd96-popup-overlay');
            if (!overlay) return;
            overlay.style.display = 'flex';
            sessionStorage.setItem(POPUP_KEY, '1');
        }

        // Trigger after 10 seconds
        var timer = setTimeout(showPopup, 10000);

        // Trigger at 50% scroll
        function onScroll() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            if (docHeight > 0 && (scrollTop / docHeight) >= 0.5) {
                showPopup();
                window.removeEventListener('scroll', onScroll);
            }
        }
        window.addEventListener('scroll', onScroll);

        // Close popup
        document.addEventListener('click', function(e) {
            if (e.target.id === 'nd96-popup-close' || e.target.id === 'nd96-popup-overlay') {
                document.getElementById('nd96-popup-overlay').style.display = 'none';
                clearTimeout(timer);
                window.removeEventListener('scroll', onScroll);
            }
        });
    })();
    </script>
</body>

</html>