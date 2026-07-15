<footer class="site-footer py-5">
    <div class="container">
        <div class="row g-4">
            {{-- Logo & Description --}}
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('front.home') }}">
                    <img src="{{ asset('front/images/window-final logo-1.png') }}" alt="{{ $website_settings->title }}" style="height: 50px;" class="mb-3">
                </a>
                <p class="text-gr mb-3" style="font-size: 0.9rem; line-height: 1.8;">
                    {{ app()->getLocale() === 'ar' ? 'ويندو للدعاية والاعلان — شركة دعاية واعلان رائدة في الرياض بخبرة تفوق 25 عاماً. متخصصون في تنظيم حفلات ومؤتمرات، بوثات معارض، تصميم هويه بصرية، وهدايا دعائيه.' : 'Window Advertising — a leading advertising agency in Riyadh with 25+ years of experience. Specializing in event planning, conferences, exhibition booths, identity design, and promotional gifts.' }}
                </p>
            </div>

            {{-- Services Links --}}
            <div class="col-lg-4 col-md-6">
                <h3 class="footer-heading mb-3" style="color: #f9a11b; font-size: 1.1rem; font-weight: 700;">@lang('custom.our-services')</h3>
                <ul class="list-unstyled footer-links">
                    @if(isset($footer_services))
                        @foreach($footer_services as $footerService)
                            <li class="mb-2">
                                <a href="{{ route('front.services.show', $footerService) }}" class="text-gr text-decoration-none footer-link">
                                    <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                                    {{ $footerService->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            {{-- Quick Links & Contact --}}
            <div class="col-lg-4 col-md-12">
                <h3 class="footer-heading mb-3" style="color: #f9a11b; font-size: 1.1rem; font-weight: 700;">{{ app()->getLocale() === 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h3>
                <ul class="list-unstyled footer-links mb-3">
                    <li class="mb-2">
                        <a href="{{ route('front.home') }}" class="text-gr text-decoration-none footer-link">
                            <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                            @lang('custom.home')
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('front.about') }}" class="text-gr text-decoration-none footer-link">
                            <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                            @lang('custom.about')
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('front.services.index') }}" class="text-gr text-decoration-none footer-link">
                            <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                            @lang('custom.services')
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('front.blogs.index') }}" class="text-gr text-decoration-none footer-link">
                            <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                            @lang('custom.blog')
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('front.contact.index') }}" class="text-gr text-decoration-none footer-link">
                            <i class="fa-solid fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" style="font-size: 0.6rem; color: #f9a11b;"></i>
                            @lang('custom.contact')
                        </a>
                    </li>
                </ul>

                <h3 class="footer-heading mb-3" style="color: #f9a11b; font-size: 1.1rem; font-weight: 700;">{{ app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us' }}</h3>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2 text-gr"><i class="fa-solid fa-phone" style="color: #f9a11b;"></i> <a href="tel:+966592945557" class="text-gr text-decoration-none"><bdi>{{ $website_settings->phone_number }}</bdi></a></li>
                    <li class="mb-2 text-gr"><i class="fa-solid fa-envelope" style="color: #f9a11b;"></i> <a href="mailto:{{ $website_settings->email }}" class="text-gr text-decoration-none">{{ $website_settings->email }}</a></li>
                    <li class="mb-2 text-gr"><i class="fa-solid fa-location-dot" style="color: #f9a11b;"></i> <a href="https://maps.app.goo.gl/hJBnz8GRZqQd86rq7" target="_blank" rel="noopener" class="text-gr text-decoration-none">@lang('custom.contact-address')</a></li>
                </ul>

                <div class="d-flex gap-3 mt-3">
                    @if($website_settings->facebook_url)<a href="{{ $website_settings->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-square-facebook text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->instagram_url)<a href="{{ $website_settings->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-square-instagram text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->linkedin_url)<a href="{{ $website_settings->linkedin_url }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->twitter_url)<a href="{{ $website_settings->twitter_url }}" target="_blank" rel="noopener" aria-label="X"><i class="fa-brands fa-square-x-twitter text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->snapchat_url)<a href="{{ $website_settings->snapchat_url }}" target="_blank" rel="noopener" aria-label="Snapchat"><i class="fab fa-snapchat-square text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->tiktok_url)<a href="{{ $website_settings->tiktok_url }}" target="_blank" rel="noopener" aria-label="TikTok"><i class="fab fa-tiktok text-white" style="font-size:1.5rem"></i></a>@endif
                    @if($website_settings->youtube_url)<a href="{{ $website_settings->youtube_url }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube text-white" style="font-size:1.5rem"></i></a>@endif
                </div>
            </div>
        </div>

        <hr class="my-4" style="border-color: rgba(255,255,255,0.15);">
        <p class="mb-0 text-center text-gr" style="font-size: 0.85rem;">@lang('custom.copyright') {{ date('Y') }} &copy;.</p>
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