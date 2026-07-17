@extends('front.layout.main')

@section('title', __('custom.home'))
@section('meta_title', __('custom.home-meta-title'))
@section('description', __('custom.home-meta-description'))
@section('keywords', __('custom.home-meta-keywords'))

@section('hreflang')
<link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}" />
<link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" />
<link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL('en') }}" />
@endsection

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
    }]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "VideoObject",
    "name": "{{ app()->getLocale() === 'ar' ? 'ويندو للدعاية والاعلان - شركة دعاية واعلان الرياض' : 'Window Advertising Agency - Riyadh Saudi Arabia' }}",
    "description": "{{ app()->getLocale() === 'ar' ? 'فيديو تعريفي عن شركة ويندو للدعاية والاعلان في الرياض - خدمات دعاية واعلان، تنظيم حفلات ومؤتمرات، بوثات معارض، تصميم هويه بصرية' : 'Introduction video of Window Advertising Agency in Riyadh - advertising services, event planning, exhibitions, branding' }}",
    "thumbnailUrl": "{{ $website_settings->display_cover }}",
    "uploadDate": "2024-01-01T00:00:00+03:00",
    "contentUrl": "{{ asset('front/videos/window_header.mp4') }}",
    "publisher": {
        "@type": "Organization",
        "name": "{{ $website_settings->title }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('android-chrome-512x512.png') }}"
        }
    }
}
</script>
@endsection

@section('content')

    <header class="text-center" id="hero">
        <img src="{{ asset('front/images/og-image.png') }}" alt="{{ app()->getLocale() === 'ar' ? 'ويندو للدعاية والاعلان - شركة دعاية واعلان الرياض' : 'Window Advertising Agency Riyadh' }}" class="d-none" width="1200" height="630">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="{{ asset('front/videos/window_header.mp4') }}" type="video/mp4">
        </video>
        <h1 class="visually-hidden">
            {{ app()->getLocale() === 'ar' ? 'شركة دعاية واعلان في الرياض - تنظيم حفلات ومؤتمرات ومعارض' : 'Advertising Agency in Riyadh - Events, Conferences & Exhibitions' }}
        </h1>
    </header>

    <section id="about" class="py-5 text-white" data-aos="fade-up">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="header_about_warning fw-bold">
                        @lang('custom.best-sa-company')
                    </p>
                    <p class="text-gr">@lang('custom.home-header-description')</p>
                </div>
                <div class="col-lg-6">
                    <div class="whatsapp-cta-form p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border: 1px solid rgba(249,161,27,0.3);">
                        <h3 class="text-center mb-3" style="color: #f9a11b; font-size: 1.4rem;">
                            {{ app()->getLocale() === 'ar' ? 'احصل على استشارة مجانية' : 'Get a Free Consultation' }}
                        </h3>
                        <form id="whatsapp-form" onsubmit="return sendToWhatsApp(event)">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="wa-name" required
                                    placeholder="{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Your Name' }}"
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;">
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="wa-phone" required
                                    placeholder="{{ app()->getLocale() === 'ar' ? 'رقم الجوال' : 'Phone Number' }}"
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="wa-service" required
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;">
                                    <option value="" disabled selected>{{ app()->getLocale() === 'ar' ? 'اختر الخدمة' : 'Select Service' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'تنظيم فعاليات ومعارض' : 'Events & Exhibitions' }}">{{ app()->getLocale() === 'ar' ? 'تنظيم فعاليات ومعارض' : 'Events & Exhibitions' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'لافتات وأحرف بارزة' : 'Signage & Embossed Letters' }}">{{ app()->getLocale() === 'ar' ? 'لافتات وأحرف بارزة' : 'Signage & Embossed Letters' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'طباعة ومطبوعات' : 'Printing & Publications' }}">{{ app()->getLocale() === 'ar' ? 'طباعة ومطبوعات' : 'Printing & Publications' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'هدايا دعائية' : 'Promotional Gifts' }}">{{ app()->getLocale() === 'ar' ? 'هدايا دعائية' : 'Promotional Gifts' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'تصميم هوية بصرية' : 'Corporate Identity Design' }}">{{ app()->getLocale() === 'ar' ? 'تصميم هوية بصرية' : 'Corporate Identity Design' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'تسويق رقمي' : 'Digital Marketing' }}">{{ app()->getLocale() === 'ar' ? 'تسويق رقمي' : 'Digital Marketing' }}</option>
                                    <option value="{{ app()->getLocale() === 'ar' ? 'أخرى' : 'Other' }}">{{ app()->getLocale() === 'ar' ? 'أخرى' : 'Other' }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="wa-message" rows="2"
                                    placeholder="{{ app()->getLocale() === 'ar' ? 'تفاصيل إضافية (اختياري)' : 'Additional details (optional)' }}"
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff; resize: none;"></textarea>
                            </div>
                            <button type="submit" class="cta-btn w-100 text-dark fw-bold border-0 d-flex align-items-center justify-content-center gap-2" style="font-size: 1.1rem;">
                                <i class="fa-brands fa-whatsapp fs-4"></i>
                                {{ app()->getLocale() === 'ar' ? 'أرسل عبر واتساب' : 'Send via WhatsApp' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function sendToWhatsApp(e) {
        e.preventDefault();
        var name = document.getElementById('wa-name').value;
        var phone = document.getElementById('wa-phone').value;
        var service = document.getElementById('wa-service').value;
        var message = document.getElementById('wa-message').value;
        var text = '{{ app()->getLocale() === "ar" ? "مرحباً، أرغب في الاستفسار عن خدماتكم" : "Hello, I would like to inquire about your services" }}' + '%0A%0A' +
            '{{ app()->getLocale() === "ar" ? "الاسم" : "Name" }}: ' + encodeURIComponent(name) + '%0A' +
            '{{ app()->getLocale() === "ar" ? "الجوال" : "Phone" }}: ' + encodeURIComponent(phone) + '%0A' +
            '{{ app()->getLocale() === "ar" ? "الخدمة" : "Service" }}: ' + encodeURIComponent(service) +
            (message ? '%0A' + '{{ app()->getLocale() === "ar" ? "التفاصيل" : "Details" }}: ' + encodeURIComponent(message) : '');
        window.open('https://wa.me/966592945557?text=' + text, '_blank');
        return false;
    }
    </script>

    <section id="counter" class="py-5" data-aos="fade-up">
        <div class="container d-flex flex-md-row flex-column justify-content-evenly align-items-center gap-4 text-gr">
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/clients_icon.png') }}" height="70" alt="@lang('custom.clients')" loading="lazy">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">1000</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.clients')</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/projects_icon.png') }}" height="70" alt="@lang('custom.our-projects')" loading="lazy">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">3000</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.our-projects')</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div>
                    <img src="{{ asset('front/images/vip_icon.png') }}" height="70" alt="@lang('custom.vip-clients')" loading="lazy">
                </div>
                <div>
                    <p class="mb-0 fs-1"><span class="count-number">200</span>+</p>
                    <p class="mb-0 fs-5">@lang('custom.vip-clients')</p>
                </div>
            </div>  
        </div>
  </section>

  <!-- Services -->
    <section id="services" class="py-5" data-aos="fade-up">
        <div class="container">
            <div class="title mb-2 mx-auto">
                <h2 class="text-center mb-0 text-white">@lang('custom.our-services')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="text-center mt-3 mb-4">
                <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-white">@lang('custom.see-all')</a>
            </div>
            <div class="row row-gap-3">
                @if ($services->count() == 0)
                    <div class="text-center w-100 fw-bold text-decoration-underline text-gr">@lang('custom.no-results')</div>
                @else
                    @foreach ($services as $service)
                        <div class="col-lg-3 col-md-4 col-6 px-md-5">
                            <div class="item">
                                <div>
                                    <img src="{{ $service->display_image }}" alt="{{ $service->title ?? '' }}" style="width:100%;" loading="lazy">
                                </div>
                                <div class="text-center text-white">
                                    <p class="fs-4 mt-2 text-gr">{{ $service->title ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- Portfolio --}}
    <section id="portfolio" class="py-5" data-aos="fade-up">
        <div class="container overflow-hidden">
            <div class="title mb-4 mx-auto">
                <h2 class="text-center mb-1 text-white">@lang('custom.our-portofolio')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row px-2">
                @if ($portofolios->count() == 0)
                    <div class="text-center w-100 fw-bold text-decoration-underline text-gr">@lang('custom.no-results')</div>
                @else
                    <div class="protofolio-carousel owl-carousel owl-theme px-0" dir="ltr">
                        @foreach ($portofolios as $portofolio)
                           <div class="item position-relative" style="width: 100%;aspect-ratio: 4 / 3;overflow:hidden;border-radius:10px">
                                <img src="{{ $portofolio->display_image }}" alt="{{ $portofolio->title }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
                                <p class="mt-2 position-absolute" style="bottom: 0;right: 15px;color: white;font-weight: bold;font-size: 25px;text-shadow: -2px 1px 2px #636363;">{{ $portofolio->title }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Top Customers -->
    <section id="top-customers" class="py-5 px-2 bg-white" data-aos="fade-up">
        <div class="container py-5">
            <div class="title mb-4 mx-auto">
                <h2 class="mb-1 text-decoration-none">@lang('custom.top-customers')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row px-3 mt-5">
                @if ($top_customers->count() == 0)
                    <div class="fw-bold text-center w-100 text-decoration-underline text-dark">@lang('custom.no-results')</div>
                @else
                    <div class="customer-carousel owl-carousel owl-theme" dir="ltr">
                        @php($i = 0)
                        @foreach ($top_customers as $customer)
                            <div class="slide" data-slide-index="{{ $i++ }}">
                                <img class="rounded" src="{{ $customer->display_image }}" alt="{{ $customer->customer_name }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact" class="py-5" data-aos="fade-up">
        <img src="{{ asset('front/images/w-logo-white.png') }}" alt="Window" class="contact-logo">
        <div class="container my-0">
            <div class="header mb-4">
                <div class="title mx-auto">
                    <h3 class="text-center text-white">@lang('custom.contact-us')</h3>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-7 px-5 mt-2 order-lg-2">
                    <div class="row">
                        <div class="d-flex col-gap-5 flex-wrap my-2 justify-content-start">
                            <div class="d-flex mb-0 flex-wrap">
                                <p class="mb-0 fw-bold"><i class="fa-solid fa-phone ms-1"></i> @lang('custom.phone')</p>
                                <ul class="pe-1 d-flex gap-4" style="list-style:none;">
                                    <li><a href="tel:+966592945557" target="_blank" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number }}</bdi></a></li>
                                    @if($website_settings->phone_number2)
                                        <li><a href="tel:+966592948084" target="_blank" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number2 }}</bdi></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap mb-3">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-envelope ms-1"></i> @lang('custom.email')&nbsp;</p>
                            <a href="mailto:{{ $website_settings->email }}" class="text-gr text-decoration-none">{{ $website_settings->email }}</a>
                        </div>
                        <div class="d-flex flex-wrap mb-3">
                            <p class="ms-1 mb-0 fw-bold"><i class="fa-solid fa-location-dot ms-1"></i> @lang('custom.address')&nbsp;</p>
                            <a href="https://maps.app.goo.gl/hJBnz8GRZqQd86rq7" target="_blank" rel="noopener" class="text-gr text-decoration-none">@lang('custom.contact-address')</a>
                        </div>
                    </div>
                    <div class="row d-inline-block">
                        <p class="ms-1 fw-bold"><i class="fa-solid fa-share-nodes ms-1"></i> @lang('custom.social') </p>
                        <ul class="d-flex gap-3 flex-nowrap justify-content-start ps-0" style="list-style: none;">
                            <li>
                                <a href="{{ $website_settings->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook">
                                    <i class="fa-brands fa-square-facebook text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram">
                                    <i class="fa-brands fa-square-instagram text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->linkedin_url }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->snapchat_url }}" target="_blank" rel="noopener" aria-label="Snapchat">
                                    <i class="fab fa-snapchat-square text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->tiktok_url }}" target="_blank" rel="noopener" aria-label="TikTok">
                                    <i class="fab fa-tiktok bg-white rounded-2" style="font-size:1.8rem;color:#1f1f1f;"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->twitter_url }}" target="_blank" rel="noopener" aria-label="X">
                                    <i class="fa-brands fa-square-x-twitter text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $website_settings->youtube_url }}" target="_blank" rel="noopener" aria-label="YouTube">
                                    <i class="fa-brands fa-youtube text-white" style="font-size:1.8rem"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 px-4 mt-2 order-lg-1">
                    <form id="send-contacts" method="POST">
                        <input class="form-control mb-3" type="text" name="full_name" id="full_name" placeholder="@lang('custom.full-name')" data-msg-required="@lang('custom.validation-required')">
                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="@lang('custom.email')" data-msg-required="@lang('custom.validation-required')" data-msg-email="@lang('custom.validation-email')">
                        <input class="form-control mb-3" type="tel" name="phone_number" id="phone_number" placeholder="@lang('custom.phone')" data-msg-required="@lang('custom.validation-required')" data-msg-phone="@lang('custom.validation-phone')">
                        <input class="form-control mb-3" type="text" name="site_url" id="site_url" placeholder="@lang('custom.site')" data-msg-required="@lang('custom.validation-required')" data-msg-url="@lang('custom.validation-url')">
                        <button type="submit" class="cta-btn text-dark loader-btn">
                            <p class="mb-0">
                                <i class="fa-solid fa-paper-plane"></i> @lang('custom.send')
                            </p>
                            <div class="loader"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection