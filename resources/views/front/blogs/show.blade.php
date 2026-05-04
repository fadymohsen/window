@extends('front.layout.main')

@section('title', $blog->title ?? '')
@section('meta_title', $blog->meta_title ?: ($blog->title ?? ''))
@section('description', $blog->meta_description ?: truncatePostAndRemoveImages($blog->description ?? ''))
@section('keywords', $blog->keywords ?? '')
@section('display_image', $blog->display_image)

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

    <div id="blog-progress" style="position:fixed;top:0;left:0;height:3px;width:0;background:#f9a11b;z-index:9999;transition:width 0.1s linear;"></div>

    <section id="blog-header" class="py-2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-4 mt-4 my-2 d-flex flex-column align-items-center" style="z-index: 99;">
                    <h1 class="text-center">@lang('custom.blog')</h1>
                    <a href="{{ route('front.blogs.index') }}" style="color: #f9a11b;">@lang('custom.return')</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container blog-container">
        <div class="row">
            <div class="blog-header my-2 mb-3 blog-animate">
                <h2 class="text-center">{{ $blog->title ?? '' }}</h2>
                <span class="date d-flex justify-content-center"><bdi class="fs-6">{{ $blog->created_at->format('y M D, H:i') }}</bdi></span>
            </div>
            <div class="blog-image col-lg-6 mx-auto blog-animate">
                <img loading="lazy" src="{{ $blog->display_image }}" alt="{{ $blog->title ?? '' }}">
            </div>
            <div class="blog-body mt-3">
                {!! $blog->description !!}
            </div>
            <div class="text-center my-4 d-flex gap-3 justify-content-center flex-wrap blog-animate">
                <a href="{{ route('front.blogs.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.blog')</a>
                <a href="{{ route('front.contacts.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact-us')</a>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Add blog-animate class to blog-body children for scroll animations
    document.querySelectorAll('.blog-body > h2, .blog-body > h3, .blog-body > p, .blog-body > ul, .blog-body > ol, .blog-body > figure, .blog-body > blockquote, .blog-body > table').forEach(function (el) {
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