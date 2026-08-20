@extends('front.layout.main')

@section('title', $service->title ?? '')
@section('meta_title', $service->meta_title ?: ($service->title ?? ''))
@section('description', $service->meta_description ?? '')
@section('keywords', $service->meta_keywords ?? '')
@section('display_image', $service->display_image)

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
        "name": "{{ __('custom.services') }}",
        "item": "{{ route('front.services.index') }}"
    },
    @if(isset($parentBreadcrumb))
    {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $parentBreadcrumb['name'] }}",
        "item": "{{ $parentBreadcrumb['url'] }}"
    }, {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ $service->title ?? '' }}",
        "item": "{{ route('front.services.show', $service) }}"
    }
    @else
    {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $service->title ?? '' }}",
        "item": "{{ route('front.services.show', $service) }}"
    }
    @endif
    ]
}
</script>
@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "{{ $service->title ?? '' }}",
    "name": "{{ $service->meta_title ?: ($service->title ?? '') }}",
    "description": "{{ $service->meta_description ?: ($service->title ?? '') }}",
    "image": "{{ $service->display_image }}",
    "url": "{{ route('front.services.show', $service) }}",
    "provider": {
        "@type": "LocalBusiness",
        "name": "{{ $website_settings->title }}",
        "url": "{{ url('/') }}",
        "telephone": "{{ $website_settings->phone_number }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Riyadh",
            "addressCountry": "SA"
        }
    },
    "areaServed": {
        "@type": "City",
        "name": "Riyadh",
        "addressCountry": "SA"
    },
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "priceCurrency": "SAR",
        "priceSpecification": {
            "@type": "PriceSpecification",
            "description": "Custom pricing based on project requirements. Contact for a free quote."
        }
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "{{ app()->getLocale() === 'ar' ? 'ما هي خدمة ' . ($service->title ?? '') . '؟' : 'What is the ' . ($service->title ?? '') . ' service?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ app()->getLocale() === 'ar' ? 'خدمة ' . ($service->title ?? '') . ' من ويندو للدعاية والاعلان تقدم حلولاً احترافية ومبتكرة تناسب احتياجات عملك. نعمل مع فريق متخصص بخبرة تفوق 25 عاماً لتقديم أفضل النتائج في الرياض والسعودية.' : 'The ' . ($service->title ?? '') . ' service from Window Advertising offers professional and innovative solutions tailored to your business needs. Our specialized team with 25+ years of experience delivers the best results in Riyadh and Saudi Arabia.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ app()->getLocale() === 'ar' ? 'كم تكلفة خدمة ' . ($service->title ?? '') . '؟' : 'How much does ' . ($service->title ?? '') . ' cost?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ app()->getLocale() === 'ar' ? 'تختلف تكلفة خدمة ' . ($service->title ?? '') . ' حسب متطلبات المشروع وحجمه. نقدم عروض أسعار مجانية ومخصصة لكل عميل. تواصل معنا للحصول على عرض سعر مناسب لميزانيتك.' : 'The cost of ' . ($service->title ?? '') . ' varies depending on project requirements and scope. We provide free, customized quotes for each client. Contact us to get a quote that fits your budget.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ app()->getLocale() === 'ar' ? 'لماذا أختار ويندو للدعاية والاعلان لخدمة ' . ($service->title ?? '') . '؟' : 'Why choose Window Advertising for ' . ($service->title ?? '') . '?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ app()->getLocale() === 'ar' ? 'ويندو للدعاية والاعلان شركة رائدة في الرياض بخبرة تفوق 25 عاماً وأكثر من 1000 عميل و3000 مشروع منجز. نتميز بالجودة العالية والالتزام بالمواعيد وأسعار تنافسية في السعودية.' : 'Window Advertising is a leading agency in Riyadh with 25+ years of experience, 1000+ clients, and 3000+ completed projects. We stand out for high quality, on-time delivery, and competitive pricing in Saudi Arabia.' }}"
            }
        }
    ]
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="array_filter([
        ['label' => __('custom.home'), 'url' => route('front.home')],
        ['label' => __('custom.services'), 'url' => route('front.services.index')],
        isset($parentBreadcrumb) ? ['label' => $parentBreadcrumb['name'], 'url' => $parentBreadcrumb['url']] : null,
        ['label' => $service->title ?? ''],
    ])" />

    <div id="service-progress"></div>

    <section id="services-header" class="py-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-4 mt-4 my-2 d-flex flex-column align-items-center" style="z-index: 99;">
                    <h1 class="text-center">{{ $service->title ?? '' }}</h1>
                    <a href="{{ route('front.services.index') }}" style="color: #f9a11b;">@lang('custom.return')</a>
                </div>
            </div>
        </div>
    </section>

    @if($service->content)
    @php
        $fullContent = addAltToImages($service->content, $service->title ?? '');
        [$contentIntro, $contentRest] = splitContentBeforeFirstHeading($fullContent);
    @endphp

    @if($contentIntro)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="service-body mt-3">
                    {!! $contentIntro !!}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($portofolios->count() > 0)
    <section id="portofolio" class="py-4 pt-5">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ $portfolioHeading ?? (app()->getLocale() === 'ar' ? 'أعمالنا' : 'Our Portfolio') }}</h2>
                <div class="title-underline-container">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="porto-data" class="row px-2 row-gap-2">
                <x-portofolios-list :portofolios="$portofolios" />
            </div>
            <div class="d-flex justify-content-center mt-5 mb-5">
                {{ $portofolios->links() }}
            </div>
        </div>
    </section>
    @endif

    @if($contentRest)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="service-body mt-3">
                    {!! $contentRest !!}
                </div>
            </div>
        </div>
    </div>
    @endif

    @else

    @if($portofolios->count() > 0)
    <section id="portofolio" class="py-4 pt-5">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ $portfolioHeading ?? (app()->getLocale() === 'ar' ? 'أعمالنا' : 'Our Portfolio') }}</h2>
                <div class="title-underline-container">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="porto-data" class="row px-2 row-gap-2">
                <x-portofolios-list :portofolios="$portofolios" />
            </div>
            <div class="d-flex justify-content-center mt-5 mb-5">
                {{ $portofolios->links() }}
            </div>
        </div>
    </section>
    @endif

    @endif

    @if(isset($relatedServices) && $relatedServices->count() > 0)
    <section id="related-services" class="py-5">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ app()->getLocale() === 'ar' ? 'خدمات ذات صلة' : 'Related Services' }}</h2>
                <div class="title-underline-container">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row g-4">
                @foreach($relatedServices as $related)
                <div class="col-md-4">
                    <a href="{{ route('front.services.show', $related) }}" class="text-decoration-none">
                        <div class="card h-100 border-0">
                            <img src="{{ $related->display_image }}" class="card-img-top" alt="{{ $related->title }}" loading="lazy">
                            <div class="card-body text-center">
                                <h3 class="card-title fs-5 text-dark">{{ $related->title }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section id="service-faq" class="py-5 bg-light">
        <div class="container">
            <div class="title mb-4 mx-auto">
                <h2 class="text-center mb-2">{{ app()->getLocale() === 'ar' ? 'الأسئلة الشائعة' : 'FAQ' }}</h2>
                <div class="title-underline-container title-second">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="serviceFaqAccordion">
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                            <h3 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#sfaq1">
                                    {{ app()->getLocale() === 'ar' ? 'ما هي خدمة ' . ($service->title ?? '') . '؟' : 'What is the ' . ($service->title ?? '') . ' service?' }}
                                </button>
                            </h3>
                            <div id="sfaq1" class="accordion-collapse collapse show" data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body">
                                    {{ app()->getLocale() === 'ar' ? 'خدمة ' . ($service->title ?? '') . ' من ويندو للدعاية والاعلان تقدم حلولاً احترافية ومبتكرة تناسب احتياجات عملك. نعمل مع فريق متخصص بخبرة تفوق 25 عاماً لتقديم أفضل النتائج في الرياض والسعودية.' : 'The ' . ($service->title ?? '') . ' service from Window Advertising offers professional and innovative solutions tailored to your business needs. Our specialized team with 25+ years of experience delivers the best results in Riyadh and Saudi Arabia.' }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#sfaq2">
                                    {{ app()->getLocale() === 'ar' ? 'كم تكلفة خدمة ' . ($service->title ?? '') . '؟' : 'How much does ' . ($service->title ?? '') . ' cost?' }}
                                </button>
                            </h3>
                            <div id="sfaq2" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body">
                                    {{ app()->getLocale() === 'ar' ? 'تختلف تكلفة خدمة ' . ($service->title ?? '') . ' حسب متطلبات المشروع وحجمه. نقدم عروض أسعار مجانية ومخصصة لكل عميل. تواصل معنا للحصول على عرض سعر مناسب لميزانيتك.' : 'The cost of ' . ($service->title ?? '') . ' varies depending on project requirements and scope. We provide free, customized quotes for each client. Contact us to get a quote that fits your budget.' }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#sfaq3">
                                    {{ app()->getLocale() === 'ar' ? 'لماذا أختار ويندو للدعاية والاعلان لخدمة ' . ($service->title ?? '') . '؟' : 'Why choose Window Advertising for ' . ($service->title ?? '') . '?' }}
                                </button>
                            </h3>
                            <div id="sfaq3" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body">
                                    {{ app()->getLocale() === 'ar' ? 'ويندو للدعاية والاعلان شركة رائدة في الرياض بخبرة تفوق 25 عاماً وأكثر من 1000 عميل و3000 مشروع منجز. نتميز بالجودة العالية والالتزام بالمواعيد وأسعار تنافسية في السعودية.' : 'Window Advertising is a leading agency in Riyadh with 25+ years of experience, 1000+ clients, and 3000+ completed projects. We stand out for high quality, on-time delivery, and competitive pricing in Saudi Arabia.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($latestBlogs) && $latestBlogs->count() > 0)
    <section id="latest-blogs" class="py-5">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ app()->getLocale() === 'ar' ? 'أحدث المقالات' : 'Latest Articles' }}</h2>
                <div class="title-underline-container">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row g-4">
                @foreach($latestBlogs as $latestBlog)
                <div class="col-md-4">
                    <a href="{{ route('front.blogs.show', $latestBlog) }}" class="text-decoration-none">
                        <div class="card h-100 border-0" style="box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-radius: 10px; overflow: hidden;">
                            <img src="{{ $latestBlog->display_image }}" class="card-img-top" alt="{{ $latestBlog->title ?? '' }}" loading="lazy" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="card-title fs-6 fw-bold text-dark">{{ $latestBlog->title ?? '' }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('front.blogs.index') }}" class="cta-btn text-decoration-none text-dark">{{ app()->getLocale() === 'ar' ? 'جميع المقالات' : 'All Articles' }}</a>
            </div>
        </div>
    </section>
    @endif

    <section class="py-5">
        <div class="container">
            <div class="service-cta-section text-center">
                <h2 class="text-white mb-3 border-0" style="border:none;">@lang('custom.contact-us')</h2>
                <a href="{{ route('front.contact.index') }}" class="cta-btn text-decoration-none text-dark d-inline-block mt-2">@lang('custom.contact-us')</a>
            </div>
        </div>
    </section>

@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Add animation classes to service body children
    document.querySelectorAll('.service-body > h2, .service-body > h3, .service-body > p, .service-body > ul, .service-body > ol, .service-body > figure, .service-body > blockquote, .service-body > table').forEach(function (el) {
        el.classList.add('svc-animate');
    });

    // Intersection Observer for scroll-triggered animations
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('svc-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.svc-animate').forEach(function (el) {
        observer.observe(el);
    });

    // Reading progress bar
    var progressBar = document.getElementById('service-progress');
    if (progressBar) {
        window.addEventListener('scroll', function () {
            var scrollTop = window.scrollY;
            var docHeight = document.documentElement.scrollHeight - window.innerHeight;
            var progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            progressBar.style.width = progress + '%';
        });
    }

    // Convert tables to mobile card carousels
    document.querySelectorAll('.service-body table').forEach(function (table) {
        var rows = table.querySelectorAll('tbody tr');
        if (rows.length < 2) return;

        var headers = [];
        rows[0].querySelectorAll('td').forEach(function (td) {
            headers.push(td.textContent.trim());
        });
        if (headers.length < 2) return;

        var carousel = document.createElement('div');
        carousel.className = 'blog-table-carousel svc-animate';
        var track = document.createElement('div');
        track.className = 'carousel-track';

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].querySelectorAll('td');
            if (cells.length === 0) continue;

            var card = document.createElement('div');
            card.className = 'carousel-card';

            var cardHeader = document.createElement('div');
            cardHeader.className = 'carousel-card-header';
            cardHeader.innerHTML = cells[0].innerHTML;
            card.appendChild(cardHeader);

            for (var j = 1; j < cells.length; j++) {
                var row = document.createElement('div');
                row.className = 'carousel-card-row';
                row.innerHTML =
                    '<span class="carousel-card-label">' + (headers[j] || '') + '</span>' +
                    '<span class="carousel-card-value">' + cells[j].innerHTML + '</span>';
                card.appendChild(row);
            }
            track.appendChild(card);
        }

        carousel.appendChild(track);

        var dotsWrap = document.createElement('div');
        dotsWrap.className = 'carousel-dots';
        var cardCount = rows.length - 1;
        for (var d = 0; d < cardCount; d++) {
            var dot = document.createElement('span');
            dot.className = 'carousel-dot' + (d === 0 ? ' active' : '');
            dotsWrap.appendChild(dot);
        }
        carousel.appendChild(dotsWrap);

        var hint = document.createElement('div');
        hint.className = 'swipe-hint';
        hint.textContent = '{{ app()->getLocale() === "ar" ? "← اسحب للتصفح →" : "← Swipe to browse →" }}';
        carousel.appendChild(hint);

        table.parentNode.insertBefore(carousel, table.nextSibling);

        track.addEventListener('scroll', function () {
            var dots = dotsWrap.querySelectorAll('.carousel-dot');
            var scrollLeft = track.scrollLeft;
            var cardWidth = track.querySelector('.carousel-card').offsetWidth + 14;
            var idx = Math.round(scrollLeft / cardWidth);
            dots.forEach(function (dot, i) {
                dot.classList.toggle('active', i === idx);
            });
        });
    });
});
</script>
@endsection
