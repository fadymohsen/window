@extends('front.layout.main')

@section('title', __('custom.about'))
@section('meta_title', __('custom.about-meta-title'))
@section('description', __('custom.about-meta-description'))
@section('keywords', __('custom.about-meta-keywords'))

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
        "name": "{{ __('custom.about') }}",
        "item": "{{ route('front.about') }}"
    }]
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="[
        ['label' => __('custom.home'), 'url' => route('front.home')],
        ['label' => __('custom.about')],
    ]" />

    <h1 class="visually-hidden">@lang('custom.about-meta-title')</h1>
    <section id="about" class="py-4 about2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 about-animate">
                    <div class="title mb-3 mx-0">
                        <h2 class="text-white">@lang('custom.our-story-title')</h2>
                        <div class="title-underline-container">
                            <div class="title-underline title-underline w-100"></div>
                        </div>
                    </div>
                    <p class="text-gr">
                        @lang('custom.our-story')
                    </p>
                </div>
                <div class="col-lg-5 px-5 about-animate">
                    <video autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('front/videos/window_about.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light pb-4">
        <div class="container">
            <div class="row">
                <p class="mb-0 text-center text-dark about-animate">
                    @lang('custom.our-story-2')
                </p>
            </div>
        </div>
    </section>

    <section id="vission-services" class="py-5">
        <div class="container">
            <div class="title mb-4 mx-auto about-animate">
                <h2 class="text-center">@lang('custom.our-services')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row justify-content-center about-animate">
                <div class="col-lg-10">
                    <div class="about-card p-4 rounded-4">
                        <p class="text-center mb-3">
                            @lang('custom.our-services-body')
                        </p>
                        <div class="text-center">
                            <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.our-services')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mission-vision" class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 about-animate">
                    <div class="about-card about-card-highlight p-4 rounded-4 h-100">
                        <div class="about-card-icon mb-3">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h2 class="fs-4 fw-bold mb-3" style="color: #f9a11b;">@lang('custom.our-message')</h2>
                        <p class="mb-0">@lang('custom.our-message-body')</p>
                    </div>
                </div>
                <div class="col-lg-6 about-animate">
                    <div class="about-card about-card-highlight p-4 rounded-4 h-100">
                        <div class="about-card-icon mb-3">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h2 class="fs-4 fw-bold mb-3" style="color: #f9a11b;">@lang('custom.our-vision')</h2>
                        <p class="mb-0">@lang('custom.our-vision-body')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="principals" class="py-5">
        <div class="container">
            <div class="title mb-4 mx-auto about-animate">
                <h2 class="text-center">@lang('custom.our-principals')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="about-animate">
                @lang('custom.our-principals-body')
            </div>
        </div>
    </section>

    <section id="strategie" class="py-5 bg-light">
        <div class="container">
            <div class="title mb-4 mx-auto about-animate">
                <h2 class="text-center">@lang('custom.our-strategie')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="about-animate">
                @lang('custom.our-strategie-body')
            </div>
            <div class="text-center mt-4 about-animate">
                <a href="{{ route('front.contact.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5">
        <div class="container">
            <div class="title mb-4 mx-auto about-animate">
                <h2 class="text-center">@lang('custom.faq')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion about-animate" id="faqAccordion">
                        @for($i = 1; $i <= 5; $i++)
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                            <h3 class="accordion-header">
                                <button class="accordion-button {{ $i > 1 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                                    @lang("custom.faq-q{$i}")
                                </button>
                            </h3>
                            <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    @lang("custom.faq-a{$i}")
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "VideoObject",
    "name": "{{ app()->getLocale() === 'ar' ? 'قصة ويندو للدعاية والاعلان' : 'Window Advertising Story' }}",
    "description": "{{ app()->getLocale() === 'ar' ? 'تعرف على قصة ويندو للدعاية والاعلان - شركة دعاية واعلان رائدة في الرياض بخبرة 25+ عاماً' : 'Learn about Window Advertising Agency - leading advertising company in Riyadh with 25+ years of experience' }}",
    "thumbnailUrl": "{{ $website_settings->display_cover }}",
    "uploadDate": "2024-01-01T00:00:00+03:00",
    "contentUrl": "{{ asset('front/videos/window_about.mp4') }}",
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
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        @for($i = 1; $i <= 5; $i++)
        {
            "@type": "Question",
            "name": "{{ __("custom.faq-q{$i}") }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ __("custom.faq-a{$i}") }}"
            }
        }@if($i < 5),@endif
        @endfor
    ]
}
</script>
@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var els = document.querySelectorAll('.about-animate');
    els.forEach(function (el) { el.classList.add('about-init'); });

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('about-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    els.forEach(function (el) { observer.observe(el); });
});
</script>
@endsection
