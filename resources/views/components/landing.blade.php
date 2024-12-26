<section class="landing">
    <div class="swiper myHeroSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="landing-content">
                    <div class="landing-text">
                        <h1><span>{{ __('Welcome to') }}</span>
                            {{ __('Metal Casting Limited') }}</h1>
                        <p>{{ __('Where expertise and technology come together to provide the best solutions in metal casting and forming. Discover our services and products that meet all your industrial needs.') }}</p>
                        <a href="{{ route('site.request') }}" class="apply-btn">{{ __('Request Now') }}</a>
                    </div>
                    <img src="{{ asset('site') }}/images/HERO.png" alt="">
                </div>
            </div>
            <!--  -->
            <div class="swiper-slide">
                <div class="landing-content">
                    <div class="landing-text">
                        <h1><span>{{ __('Welcome to') }}</span>
                            {{ __('Metal Casting Limited') }}</h1>
                        <p>{{ __('Where expertise and technology come together to provide the best solutions in metal casting and forming. Discover our services and products that meet all your industrial needs.') }}</p>
                        <a href="{{ route('site.request') }}" class="apply-btn">{{ __('Request Now') }}</a>
                    </div>
                    <img src="{{ asset('site') }}/images/HERO.png" alt="">
                </div>
            </div>
        </div>

        <div class="swiper-pagination heroPagination"></div>

    </div>
</section>
