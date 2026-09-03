@extends('front.layout.main')

@section('title', __('custom.contact'))
@section('meta_title', __('custom.contacts-meta-title'))
@section('description', __('custom.contacts-meta-description'))
@section('keywords', __('custom.contacts-meta-keywords'))

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
    }, {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ __('custom.contact') }}",
        "item": "{{ route('front.contact.index') }}"
    }]
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="[
        ['label' => __('custom.home'), 'url' => route('front.home')],
        ['label' => __('custom.contact')],
    ]" />

    <section id="contact-form" class="py-4 mb-3" data-aos="fade-up">
        <div class="container">
            <div class="header mb-4">
                <!-- <h2 class="text-center ">نـصـمـم ونـبـتـكـر كـل مـاهـو جـذاب</h2> -->
                <div class="title mb-4 mx-auto">
                    <h1 class="text-center mb-2" style="font-size: 1.75rem;">@lang('custom.contact-us')</h1>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="min-height:35vh;">
                <div class="col-lg-4 px-4 mt-2" style="position: relative;">
                    <img class="d-none d-sm-block" src="{{ asset('front/images/muslim-man-browsing-smartphone-app-removebg-preview.png') }}" alt="@lang('custom.contact-us') - {{ $website_settings->title }}" style="position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);height: 140%;max-width: 100%;">
                </div>
                <div class="col-lg-5 px-4 mt-2">
                    <div class="whatsapp-cta-form p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border: 1px solid rgba(249,161,27,0.3);">
                        <h3 class="text-center mb-3" style="color: #f9a11b; font-size: 1.4rem;">
                            {{ app()->getLocale() === 'ar' ? 'احصل على استشارة مجانية' : 'Get a Free Consultation' }}
                        </h3>
                        <form id="whatsapp-form-contact" onsubmit="return sendToWhatsAppContact(event)">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="wa-name-contact" required
                                    placeholder="{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Your Name' }}"
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;">
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="wa-phone-contact" required
                                    placeholder="{{ app()->getLocale() === 'ar' ? 'رقم الجوال' : 'Phone Number' }}"
                                    style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="wa-service-contact" required
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
                                <textarea class="form-control" id="wa-message-contact" rows="2"
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

    <!-- Contact Us -->
    <section id="contact-form-footer" class="py-5 pt-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 px-5">
                    <div class="row">
                        <div class="d-flex justify-content-start flex-wrap">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-phone"></i> @lang('custom.phone')</p>
                            <ul class="pe-3 d-flex gap-5" style="list-style:none;">
                                <li><a href="tel:+966592945557" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number }}</bdi></a></li>
                                @if ($website_settings->phone_number_2)
                                    <li><a href="tel:+966592948084" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number_2 }}</bdi></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="d-flex justify-content-start flex-wrap mb-3">
                            <p class="mb-0 fw-bold"><i class="fa-solid fa-envelope"></i> @lang('custom.email')&nbsp;</p>
                            <a href="mailto:{{ $website_settings->email }}" class="text-gr text-decoration-none">{{ $website_settings->email }}</a>
                        </div>
                        <div class="d-flex justify-content-start flex-wrap mb-2">
                            <p class="ms-1 mb-0 fw-bold"><i class="fa-solid fa-location-dot"></i> @lang('custom.address')&nbsp;</p>
                            <a href="https://maps.app.goo.gl/hJBnz8GRZqQd86rq7" target="_blank" rel="noopener" class="text-gr text-decoration-none">@lang('custom.contact-address')</a>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-start flex-wrap">
                        <p class="ms-1 mb-1 fw-bold">@lang('custom.social')</p>
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
                                <i class="fab fa-snapchat-square fs-4 text-white"></i>
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
            </div>
        </div>
    </section>

<script>
    function sendToWhatsAppContact(e) {
        e.preventDefault();
        var name = document.getElementById('wa-name-contact').value;
        var phone = document.getElementById('wa-phone-contact').value;
        var service = document.getElementById('wa-service-contact').value;
        var message = document.getElementById('wa-message-contact').value;
        var text = '{{ app()->getLocale() === "ar" ? "مرحباً، أرغب في الاستفسار عن خدماتكم" : "Hello, I would like to inquire about your services" }}' + '%0A%0A' +
            '{{ app()->getLocale() === "ar" ? "الاسم" : "Name" }}: ' + encodeURIComponent(name) + '%0A' +
            '{{ app()->getLocale() === "ar" ? "الجوال" : "Phone" }}: ' + encodeURIComponent(phone) + '%0A' +
            '{{ app()->getLocale() === "ar" ? "الخدمة" : "Service" }}: ' + encodeURIComponent(service) +
            (message ? '%0A' + '{{ app()->getLocale() === "ar" ? "التفاصيل" : "Details" }}: ' + encodeURIComponent(message) : '');
        window.open('https://wa.me/966592945557?text=' + text, '_blank');
        return false;
    }
</script>

@endsection