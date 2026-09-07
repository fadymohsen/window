<!DOCTYPE html>
<html lang="ar" dir="rtl" id="page-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عروض اليوم الوطني الـ96 — وكالة ويندو للدعاية والإعلان</title>
    <meta name="description" content="عروض اليوم الوطني السعودي الـ96 من وكالة ويندو — أسعار مميزة على الهدايا والطباعة والديكورات والفعاليات. احجز الآن قبل نفاذ الكمية!">
    <meta name="robots" content="noindex, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=3">

    <!-- Open Graph -->
    <meta property="og:title" content="عروض اليوم الوطني الـ96 — وكالة ويندو">
    <meta property="og:description" content="أسعار مميزة على هدايا وطباعة وديكورات اليوم الوطني السعودي الـ96. احجز قبل نفاذ الكمية!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://windowadv.com/national-day-offers">
    <meta property="og:image" content="{{ asset('front/images/national-day-96-og.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="ar_SA">
    <meta property="og:site_name" content="وكالة ويندو للدعاية والإعلان">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="عروض اليوم الوطني الـ96 — وكالة ويندو">
    <meta name="twitter:description" content="أسعار مميزة على هدايا وطباعة وديكورات اليوم الوطني السعودي الـ96.">
    <meta name="twitter:image" content="{{ asset('front/images/national-day-96-og.jpg') }}">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5CS6PV98');</script>

    <!-- Bootstrap RTL -->
    <link href="{{ asset('front/libs/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('front/libs/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('front/libs/sweetalert2/sweet.css') }}">

    <style>
        @font-face {
            font-family: 'Almarai';
            src: url('{{ asset("front/fonts/Almarai-Regular.woff2") }}') format('woff2');
            font-weight: 400;
            font-display: swap;
        }
        @font-face {
            font-family: 'Almarai';
            src: url('{{ asset("front/fonts/Almarai-Bold.woff2") }}') format('woff2');
            font-weight: 700;
            font-display: swap;
        }
        @font-face {
            font-family: 'Almarai';
            src: url('{{ asset("front/fonts/Almarai-ExtraBold.woff2") }}') format('woff2');
            font-weight: 800;
            font-display: swap;
        }

        :root {
            --lp-dark:       #0d1a10;
            --lp-green:      #006837;
            --lp-green-mid:  #00943e;
            --lp-gold:       #f9a11b;
            --lp-gold-dark:  #c8780a;
            --lp-card-bg:    #152019;
            --lp-light-bg:   #f2f7f3;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Almarai', 'Segoe UI', sans-serif;
            background: var(--lp-dark);
            color: #fff;
            overflow-x: hidden;
            font-size: 15px;
            line-height: 1.7;
        }

        /* ─── Language toggle ─── */
        [data-lang="en"] { display: none; }
        html[data-active-lang="en"] [data-lang="ar"] { display: none; }
        html[data-active-lang="en"] [data-lang="en"] { display: revert; }

        .lang-btn {
            background: transparent;
            color: #fff;
            border: 1.5px solid rgba(255,255,255,0.4);
            border-radius: 6px;
            padding: 5px 14px;
            font-size: 0.82rem;
            font-weight: 700;
            font-family: 'Almarai', sans-serif;
            cursor: pointer;
            transition: all 0.25s;
        }
        .lang-btn:hover { border-color: var(--lp-gold); color: var(--lp-gold); }

        /* ─── Urgency bar ─── */
        .urgency-bar {
            background: #c0392b;
            color: #fff;
            text-align: center;
            padding: 9px 16px;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        /* ─── Sticky Header ─── */
        .lp-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(10, 22, 13, 0.97);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--lp-gold);
            padding: 10px 0;
        }
        .lp-header .inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        .lp-logo { height: 44px; width: auto; }
        .nd-header-label {
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--lp-gold);
        }
        .lp-header-actions { display: flex; gap: 8px; align-items: center; }

        /* ─── Shared Buttons ─── */
        .btn-gold, .btn-wa, .btn-call {
            font-family: 'Almarai', sans-serif;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.25s;
            cursor: pointer;
            border: none;
        }
        .btn-gold {
            background: var(--lp-gold);
            color: #111;
            padding: 11px 22px;
        }
        .btn-gold:hover { background: var(--lp-gold-dark); color: #111; transform: translateY(-2px); }

        .btn-wa {
            background: #25d366;
            color: #fff;
            padding: 10px 18px;
            font-size: 0.9rem;
        }
        .btn-wa:hover { background: #1aa44e; color: #fff; }

        .btn-call {
            background: transparent;
            color: #fff;
            border: 1.5px solid #fff;
            padding: 8px 16px;
            font-size: 0.88rem;
        }
        .btn-call:hover { background: #fff; color: var(--lp-dark); }

        /* ─── Hero ─── */
        .lp-hero {
            background: radial-gradient(ellipse at 70% 30%, #0a3a1a 0%, #051209 60%, #020c04 100%);
            padding: 60px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .lp-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 600px 400px at 80% 20%, rgba(0,104,55,0.25) 0%, transparent 70%),
                radial-gradient(ellipse 400px 400px at 10% 80%, rgba(249,161,27,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .nd-badge {
            display: inline-block;
            background: var(--lp-gold);
            color: #111;
            font-weight: 800;
            font-size: 0.82rem;
            padding: 5px 16px;
            border-radius: 50px;
            margin-bottom: 18px;
        }
        .nd-slogan {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            color: var(--lp-gold);
            line-height: 1.15;
            margin-bottom: 12px;
        }
        .nd-headline {
            font-size: clamp(1.15rem, 2.5vw, 1.6rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.55;
            margin-bottom: 18px;
        }
        .nd-sub {
            font-size: 0.96rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 24px;
            line-height: 1.9;
        }

        /* ─── Lead Form Card ─── */
        .lp-form-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px 26px;
            box-shadow: 0 24px 64px rgba(0,0,0,0.45);
            position: relative;
            z-index: 2;
            color: #111;
        }
        .lp-form-card h3 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #111;
            margin-bottom: 5px;
            text-align: center;
        }
        .form-sub {
            font-size: 0.82rem;
            color: #777;
            text-align: center;
            margin-bottom: 20px;
        }
        .lp-input {
            font-family: 'Almarai', sans-serif;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 0.93rem;
            color: #222;
            width: 100%;
            transition: border-color 0.25s, box-shadow 0.25s;
            margin-bottom: 14px;
            display: block;
        }
        .lp-input:focus {
            outline: none;
            border-color: var(--lp-green);
            box-shadow: 0 0 0 3px rgba(0,104,55,0.12);
        }
        .lp-input::placeholder { color: #aaa; }

        .btn-submit {
            width: 100%;
            background: var(--lp-green);
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 800;
            font-family: 'Almarai', sans-serif;
            cursor: pointer;
            transition: background 0.25s, transform 0.2s;
            position: relative;
        }
        .btn-submit:hover { background: #004e29; transform: translateY(-2px); }
        .btn-submit:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }

        .form-note {
            font-size: 0.76rem;
            color: #999;
            text-align: center;
            margin-top: 10px;
        }
        .form-note a { color: var(--lp-green); font-weight: 700; text-decoration: none; }

        .gold-divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--lp-gold), transparent);
        }

        /* ─── Section shared ─── */
        .section-wrap { padding: 64px 0; }
        .section-title {
            font-size: clamp(1.4rem, 3vw, 1.85rem);
            font-weight: 800;
            text-align: center;
            margin-bottom: 8px;
        }
        .section-sub {
            text-align: center;
            color: #777;
            margin-bottom: 40px;
            font-size: 0.95rem;
        }

        /* ─── Offers Grid ─── */
        .lp-offers { background: var(--lp-light-bg); }
        .lp-offers .section-title { color: #111; }

        .offer-card {
            background: #fff;
            border-radius: 14px;
            padding: 24px 18px 20px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(0,0,0,0.07);
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
            height: 100%;
            border-bottom: 3px solid transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .offer-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 32px rgba(0,0,0,0.12);
            border-bottom-color: var(--lp-gold);
        }
        .offer-icon { font-size: 2.2rem; display: block; margin-bottom: 10px; }
        .offer-title { font-size: 0.92rem; font-weight: 800; color: #111; margin-bottom: 6px; }
        .offer-desc { font-size: 0.78rem; color: #666; line-height: 1.65; margin-bottom: 12px; flex-grow: 1; }
        .offer-price {
            background: var(--lp-green);
            color: #fff;
            font-weight: 800;
            font-size: 1.05rem;
            padding: 6px 18px;
            border-radius: 50px;
            display: inline-block;
        }
        .offer-note {
            font-size: 0.7rem;
            color: #999;
            margin-top: 6px;
        }

        /* ─── More services ─── */
        .lp-more { background: var(--lp-dark); }
        .lp-more .section-title { color: #fff; }
        .lp-more .section-sub { color: rgba(255,255,255,0.6); }

        .more-card {
            background: var(--lp-card-bg);
            border: 1.5px solid rgba(0,148,62,0.3);
            border-radius: 14px;
            padding: 28px 18px;
            text-align: center;
            height: 100%;
            transition: border-color 0.3s, transform 0.3s;
        }
        .more-card:hover {
            border-color: var(--lp-gold);
            transform: translateY(-5px);
        }
        .more-icon { font-size: 2rem; display: block; margin-bottom: 12px; }
        .more-title { font-size: 0.95rem; font-weight: 800; color: #fff; margin-bottom: 8px; }
        .more-desc { font-size: 0.8rem; color: rgba(255,255,255,0.6); line-height: 1.7; }

        /* ─── CTA / Bottom Form ─── */
        .lp-cta {
            background: linear-gradient(145deg, #005229 0%, #003d1e 100%);
            padding: 70px 0;
            position: relative;
            overflow: hidden;
        }
        .lp-cta::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }
        .cta-title {
            font-size: clamp(1.5rem, 3.5vw, 2.1rem);
            font-weight: 800;
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .cta-sub {
            text-align: center;
            color: rgba(255,255,255,0.8);
            margin-bottom: 40px;
            font-size: 0.96rem;
        }
        .lp-cta .lp-form-card { max-width: 530px; margin: 0 auto; }

        /* ─── VAT notice ─── */
        .vat-notice {
            text-align: center;
            padding: 14px 0;
            background: #111;
            color: rgba(255,255,255,0.5);
            font-size: 0.78rem;
        }

        /* ─── Footer ─── */
        .lp-footer {
            background: #050d06;
            padding: 22px 0;
            border-top: 2px solid var(--lp-green);
        }
        .lp-footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
        }
        .lp-footer-logo { height: 38px; }
        .footer-links { display: flex; gap: 16px; flex-wrap: wrap; align-items: center; }
        .footer-links a {
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--lp-gold); }
        .footer-copy { color: rgba(255,255,255,0.4); font-size: 0.78rem; }

        /* ─── Floating WhatsApp ─── */
        .float-wa {
            position: fixed;
            bottom: 28px;
            left: 22px;
            background: #25d366;
            color: #fff;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            box-shadow: 0 4px 20px rgba(37,211,102,0.5);
            z-index: 999;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: wa-pulse 2.5s ease-in-out infinite;
        }
        .float-wa:hover { transform: scale(1.12); box-shadow: 0 6px 30px rgba(37,211,102,0.75); color: #fff; }

        @keyframes wa-pulse {
            0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.5); }
            50% { box-shadow: 0 4px 28px rgba(37,211,102,0.8), 0 0 0 10px rgba(37,211,102,0.1); }
        }

        /* ─── Responsive ─── */
        @media (max-width: 767px) {
            .lp-hero { padding: 40px 0 50px; }
            .nd-slogan { font-size: 1.9rem; }
            .nd-header-label { display: none; }
            .section-wrap { padding: 48px 0; }
            .float-wa { bottom: 18px; left: 14px; width: 50px; height: 50px; font-size: 1.5rem; }
        }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CS6PV98"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- Urgency Bar -->
    <div class="urgency-bar">
        <span data-lang="ar">&#9889; العروض سارية لفترة محدودة — احجز الآن قبل نفاذ الكمية!</span>
        <span data-lang="en">&#9889; Limited-time offers — Book now before they run out!</span>
    </div>

    <!-- Sticky Header -->
    <header class="lp-header">
        <div class="container inner">
            <a href="{{ url('/') }}" target="_blank" rel="noopener">
                <img src="{{ asset('front/images/window-final logo-1.png') }}" alt="وكالة ويندو للدعاية والإعلان" class="lp-logo">
            </a>
            <span class="nd-header-label">
                <span data-lang="ar">&#127466;&#127462; عروض اليوم الوطني الـ96</span>
                <span data-lang="en">&#127466;&#127462; National Day 96 Offers</span>
            </span>
            <div class="lp-header-actions">
                <button class="lang-btn" id="lang-toggle">EN</button>
                <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}" class="btn-call d-none d-sm-inline-block">
                    <i class="fas fa-phone-alt fa-sm"></i>
                    <span data-lang="ar">اتصل بنا</span>
                    <span data-lang="en">Call Us</span>
                </a>
                <a href="https://wa.me/966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%D8%8C%20%D8%A3%D8%A8%D9%8A%20%D8%A3%D8%B3%D8%AA%D9%81%D8%B3%D8%B1%20%D8%B9%D9%86%20%D8%B9%D8%B1%D9%88%D8%B6%20%D8%A7%D9%84%D9%8A%D9%88%D9%85%20%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%20%D8%A7%D9%84%D9%80%2096"
                   target="_blank" rel="noopener" class="btn-wa">
                    <i class="fab fa-whatsapp"></i>
                    <span data-lang="ar">واتساب</span>
                    <span data-lang="en">WhatsApp</span>
                </a>
            </div>
        </div>
    </header>

    <!-- ═══════════════════ HERO ═══════════════════ -->
    <section class="lp-hero">
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center gy-5">

                <!-- Form column -->
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="lp-form-card">
                        <h3>
                            <span data-lang="ar">&#127919; احجز عرضك الآن</span>
                            <span data-lang="en">&#127919; Book Your Offer Now</span>
                        </h3>
                        <p class="form-sub">
                            <span data-lang="ar">سيتواصل معك فريقنا خلال ساعات</span>
                            <span data-lang="en">Our team will contact you within hours</span>
                        </p>
                        <form id="lead-form-hero" novalidate autocomplete="off">
                            @csrf
                            <input type="text"  name="full_name"    class="lp-input" data-ph-ar="الاسم الكامل *" data-ph-en="Full Name *" placeholder="الاسم الكامل *" required>
                            <input type="tel"   name="phone_number" class="lp-input" data-ph-ar="رقم الجوال *" data-ph-en="Phone Number *" placeholder="رقم الجوال *" required>
                            <input type="email" name="email"        class="lp-input" data-ph-ar="البريد الإلكتروني (اختياري)" data-ph-en="Email (optional)" placeholder="البريد الإلكتروني (اختياري)">
                            <input type="text"  name="company_name" class="lp-input" data-ph-ar="اسم الشركة أو الجهة *" data-ph-en="Company Name *" placeholder="اسم الشركة أو الجهة *" required>
                            <button type="submit" class="btn-submit">
                                <span class="btn-text">
                                    <span data-lang="ar">احصل على عرض السعر الآن</span>
                                    <span data-lang="en">Get Your Quote Now</span>
                                </span>
                                <i class="fas fa-arrow-left me-2"></i>
                            </button>
                        </form>
                        <p class="form-note">
                            <span data-lang="ar">&#128274; معلوماتك آمنة ولن تُشارك مع أي طرف ثالث</span>
                            <span data-lang="en">&#128274; Your information is secure and never shared</span>
                        </p>
                    </div>
                </div>

                <!-- Text column -->
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="nd-badge">
                        <span data-lang="ar">&#127466;&#127462; عروض اليوم الوطني الـ96</span>
                        <span data-lang="en">&#127466;&#127462; National Day 96 Offers</span>
                    </div>
                    <div class="nd-slogan">
                        <span data-lang="ar">عروض اليوم الوطني وصلت!</span>
                        <span data-lang="en">National Day Offers Are Here!</span>
                    </div>
                    <h1 class="nd-headline">
                        <span data-lang="ar">أسعار مميزة واحتفال يليق بشركتك — من وكالة ويندو للدعاية والإعلان</span>
                        <span data-lang="en">Special prices and a celebration worthy of your company — from Window Advertising Agency</span>
                    </h1>
                    <p class="nd-sub">
                        <span data-lang="ar">هدايا، طباعة، ديكورات، فعاليات، وتصاميم سوشيال ميديا — كل ما تحتاجه لاحتفال اليوم الوطني الـ96 بأسعار لا تتكرر</span>
                        <span data-lang="en">Gifts, printing, decorations, events, and social media designs — everything you need for National Day 96 at unbeatable prices</span>
                    </p>
                    <a href="#cta-form" class="btn-gold" style="font-size:1rem;padding:14px 28px;">
                        <span data-lang="ar">اطلب عرضك الآن <i class="fas fa-arrow-left me-2"></i></span>
                        <span data-lang="en">Order Now <i class="fas fa-arrow-right ms-2"></i></span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <div class="gold-divider"></div>

    <!-- ═══════════════════ OFFERS ═══════════════════ -->
    <section class="lp-offers section-wrap">
        <div class="container">
            <h2 class="section-title" style="color:#111;">
                <span data-lang="ar">عروضنا المميزة لليوم الوطني الـ96</span>
                <span data-lang="en">Our Special National Day 96 Offers</span>
            </h2>
            <p class="section-sub">
                <span data-lang="ar">أسعار حصرية لفترة محدودة — احجز قبل نفاذ الكمية</span>
                <span data-lang="en">Exclusive limited-time prices — Book before they sell out</span>
            </p>

            <div class="row g-3 g-md-4">
                <!-- 1. Reels -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#127909;</span>
                        <p class="offer-title">
                            <span data-lang="ar">ريلز بشعار شركتك</span>
                            <span data-lang="en">Reels with Your Logo</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">ريلز بشعار شركتك وفويس أوفر باسم شركتك</span>
                            <span data-lang="en">Reels with your company logo and voiceover featuring your company name</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">150 ريال</span>
                            <span data-lang="en">150 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 2. Post -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#128247;</span>
                        <p class="offer-title">
                            <span data-lang="ar">بوست اليوم الوطني</span>
                            <span data-lang="en">National Day Post</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">بوست اليوم الوطني بشعار شركتك</span>
                            <span data-lang="en">National Day social media post with your company logo</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">50 ريال</span>
                            <span data-lang="en">50 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 3. Feather Flag -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#127988;</span>
                        <p class="offer-title">
                            <span data-lang="ar">علم ريشة بطباعة خاصة</span>
                            <span data-lang="en">Custom Feather Flag</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">علم ريشة بطباعة خاصة بشعار شركتك</span>
                            <span data-lang="en">Feather flag with custom print featuring your company logo</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">400 ريال</span>
                            <span data-lang="en">400 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 4. Roll-up -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#128220;</span>
                        <p class="offer-title">
                            <span data-lang="ar">رول أب اليوم الوطني</span>
                            <span data-lang="en">National Day Roll-up Banner</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">رول أب اليوم الوطني جاهز للعرض</span>
                            <span data-lang="en">National Day roll-up banner ready to display</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">120 ريال</span>
                            <span data-lang="en">120 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 5. Notebook -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#128211;</span>
                        <p class="offer-title">
                            <span data-lang="ar">نوت بوك اليوم الوطني</span>
                            <span data-lang="en">National Day Notebook</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">نوت بوك بشعار اليوم الوطني</span>
                            <span data-lang="en">Notebook with National Day branding</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">12 ريال</span>
                            <span data-lang="en">12 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 6. Scarf -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#129513;</span>
                        <p class="offer-title">
                            <span data-lang="ar">وشاح اليوم الوطني</span>
                            <span data-lang="en">National Day Scarf</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">وشاح اليوم الوطني — والتفصيل الخاص متوفر</span>
                            <span data-lang="en">National Day scarf — custom designs available</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">12 ريال</span>
                            <span data-lang="en">12 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 7. Promotional Cube -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#129531;</span>
                        <p class="offer-title">
                            <span data-lang="ar">مكعب دعائي</span>
                            <span data-lang="en">Promotional Cube</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">مكعب دعائي بتفصيل خاص</span>
                            <span data-lang="en">Custom-designed promotional cube</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">160 ريال</span>
                            <span data-lang="en">160 SAR</span>
                        </span>
                        <p class="offer-note">
                            <span data-lang="ar">الحد الأدنى 3 حبات</span>
                            <span data-lang="en">Minimum order: 3 pieces</span>
                        </p>
                    </div>
                </div>

                <!-- 8. Photo Backdrop -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#127912;</span>
                        <p class="offer-title">
                            <span data-lang="ar">باك دروب للتصوير</span>
                            <span data-lang="en">Photo Backdrop</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">باك دروب للتصوير، 3×2 متر</span>
                            <span data-lang="en">Photo backdrop, 3×2 meters</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">1,500 ريال</span>
                            <span data-lang="en">1,500 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 9. Cap -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#129506;</span>
                        <p class="offer-title">
                            <span data-lang="ar">كاب بشعار شركتك</span>
                            <span data-lang="en">Cap with Your Logo</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">كاب بشعار شركتك وشعار اليوم الوطني</span>
                            <span data-lang="en">Cap with your company logo and National Day branding</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">10 ريال</span>
                            <span data-lang="en">10 SAR</span>
                        </span>
                    </div>
                </div>

                <!-- 10. Brooch -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#128141;</span>
                        <p class="offer-title">
                            <span data-lang="ar">بروش اليوم الوطني</span>
                            <span data-lang="en">National Day Brooch</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">بروش اليوم الوطني للموظفين والضيوف</span>
                            <span data-lang="en">National Day brooch for employees and guests</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">6 ريال</span>
                            <span data-lang="en">6 SAR</span>
                        </span>
                        <p class="offer-note">
                            <span data-lang="ar">الحد الأدنى 20 حبة</span>
                            <span data-lang="en">Minimum order: 20 pieces</span>
                        </p>
                    </div>
                </div>

                <!-- 11. Thermal Mug -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="offer-card">
                        <span class="offer-icon">&#9749;</span>
                        <p class="offer-title">
                            <span data-lang="ar">مج حراري فاخر</span>
                            <span data-lang="en">Premium Thermal Mug</span>
                        </p>
                        <p class="offer-desc">
                            <span data-lang="ar">مج حراري فاخر بشعار اليوم الوطني</span>
                            <span data-lang="en">Premium thermal mug with National Day branding</span>
                        </p>
                        <span class="offer-price">
                            <span data-lang="ar">12 ريال</span>
                            <span data-lang="en">12 SAR</span>
                        </span>
                        <p class="offer-note">
                            <span data-lang="ar">الحد الأدنى 20 حبة</span>
                            <span data-lang="en">Minimum order: 20 pieces</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="gold-divider"></div>

    <!-- ═══════════════════ MORE SERVICES ═══════════════════ -->
    <section class="lp-more section-wrap">
        <div class="container">
            <h2 class="section-title">
                <span data-lang="ar">وكمان عندنا!</span>
                <span data-lang="en">We Also Offer!</span>
            </h2>
            <p class="section-sub">
                <span data-lang="ar">خدمات إضافية لاحتفال متكامل — تواصل معنا للتفاصيل والأسعار</span>
                <span data-lang="en">Additional services for a complete celebration — Contact us for details and pricing</span>
            </p>

            <div class="row g-3 g-md-4 justify-content-center">
                <div class="col-6 col-md-4">
                    <div class="more-card">
                        <span class="more-icon">&#127873;</span>
                        <p class="more-title">
                            <span data-lang="ar">علب هدايا الموظفين</span>
                            <span data-lang="en">Employee Gift Boxes</span>
                        </p>
                        <p class="more-desc">
                            <span data-lang="ar">علب هدايا وستاندات وتجهيزات خاصة بشعار شركتك</span>
                            <span data-lang="en">Gift boxes, stands, and custom setups with your company logo</span>
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="more-card">
                        <span class="more-icon">&#127881;</span>
                        <p class="more-title">
                            <span data-lang="ar">حفلات وفعاليات الشركات</span>
                            <span data-lang="en">Corporate Events & Parties</span>
                        </p>
                        <p class="more-desc">
                            <span data-lang="ar">حفلات، مؤتمرات وفعاليات الشركات بتنظيم وتنفيذ متكامل</span>
                            <span data-lang="en">Parties, conferences, and corporate events with full planning and execution</span>
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="more-card">
                        <span class="more-icon">&#127968;</span>
                        <p class="more-title">
                            <span data-lang="ar">ديكورات وتجهيزات المقرات</span>
                            <span data-lang="en">Office Decorations & Setup</span>
                        </p>
                        <p class="more-desc">
                            <span data-lang="ar">تجهيز مقر شركتك بالكامل لاحتفالات اليوم الوطني</span>
                            <span data-lang="en">Full National Day decoration setup for your company premises</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════ BOTTOM CTA FORM ═══════════════════ -->
    <section class="lp-cta" id="cta-form">
        <div class="container position-relative" style="z-index:2;">
            <h2 class="cta-title">
                <span data-lang="ar">خل احتفال شركتك باليوم الوطني الـ96 مختلف!</span>
                <span data-lang="en">Make your company's National Day 96 celebration unforgettable!</span>
            </h2>
            <p class="cta-sub">
                <span data-lang="ar">احجز الآن قبل نفاذ الكمية — العروض سارية لفترة محدودة</span>
                <span data-lang="en">Book now before stock runs out — Offers valid for a limited time</span>
            </p>

            <div class="lp-form-card">
                <h3>
                    <span data-lang="ar">&#127466;&#127462; احجز عرضك الآن</span>
                    <span data-lang="en">&#127466;&#127462; Book Your Offer Now</span>
                </h3>
                <p class="form-sub">
                    <span data-lang="ar">فريقنا سيتواصل معك لتقديم عرض سعر مخصص</span>
                    <span data-lang="en">Our team will contact you with a custom quote</span>
                </p>

                <form id="lead-form-bottom" novalidate autocomplete="off">
                    @csrf
                    <input type="text"  name="full_name"    class="lp-input" data-ph-ar="الاسم الكامل *" data-ph-en="Full Name *" placeholder="الاسم الكامل *" required>
                    <input type="tel"   name="phone_number" class="lp-input" data-ph-ar="رقم الجوال *" data-ph-en="Phone Number *" placeholder="رقم الجوال *" required>
                    <input type="email" name="email"        class="lp-input" data-ph-ar="البريد الإلكتروني (اختياري)" data-ph-en="Email (optional)" placeholder="البريد الإلكتروني (اختياري)">
                    <input type="text"  name="company_name" class="lp-input" data-ph-ar="اسم الشركة أو الجهة *" data-ph-en="Company Name *" placeholder="اسم الشركة أو الجهة *" required>
                    <button type="submit" class="btn-submit">
                        <span class="btn-text">
                            <span data-lang="ar">أرسل طلبك الآن — الاستشارة مجانية</span>
                            <span data-lang="en">Submit Your Request — Free Consultation</span>
                        </span>
                        <i class="fas fa-arrow-left me-2"></i>
                    </button>
                </form>

                <p class="form-note">
                    <span data-lang="ar">
                        &#128222; أو اتصل مباشرة:
                        <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}">
                            {{ $website_settings->phone_number ?? '+966592945557' }}
                        </a>
                    </span>
                    <span data-lang="en">
                        &#128222; Or call directly:
                        <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}">
                            {{ $website_settings->phone_number ?? '+966592945557' }}
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- VAT Notice -->
    <div class="vat-notice">
        <span data-lang="ar">* جميع الأسعار لا تشمل ضريبة القيمة المضافة (15%)</span>
        <span data-lang="en">* All prices are exclusive of VAT (15%)</span>
    </div>

    <!-- ═══════════════════ FOOTER ═══════════════════ -->
    <footer class="lp-footer">
        <div class="container">
            <div class="lp-footer-inner">
                <img src="{{ asset('front/images/window-final logo-1.png') }}" alt="وكالة ويندو" class="lp-footer-logo">
                <div class="footer-links">
                    <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}">
                        <i class="fas fa-phone-alt fa-sm"></i>
                        {{ $website_settings->phone_number ?? '+966592945557' }}
                    </a>
                    <a href="https://maps.app.goo.gl/hJBnz8GRZqQd86rq7" target="_blank" rel="noopener">
                        <i class="fas fa-location-dot fa-sm"></i>
                        <span data-lang="ar">الرياض، المملكة العربية السعودية</span>
                        <span data-lang="en">Riyadh, Saudi Arabia</span>
                    </a>
                </div>
                <p class="footer-copy">
                    <span data-lang="ar">&copy; {{ date('Y') }} وكالة ويندو للدعاية والإعلان</span>
                    <span data-lang="en">&copy; {{ date('Y') }} Window Advertising Agency</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%D8%8C%20%D8%A3%D8%A8%D9%8A%20%D8%A3%D8%B3%D8%AA%D9%81%D8%B3%D8%B1%20%D8%B9%D9%86%20%D8%B9%D8%B1%D9%88%D8%B6%20%D8%A7%D9%84%D9%8A%D9%88%D9%85%20%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%20%D8%A7%D9%84%D9%80%2096"
       target="_blank" rel="noopener" class="float-wa" title="واتساب">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('front/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('front/libs/sweetalert2/sweet.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

    <script>
    (function ($) {
        // ─── Language Toggle ───
        var currentLang = 'ar';
        var $root = $('#page-root');

        $('#lang-toggle').on('click', function () {
            currentLang = currentLang === 'ar' ? 'en' : 'ar';
            $root.attr('data-active-lang', currentLang);
            $root.attr('lang', currentLang);
            $root.attr('dir', currentLang === 'ar' ? 'rtl' : 'ltr');

            // Swap Bootstrap RTL/LTR is handled by dir attribute
            $(this).text(currentLang === 'ar' ? 'EN' : 'AR');

            // Update placeholders
            $('.lp-input').each(function () {
                var ph = $(this).data('ph-' + currentLang);
                if (ph) $(this).attr('placeholder', ph);
            });
        });

        // ─── Lead Form Submission ───
        var STORE_URL = '{{ route("landing.national-day-offers.store") }}';
        var CSRF     = $('meta[name="csrf-token"]').attr('content');

        var messages = {
            ar: {
                nameRequired:    'يرجى إدخال الاسم الكامل',
                phoneRequired:   'يرجى إدخال رقم جوال صحيح',
                companyRequired: 'يرجى إدخال اسم الشركة أو الجهة',
                sending:         '<i class="fas fa-spinner fa-spin me-2"></i> جاري الإرسال...',
                successTitle:    'تم الإرسال بنجاح!',
                successText:     'شكراً! سيتواصل معك فريق ويندو في أقرب وقت.',
                successBtn:      'شكراً',
                errorTitle:      'خطأ',
                errorText:       'حدث خطأ، يرجى المحاولة مرة أخرى أو التواصل عبر واتساب.',
                errorBtn:        'حسناً',
                warning:         'تنبيه'
            },
            en: {
                nameRequired:    'Please enter your full name',
                phoneRequired:   'Please enter a valid phone number',
                companyRequired: 'Please enter your company name',
                sending:         '<i class="fas fa-spinner fa-spin me-2"></i> Sending...',
                successTitle:    'Sent Successfully!',
                successText:     'Thank you! Our team will contact you shortly.',
                successBtn:      'Thanks',
                errorTitle:      'Error',
                errorText:       'An error occurred. Please try again or contact us via WhatsApp.',
                errorBtn:        'OK',
                warning:         'Notice'
            }
        };

        function msg(key) { return messages[currentLang][key]; }

        function submitLead(form) {
            var $form      = $(form);
            var $btn       = $form.find('.btn-submit');
            var $btnText   = $btn.find('.btn-text');
            var origHtml   = $btnText.html();

            var fullName    = $.trim($form.find('[name="full_name"]').val());
            var phone       = $.trim($form.find('[name="phone_number"]').val());
            var email       = $.trim($form.find('[name="email"]').val());
            var companyName = $.trim($form.find('[name="company_name"]').val());

            if (!fullName) {
                return Swal.fire({ icon: 'warning', title: msg('warning'), text: msg('nameRequired'), confirmButtonText: msg('errorBtn'), confirmButtonColor: '#006837' });
            }
            if (!phone || phone.replace(/\D/g,'').length < 7) {
                return Swal.fire({ icon: 'warning', title: msg('warning'), text: msg('phoneRequired'), confirmButtonText: msg('errorBtn'), confirmButtonColor: '#006837' });
            }
            if (!companyName) {
                return Swal.fire({ icon: 'warning', title: msg('warning'), text: msg('companyRequired'), confirmButtonText: msg('errorBtn'), confirmButtonColor: '#006837' });
            }

            $btn.prop('disabled', true);
            $btnText.html(msg('sending'));

            $.ajax({
                url:    STORE_URL,
                method: 'POST',
                data: {
                    _token:       CSRF,
                    full_name:    fullName,
                    phone_number: phone,
                    email:        email || '',
                    company_name: companyName
                },
                success: function () {
                    Swal.fire({
                        icon:              'success',
                        title:             msg('successTitle'),
                        text:              msg('successText'),
                        confirmButtonText: msg('successBtn'),
                        confirmButtonColor: '#006837'
                    });
                    $form[0].reset();
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON && xhr.responseJSON.errors;
                    var errMsg = msg('errorText');
                    if (errors) {
                        errMsg = Object.values(errors).map(function(e){ return e[0]; }).join('\n');
                    }
                    Swal.fire({ icon: 'error', title: msg('errorTitle'), text: errMsg, confirmButtonText: msg('errorBtn'), confirmButtonColor: '#006837' });
                },
                complete: function () {
                    $btn.prop('disabled', false);
                    $btnText.html(origHtml);
                }
            });
        }

        $('#lead-form-hero, #lead-form-bottom').on('submit', function (e) {
            e.preventDefault();
            submitLead(this);
        });

        // Smooth scroll for anchor CTA
        $('a[href="#cta-form"]').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $('#cta-form').offset().top - 70 }, 580);
        });
    }(jQuery));
    </script>
</body>
</html>
