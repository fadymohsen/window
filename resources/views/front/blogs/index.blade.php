@extends('front.layout.main')

@section('title', __('custom.blog'))
@section('meta_title', __('custom.blogs-meta-title'))
@section('description', __('custom.blogs-meta-description'))
@section('keywords', __('custom.blogs-meta-keywords'))

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
    }]
}
</script>
@endsection

@section('content')

    <section id="blog-header" class="py-2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-4 mt-4 my-2" style="z-index: 99;">
                    <h1 class="text-center">@lang('custom.blog')</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container flex-fill d-flex flex-column justify-content-center">
        <div class="blogs-card">
            <div class="row">
                <x-blogs-list :blogs="$blogs" />
                <div class="BlogLoader justify-content-center w-100">
                    <span class="loader"></span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-after')
    <script>
        const lang = document.querySelector('html').getAttribute('lang')
        let LastBlogId = {{ $blogs->last()?->id | null }}
    </script>
@endsection