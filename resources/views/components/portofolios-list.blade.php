@if ($portofolios->count() == 0)
    <div class='fs-1 fw-bold text-center mt-5'>@lang('custom.no-results')!</div>
@else
    @foreach ($portofolios as $portofolio)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ $portofolio->display_image }}" class="glightbox porto-image position-relative d-flex justify-content-center align-items-center" data-gallery="portfolio" data-title="{{ $portofolio->title }}">
                <img src="{{ $portofolio->display_image }}" alt="{{ $portofolio->title }}" style="min-width:100%;min-height:100%;" loading="lazy">
            </a>
        </div>
    @endforeach
@endif