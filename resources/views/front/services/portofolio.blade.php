@extends('front.layout.main')

@section('title', $service->title ?? '')
@section('meta_title', $service->meta_title ?: ($service->title ?? ''))
@section('description', $service->meta_description ?? '')
@section('keywords', $service->meta_keywords ?? '')
@section('display_image', $service->display_image)

@section('hreflang')
<link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', route('front.services.show', $service)) }}" />
<link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', route('front.services.show', $service)) }}" />
<link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL('en', route('front.services.show', $service)) }}" />
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
    }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $service->title ?? '' }}",
        "item": "{{ route('front.services.show', $service) }}"
    }]
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
@endsection

@section('content')

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-4 svc-animate svc-visible">
                    <img src="{{ $service->display_image }}" alt="{{ $service->title ?? '' }}" class="service-hero-img" loading="lazy">
                </div>

                <div class="service-body mt-3">
                    {!! $service->content !!}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($portofolios->count() > 0)
    <section id="portofolio" class="py-4 pt-5 bg-light">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ app()->getLocale() === 'ar' ? 'أعمالنا' : 'Our Portfolio' }}</h2>
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

    <section class="py-5">
        <div class="container">
            <div class="service-cta-section text-center svc-animate">
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
