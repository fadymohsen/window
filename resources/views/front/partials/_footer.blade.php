<footer class="py-4 text-white">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="fw-bold text-white mb-2">@lang('custom.home')</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('front.home') }}" class="text-gr text-decoration-none">@lang('custom.home')</a></li>
                    <li><a href="{{ route('front.about') }}" class="text-gr text-decoration-none">@lang('custom.about')</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="fw-bold text-white mb-2">@lang('custom.services')</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('front.services.index') }}" class="text-gr text-decoration-none">@lang('custom.our-services')</a></li>
                    <li><a href="{{ route('front.blogs.index') }}" class="text-gr text-decoration-none">@lang('custom.blog')</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold text-white mb-2">@lang('custom.contact-us')</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('front.contacts.index') }}" class="text-gr text-decoration-none">@lang('custom.contact-us')</a></li>
                    <li><a href="tel:+966592945557" class="text-gr text-decoration-none">{{ $website_settings->phone_number }}</a></li>
                </ul>
            </div>
        </div>
        <hr style="border-color: #555;">
        <p class="mb-0 text-center text-dark fw-bold">@lang('custom.copyright') 2024 &copy;.</p>
    </div>
</footer>

<div class="floating-actions flex-column align-items-end gap-2">
    <!-- Scroll to top button -->
    <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fa-solid fa-angles-up"></i></button>
    <!-- Whatssapp floating icon -->
    <div class="d-flex gap-2">
        <a class="whatsapp-floating-icon" href="https://wa.me/966592945557" target="_blank"></a>
        <a class="calling-icon" href="tel:+966592945557" target="_blank"></a>
    </div>
</div>