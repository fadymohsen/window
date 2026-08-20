<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اليوم الوطني السعودي الـ96 — خدمات الدعاية والاحتفال | وكالة ويندو</title>
    <meta name="description" content="وكالة ويندو للدعاية والإعلان — خبرة 25 عاماً في تنفيذ اليوم الوطني السعودي للشركات والجهات الحكومية. ديكورات، هدايا، فعاليات، مجسمات، وشاحات. من الفكرة إلى التنفيذ.">
    <meta name="robots" content="noindex, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=3">

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

        .trust-list { list-style: none; margin-bottom: 30px; }
        .trust-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.9);
        }
        .trust-list li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            min-width: 20px;
            background: var(--lp-gold);
            color: #111;
            border-radius: 50%;
            font-size: 0.6rem;
            margin-top: 3px;
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

        /* ─── Stats Bar ─── */
        .lp-stats {
            background: var(--lp-gold);
            padding: 22px 0;
        }
        .stats-row {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            text-align: center;
        }
        .stat-item { text-align: center; }
        .stat-number {
            font-size: 1.9rem;
            font-weight: 800;
            color: #111;
            display: block;
            line-height: 1;
        }
        .stat-label {
            font-size: 0.82rem;
            font-weight: 700;
            color: #333;
            margin-top: 4px;
            display: block;
        }
        .stat-sep {
            width: 1px;
            height: 40px;
            background: rgba(0,0,0,0.2);
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
        .gold-divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--lp-gold), transparent);
        }

        /* ─── Services ─── */
        .lp-services { background: var(--lp-light-bg); }
        .lp-services .section-title { color: #111; }

        .service-card {
            background: #fff;
            border-radius: 14px;
            padding: 26px 18px 22px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(0,0,0,0.07);
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
            height: 100%;
            border-bottom: 3px solid transparent;
        }
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 32px rgba(0,0,0,0.12);
            border-bottom-color: var(--lp-gold);
        }
        .service-icon { font-size: 2.2rem; display: block; margin-bottom: 12px; }
        .service-title { font-size: 0.9rem; font-weight: 800; color: #111; margin-bottom: 6px; }
        .service-desc { font-size: 0.78rem; color: #666; line-height: 1.65; }

        /* ─── Identity ─── */
        .lp-identity { background: var(--lp-dark); }
        .lp-identity .section-title { color: #fff; }
        .lp-identity .section-sub { color: rgba(255,255,255,0.6); }

        .identity-card {
            background: var(--lp-card-bg);
            border: 1.5px solid rgba(0,148,62,0.3);
            border-radius: 14px;
            padding: 26px 16px;
            text-align: center;
            height: 100%;
            transition: border-color 0.3s, transform 0.3s;
        }
        .identity-card:hover {
            border-color: var(--lp-gold);
            transform: translateY(-5px);
        }
        .identity-num {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--lp-gold);
            display: block;
            margin-bottom: 8px;
        }
        .identity-value {
            font-size: 1rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }
        .identity-desc {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.6);
            line-height: 1.7;
        }

        /* ─── Clients ─── */
        .lp-clients { background: #fff; }
        .lp-clients .section-title { color: #111; }

        .client-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
        }
        .client-tag {
            background: var(--lp-light-bg);
            border: 1.5px solid #dde8df;
            border-radius: 50px;
            padding: 9px 22px;
            font-size: 0.88rem;
            font-weight: 700;
            color: #333;
            transition: all 0.25s;
            cursor: default;
        }
        .client-tag:hover {
            background: var(--lp-green);
            color: #fff;
            border-color: var(--lp-green);
        }

        /* ─── Why Window ─── */
        .lp-why { background: #101d12; }
        .lp-why .section-title { color: #fff; }
        .lp-why .section-sub { color: rgba(255,255,255,0.55); }

        .why-card { text-align: center; padding: 20px 12px; }
        .why-icon {
            width: 62px;
            height: 62px;
            background: rgba(249,161,27,0.12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            border: 1.5px solid rgba(249,161,27,0.25);
        }
        .why-icon i { font-size: 1.5rem; color: var(--lp-gold); }
        .why-title { font-size: 0.98rem; font-weight: 800; color: #fff; margin-bottom: 8px; }
        .why-desc { font-size: 0.82rem; color: rgba(255,255,255,0.6); line-height: 1.7; }

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
            .stat-sep { display: none; }
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
        &#9889; الطلب يتزايد — لضمان موعد تنفيذك قبل اليوم الوطني تواصل معنا الآن
    </div>

    <!-- Sticky Header -->
    <header class="lp-header">
        <div class="container inner">
            <a href="{{ url('/') }}" target="_blank" rel="noopener">
                <img src="{{ asset('front/images/window-final logo-1.png') }}" alt="وكالة ويندو للدعاية والإعلان" class="lp-logo">
            </a>
            <span class="nd-header-label">&#127466;&#127462; اليوم الوطني السعودي الـ96 — «عزّنا بطبعنا»</span>
            <div class="lp-header-actions">
                <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}" class="btn-call d-none d-sm-inline-block">
                    <i class="fas fa-phone-alt fa-sm"></i> اتصل بنا
                </a>
                <a href="https://wa.me/966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%D8%8C%20%D8%A3%D9%88%D8%AF%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%B9%D9%86%20%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%20%D8%A7%D9%84%D9%8A%D9%88%D9%85%20%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%20%D8%A7%D9%84%D9%80%2096"
                   target="_blank" rel="noopener" class="btn-wa">
                    <i class="fab fa-whatsapp"></i> واتساب
                </a>
            </div>
        </div>
    </header>

    <!-- ═══════════════════ HERO ═══════════════════ -->
    <section class="lp-hero">
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center gy-5">

                <!-- Form column (first on mobile for conversion) -->
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="lp-form-card">
                        <h3>&#127919; احجز استشارتك المجانية</h3>
                        <p class="form-sub">سيتواصل معك فريقنا خلال ساعات</p>
                        <form id="lead-form-hero" novalidate autocomplete="off">
                            @csrf
                            <input type="text"  name="full_name"    class="lp-input" placeholder="الاسم الكامل *" required>
                            <input type="tel"   name="phone_number" class="lp-input" placeholder="رقم الجوال *" required>
                            <input type="email" name="email"        class="lp-input" placeholder="البريد الإلكتروني (اختياري)">
                            <input type="text"  name="company_name" class="lp-input" placeholder="اسم الشركة أو الجهة *" required>
                            <button type="submit" class="btn-submit">
                                <span class="btn-text">احصل على عرض سعر مجاني الآن</span>
                                <i class="fas fa-arrow-left me-2"></i>
                            </button>
                        </form>
                        <p class="form-note">
                            &#128274; معلوماتك آمنة ولن تُشارك مع أي طرف ثالث
                        </p>
                    </div>
                </div>

                <!-- Text column -->
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="nd-badge">&#127466;&#127462; اليوم الوطني السعودي الـ96 — 23 سبتمبر 2026</div>
                    <div class="nd-slogan">«عزّنا بطبعنا»</div>
                    <h1 class="nd-headline">
                        نحوّل هوية اليوم الوطني إلى تجربة احتفالية متكاملة تعيشها منشأتك من الواجهة إلى آخر تفصيلة
                    </h1>
                    <p class="nd-sub">
                        من ديكور الواجهة وهدايا الموظفين إلى الفعاليات والمجسمات ومناطق التصوير — كل شيء تحت مظلة واحدة، من الفكرة إلى التسليم
                    </p>
                    <ul class="trust-list">
                        <li>خبرة تتجاوز 25 عاماً في الدعاية والإعلان والتصنيع</li>
                        <li>نخدم الشركات الكبرى والجهات الحكومية والمتوسطة والصغيرة</li>
                        <li>تنفيذ متكامل من التصميم والطباعة والتصنيع حتى التركيب في موقعك</li>
                        <li>التزام تام بالهوية الرسمية لليوم الوطني الـ96</li>
                        <li>الرياض — حلول مخصصة لكل ميزانية وكل حجم منشأة</li>
                    </ul>
                    <a href="#cta-form" class="btn-gold" style="font-size:1rem;padding:14px 28px;">
                        اطلب عرض السعر الآن <i class="fas fa-arrow-left me-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════ STATS ═══════════════════ -->
    <section class="lp-stats">
        <div class="container">
            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-number">+25</span>
                    <span class="stat-label">سنة خبرة في السوق</span>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <span class="stat-number">متكامل</span>
                    <span class="stat-label">من الفكرة إلى التسليم</span>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <span class="stat-number">حكومي&nbsp;+&nbsp;خاص</span>
                    <span class="stat-label">بكل الأحجام</span>
                </div>
                <div class="stat-sep d-none d-md-block"></div>
                <div class="stat-item">
                    <span class="stat-number">ND96</span>
                    <span class="stat-label">«عزّنا بطبعنا»</span>
                </div>
            </div>
        </div>
    </section>

    <div class="gold-divider"></div>

    <!-- ═══════════════════ SERVICES ═══════════════════ -->
    <section class="lp-services section-wrap">
        <div class="container">
            <h2 class="section-title" style="color:#111;">ماذا ننفذ لمنشأتك في اليوم الوطني؟</h2>
            <p class="section-sub">حلول متكاملة تشمل كل ما تحتاجه لاحتفال لا يُنسى</p>

            <div class="row g-3 g-md-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#127968;</span>
                        <p class="service-title">الديكورات والواجهات</p>
                        <p class="service-desc">أعلام، بنرات، استيكرات زجاجية، تغليف الأعمدة والمصاعد والمداخل</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#127873;</span>
                        <p class="service-title">الهدايا الدعائية</p>
                        <p class="service-desc">أكواب، دفاتر، حقائب، بوكسات هدايا فاخرة للموظفين والعملاء والشركاء</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#129513;</span>
                        <p class="service-title">الوشاحات الوطنية</p>
                        <p class="service-desc">وشاحات مخصصة بهوية المنشأة — تصنع مشهداً جماعياً لا يُنسى</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#127881;</span>
                        <p class="service-title">الفعاليات والحفلات</p>
                        <p class="service-desc">تنظيم فعاليات داخلية وخارجية مع أركان تراثية وعروض شعبية وترفيهية</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#128247;</span>
                        <p class="service-title">مناطق التصوير</p>
                        <p class="service-desc">Photo Booth، خلفيات، مجسمات وطنية، إطارات وجدران تصوير مخصصة</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#128663;</span>
                        <p class="service-title">تغليف السيارات</p>
                        <p class="service-desc">استيكرات وتغليف جزئي أو كامل — يحوّل أسطول السيارات إلى إعلان متنقل</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#127959;</span>
                        <p class="service-title">المجسمات ثلاثية الأبعاد</p>
                        <p class="service-desc">حروف بارزة، مجسمات الهوية، لوحات مضيئة، مكعبات دعائية احترافية</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="service-card">
                        <span class="service-icon">&#128241;</span>
                        <p class="service-title">السوشيال ميديا</p>
                        <p class="service-desc">محتوى اليوم الوطني، إدارة الحسابات، الإعلانات الممولة، والـ SEO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="gold-divider"></div>

    <!-- ═══════════════════ IDENTITY ═══════════════════ -->
    <section class="lp-identity section-wrap">
        <div class="container">
            <h2 class="section-title">«عزّنا بطبعنا» — نحوّل كل قيمة إلى تجربة</h2>
            <p class="section-sub">الهوية الرسمية لليوم الوطني الـ96 تمنحنا ستة أبواب للإبداع والتنفيذ</p>

            <div class="row g-3 mt-2">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">١</span>
                        <p class="identity-value">عزّنا بشجاعتنا</p>
                        <p class="identity-desc">تصاميم قوية ومجسمات تعكس الطموح والشجاعة</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">٢</span>
                        <p class="identity-value">عزّنا برؤيتنا</p>
                        <p class="identity-desc">ربط المناسبة برؤية المنشأة وإنجازاتها ومستقبلها</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">٣</span>
                        <p class="identity-value">عزّنا بأصالتنا</p>
                        <p class="identity-desc">عناصر تراثية سعودية في الديكورات والهدايا والتصاميم</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">٤</span>
                        <p class="identity-value">عزّنا بهمّتنا</p>
                        <p class="identity-desc">بيئة عمل تحفيزية تحتفي بإنجازات الموظفين وتُلهمهم</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">٥</span>
                        <p class="identity-value">عزّنا بجودنا</p>
                        <p class="identity-desc">هدايا وتجارب راقية تعبّر عن قيمة العطاء والاهتمام</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="identity-card">
                        <span class="identity-num">٦</span>
                        <p class="identity-value">عزّنا بكرمنا</p>
                        <p class="identity-desc">ضيافة وهدايا وتوزيعات تليق بالمناسبة وبضيوف المنشأة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════ WHO WE SERVE ═══════════════════ -->
    <section class="lp-clients section-wrap">
        <div class="container">
            <h2 class="section-title" style="color:#111;">نخدم كل المنشآت — مهما كان حجمها</h2>
            <p class="section-sub">حلول مخصصة لكل ميزانية وطبيعة جهة — من 20 موظف إلى آلاف</p>

            <div class="client-tags mt-4">
                <span class="client-tag">&#127963; الجهات الحكومية</span>
                <span class="client-tag">&#127970; الشركات الكبرى</span>
                <span class="client-tag">&#127974; البنوك والمصارف</span>
                <span class="client-tag">&#127973; المستشفيات والمراكز الطبية</span>
                <span class="client-tag">&#127979; الجامعات والمدارس</span>
                <span class="client-tag">&#127960; الفنادق والمنتجعات</span>
                <span class="client-tag">&#127978; المجمعات التجارية</span>
                <span class="client-tag">&#127981; المصانع والشركات الصناعية</span>
                <span class="client-tag">&#127968; شركات العقارات</span>
                <span class="client-tag">&#128188; الشركات المتوسطة</span>
                <span class="client-tag">&#128640; الشركات الناشئة</span>
                <span class="client-tag">&#128722; المنشآت الصغيرة</span>
            </div>
        </div>
    </section>

    <div class="gold-divider"></div>

    <!-- ═══════════════════ WHY WINDOW ═══════════════════ -->
    <section class="lp-why section-wrap">
        <div class="container">
            <h2 class="section-title">لماذا وكالة ويندو؟</h2>
            <p class="section-sub">أكثر من مجرد طباعة — نأخذ مشروعك من الفكرة إلى آخر تفصيلة</p>

            <div class="row g-4 mt-2 justify-content-center">
                <div class="col-6 col-lg-3">
                    <div class="why-card">
                        <div class="why-icon"><i class="fas fa-lightbulb"></i></div>
                        <p class="why-title">من الفكرة إلى التنفيذ</p>
                        <p class="why-desc">نبدأ من سؤال «ماذا نفعل؟» ونصل إلى تجربة متكاملة جاهزة للتسليم في موقعك</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="why-card">
                        <div class="why-icon"><i class="fas fa-award"></i></div>
                        <p class="why-title">خبرة 25+ عاماً</p>
                        <p class="why-desc">ننفذ احتفالات اليوم الوطني منذ سنوات لأكبر الشركات والجهات في الرياض</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="why-card">
                        <div class="why-icon"><i class="fas fa-layer-group"></i></div>
                        <p class="why-title">مظلة خدمة واحدة</p>
                        <p class="why-desc">تصميم، طباعة، تصنيع، تركيب، فعاليات، هدايا — كل شيء من جهة واحدة</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="why-card">
                        <div class="why-icon"><i class="fas fa-tag"></i></div>
                        <p class="why-title">لكل ميزانية حل</p>
                        <p class="why-desc">حلول مخصصة للشركات الصغيرة والكبيرة والجهات الحكومية على حد سواء</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════ BOTTOM CTA FORM ═══════════════════ -->
    <section class="lp-cta" id="cta-form">
        <div class="container position-relative" style="z-index:2;">
            <h2 class="cta-title">ابدأ التخطيط الآن — قبل أن تمتلئ المواعيد</h2>
            <p class="cta-sub">
                سواء كنت جهة حكومية أو شركة كبرى أو منشأة متوسطة — لدينا الحل المناسب لك
            </p>

            <div class="lp-form-card">
                <h3>&#127466;&#127462; احجز موعدك الآن مجاناً</h3>
                <p class="form-sub">فريقنا سيتواصل معك لتقديم عرض سعر مخصص</p>

                <form id="lead-form-bottom" novalidate autocomplete="off">
                    @csrf
                    <input type="text"  name="full_name"    class="lp-input" placeholder="الاسم الكامل *" required>
                    <input type="tel"   name="phone_number" class="lp-input" placeholder="رقم الجوال *" required>
                    <input type="email" name="email"        class="lp-input" placeholder="البريد الإلكتروني (اختياري)">
                    <input type="text"  name="company_name" class="lp-input" placeholder="اسم الشركة أو الجهة *" required>
                    <button type="submit" class="btn-submit">
                        <span class="btn-text">أرسل طلبك الآن — الاستشارة مجانية</span>
                        <i class="fas fa-arrow-left me-2"></i>
                    </button>
                </form>

                <p class="form-note">
                    &#128222; أو اتصل مباشرة:
                    <a href="tel:+966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}">
                        {{ $website_settings->phone_number ?? '+966592945557' }}
                    </a>
                </p>
            </div>
        </div>
    </section>

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
                        <i class="fas fa-location-dot fa-sm"></i> الرياض، المملكة العربية السعودية
                    </a>
                </div>
                <p class="footer-copy">
                    &copy; {{ date('Y') }} وكالة ويندو للدعاية والإعلان
                </p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/966{{ ltrim($website_settings->phone_number ?? '592945557', '0') }}?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%D8%8C%20%D8%A3%D9%88%D8%AF%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%B9%D9%86%20%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%20%D8%A7%D9%84%D9%8A%D9%88%D9%85%20%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%20%D8%A7%D9%84%D9%80%2096"
       target="_blank" rel="noopener" class="float-wa" title="تواصل عبر واتساب">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('front/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('front/libs/sweetalert2/sweet.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

    <script>
    (function ($) {
        var STORE_URL = '{{ route("landing.national-day.store") }}';
        var CSRF     = $('meta[name="csrf-token"]').attr('content');

        function submitLead(form) {
            var $form      = $(form);
            var $btn       = $form.find('.btn-submit');
            var $btnText   = $btn.find('.btn-text');
            var origText   = $btnText.text();

            var fullName    = $.trim($form.find('[name="full_name"]').val());
            var phone       = $.trim($form.find('[name="phone_number"]').val());
            var email       = $.trim($form.find('[name="email"]').val());
            var companyName = $.trim($form.find('[name="company_name"]').val());

            if (!fullName) {
                return Swal.fire({ icon: 'warning', title: 'تنبيه', text: 'يرجى إدخال الاسم الكامل', confirmButtonText: 'حسناً', confirmButtonColor: '#006837' });
            }
            if (!phone || phone.replace(/\D/g,'').length < 7) {
                return Swal.fire({ icon: 'warning', title: 'تنبيه', text: 'يرجى إدخال رقم جوال صحيح', confirmButtonText: 'حسناً', confirmButtonColor: '#006837' });
            }
            if (!companyName) {
                return Swal.fire({ icon: 'warning', title: 'تنبيه', text: 'يرجى إدخال اسم الشركة أو الجهة', confirmButtonText: 'حسناً', confirmButtonColor: '#006837' });
            }

            $btn.prop('disabled', true);
            $btnText.html('<i class="fas fa-spinner fa-spin me-2"></i> جاري الإرسال...');

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
                        icon:             'success',
                        title:            'تم الإرسال بنجاح!',
                        text:             'شكراً! سيتواصل معك فريق ويندو في أقرب وقت.',
                        confirmButtonText:'شكراً',
                        confirmButtonColor: '#006837'
                    });
                    $form[0].reset();
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON && xhr.responseJSON.errors;
                    var msg = 'حدث خطأ، يرجى المحاولة مرة أخرى أو التواصل عبر واتساب.';
                    if (errors) {
                        msg = Object.values(errors).map(function(e){ return e[0]; }).join('\n');
                    }
                    Swal.fire({ icon: 'error', title: 'خطأ', text: msg, confirmButtonText: 'حسناً', confirmButtonColor: '#006837' });
                },
                complete: function () {
                    $btn.prop('disabled', false);
                    $btnText.text(origText);
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
