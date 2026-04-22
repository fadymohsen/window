@extends('dashboard.layouts.app')

@section('title', __('dashboard.redirect_edit'))

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-auto ms-auto">
                <a href="{{ route('dashboard.slug-redirects.index') }}"><button class="btn btn-light"><i class="ri-arrow-go-forward-fill me-1 align-bottom"></i> @lang('dashboard.return')</button></a>
            </div>
        </div>
    </div>
</div>
<form id="edit-slug-redirect-form" data-id="{{ $redirect->id }}">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="type">@lang('dashboard.redirect_type')</label>
                <select id="type" name="type" class="form-select">
                    <option value="blog" {{ $redirect->type === 'blog' ? 'selected' : '' }}>@lang('dashboard.blogs')</option>
                    <option value="service" {{ $redirect->type === 'service' ? 'selected' : '' }}>@lang('dashboard.services')</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="from_slug">@lang('dashboard.redirect_from')</label>
                <input id="from_slug" type="text" class="form-control" name="from_slug" value="{{ $redirect->from_slug }}" dir="ltr" required>
            </div>
            <div class="mb-3">
                <label for="to_slug">@lang('dashboard.redirect_to')</label>
                <input id="to_slug" type="text" class="form-control" name="to_slug" value="{{ $redirect->to_slug }}" dir="ltr" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-success w-sm loader-btn ms-auto">
                <p class="mb-0">@lang('dashboard.save')</p>
                <div class="loader"></div>
            </button>
        </div>
    </div>
</form>

@endsection

@section('custom-js')
    <script src="{{ asset('back/js/slug-redirect-module.js') }}" type="module"></script>
@endsection
