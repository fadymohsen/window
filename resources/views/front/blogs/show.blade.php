@extends('front.layout.main')

@section('title', $blog->title ?? '')
@section('meta_title', $blog->meta_title ?: ($blog->title ?? ''))
@section('description', $blog->meta_description ?: truncatePostAndRemoveImages($blog->description ?? ''))
@section('keywords', $blog->keywords ?? '')
@section('display_image', $blog->display_image)

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
        "name": "{{ __('custom.blog') }}",
        "item": "{{ route('front.blogs.index') }}"
    }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $blog->title ?? '' }}",
        "item": "{{ route('front.blogs.show', $blog) }}"
    }]
}
</script>
@endsection

@section('page_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $blog->title ?? '' }}",
    "description": "{{ $blog->meta_description ?: truncatePostAndRemoveImages($blog->description ?? '') }}",
    "image": "{{ $blog->display_image }}",
    "url": "{{ route('front.blogs.show', $blog) }}",
    "datePublished": "{{ $blog->created_at->toIso8601String() }}",
    "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Organization",
        "name": "{{ $website_settings->title }}",
        "url": "{{ url('/') }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ $website_settings->title }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ $website_settings->display_logo }}"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('front.blogs.show', $blog) }}"
    },
    "inLanguage": "{{ LaravelLocalization::getCurrentLocale() }}"
}
</script>
@endsection

@section('content')

    <x-breadcrumb :items="[
        ['label' => __('custom.home'), 'url' => route('front.home')],
        ['label' => __('custom.blog'), 'url' => route('front.blogs.index')],
        ['label' => $blog->title ?? ''],
    ]" />

    <div id="blog-progress" style="position:fixed;top:0;left:0;height:3px;width:0;background:#f9a11b;z-index:9999;transition:width 0.1s linear;"></div>

    <section id="blog-header" class="py-2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-4 mt-4 my-2 d-flex flex-column align-items-center">
                    <h1 class="text-center">{{ $blog->title ?? '' }}</h1>
                    <a href="{{ route('front.blogs.index') }}" style="color: #f9a11b;">@lang('custom.return')</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container blog-container">
        <div class="row">
            <div class="blog-header my-2 mb-3 blog-animate blog-visible">
                <h2 class="text-center">{{ $blog->meta_title ?: ($blog->title ?? '') }}</h2>
                <span class="date d-flex justify-content-center"><bdi class="fs-6">{{ $blog->created_at->format('y M D, H:i') }}</bdi></span>
            </div>
            <div class="blog-image col-lg-6 mx-auto blog-animate blog-visible">
                <img loading="lazy" src="{{ $blog->display_image }}" alt="{{ $blog->title ?? '' }}">
            </div>
            <div class="blog-body mt-3">
                {!! addAltToImages($blog->description, $blog->title ?? '') !!}
            </div>
            <div class="text-center my-4 d-flex gap-3 justify-content-center flex-wrap blog-animate">
                <a href="{{ route('front.blogs.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.blog')</a>
                <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.services')</a>
                <a href="{{ route('front.contact.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
            </div>
        </div>
    </div>

    @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
    <section id="related-blogs" class="py-5 bg-light">
        <div class="container">
            <div class="title mx-auto mb-4">
                <h2 class="mb-2">{{ app()->getLocale() === 'ar' ? 'مقالات ذات صلة' : 'Related Articles' }}</h2>
                <div class="title-underline-container">
                    <div class="title-underline w-100"></div>
                </div>
            </div>
            <div class="row g-4">
                @foreach($relatedBlogs as $related)
                <div class="col-md-4">
                    <a href="{{ route('front.blogs.show', $related) }}" class="text-decoration-none">
                        <div class="card h-100 border-0" style="box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-radius: 10px; overflow: hidden;">
                            <img src="{{ $related->display_image }}" class="card-img-top" alt="{{ $related->title ?? '' }}" loading="lazy" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="card-title fs-6 fw-bold text-dark">{{ $related->title ?? '' }}</h3>
                                <span class="text-muted" style="font-size: 0.8rem;"><bdi>{{ $related->created_at->format('Y M d') }}</bdi></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Convert tables to mobile card carousels ---
    document.querySelectorAll('.blog-body table').forEach(function (table) {
        var rows = table.querySelectorAll('tbody tr');
        if (rows.length < 2) return;

        var headers = [];
        rows[0].querySelectorAll('td').forEach(function (td) {
            headers.push(td.textContent.trim());
        });
        if (headers.length < 2) return;

        var carousel = document.createElement('div');
        carousel.className = 'blog-table-carousel blog-animate';
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

        // Dots
        var dotsWrap = document.createElement('div');
        dotsWrap.className = 'carousel-dots';
        var cardCount = rows.length - 1;
        for (var d = 0; d < cardCount; d++) {
            var dot = document.createElement('span');
            dot.className = 'carousel-dot' + (d === 0 ? ' active' : '');
            dotsWrap.appendChild(dot);
        }
        carousel.appendChild(dotsWrap);

        // Swipe hint
        var hint = document.createElement('div');
        hint.className = 'swipe-hint';
        hint.textContent = '{{ app()->getLocale() === "ar" ? "← اسحب للتصفح →" : "← Swipe to browse →" }}';
        carousel.appendChild(hint);

        table.parentNode.insertBefore(carousel, table.nextSibling);

        // Update dots on scroll
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

    // Add blog-animate class to blog-body children for scroll animations
    document.querySelectorAll('.blog-body > h2, .blog-body > h3, .blog-body > p, .blog-body > ul, .blog-body > ol, .blog-body > figure, .blog-body > blockquote, .blog-body > table, .blog-body > .blog-table-carousel').forEach(function (el) {
        el.classList.add('blog-animate');
    });

    // Intersection Observer for scroll-triggered animations
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('blog-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.blog-animate').forEach(function (el) {
        observer.observe(el);
    });

    // Animate reading progress bar
    var progressBar = document.getElementById('blog-progress');
    if (progressBar) {
        window.addEventListener('scroll', function () {
            var scrollTop = window.scrollY;
            var docHeight = document.documentElement.scrollHeight - window.innerHeight;
            var progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            progressBar.style.width = progress + '%';
        });
    }
});
</script>
@endsection