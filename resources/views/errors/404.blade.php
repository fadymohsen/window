@extends('front.layout.main')

@section('title', __('custom.404-title'))
@section('meta_title', __('custom.404-title'))

@section('content')
    <section class="py-5 d-flex align-items-center justify-content-center" style="min-height: 60vh;">
        <div class="container text-center">
            <h1 class="display-1 fw-bold" style="color: #f9a11b;">404</h1>
            <h2 class="text-white mb-3">@lang('custom.404-title')</h2>
            <p class="text-gr mb-4 fs-5">@lang('custom.404-description')</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('front.home') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.404-go-home')</a>
                <a href="{{ route('front.services.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.services')</a>
                <a href="{{ route('front.contacts.index') }}" class="cta-btn text-decoration-none text-dark">@lang('custom.contact')</a>
            </div>
        </div>
    </section>
@endsection
