@extends('front.layout.main')

@section('title', __('custom.about'))
@section('meta_title', __('custom.about-meta-title'))
@section('description', __('custom.about-meta-description'))
@section('keywords', __('custom.about-meta-keywords'))

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
        ['label' => __('custom.home'), 'url' => url('/')],
        ['label' => __('custom.about'), 'url' => route('front.about')],
    ]" />

    <section id="about" class="py-4 about2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
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
                <div class="col-lg-5 px-5">
                    <video autoplay muted loop playsinline preload="auto">
                        <source src="{{ asset('front/videos/window_about.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light pb-4">
        <div class="container">
            <div class="row">
                <p class="mb-0 text-center text-dark">
                    @lang('custom.our-story-2')
                </p>
            </div>
        </div>
    </section>

    <section id="vission" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-services')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">
                    @lang('custom.our-services-body')
                </p>
                <div class="text-center mt-2">
                    <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.our-services')</a>
                </div>
            </div>
        </div>
    </section>

    <section id="message" class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-message')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">@lang('custom.our-message-body')</p>
            </div>
        </div>
    </section>

    <section id="vission" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-vision')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                <p class="text-center">@lang('custom.our-vision-body')</p>
            </div>
        </div>
    </section>

    <section id="principals" class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-principals')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                @lang('custom.our-principals-body')
            </div>
        </div>
    </section>

    <section id="strategie" class="py-4">
        <div class="container">
            <div class="row">
                <div class="title mb-4 mx-auto">
                    <h2 class="text-center">@lang('custom.our-strategie')</h2>
                    <div class="title-underline-container title-second">
                        <div class="title-underline w-100"></div>
                    </div>
                </div>
                @lang('custom.our-strategie-body')
                <div class="text-center mt-3">
                    <a href="{{ route('front.contacts.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-4 bg-light">
        <div class="container">
            <div class="title mb-4 mx-auto">
                <h2 class="text-center">@lang('custom.faq')</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="accordion" id="faqAccordion">
                @for($i = 1; $i <= 5; $i++)
                <div class="accordion-item border-0 mb-2">
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
    </section>

@endsection

@section('page_schema')
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