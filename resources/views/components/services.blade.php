<section class="our-services">
    <div class="main-container">
        <div class="our-services-header">
            <h2>{{  __('Our Services')}}</h2>
            <a href="{{  route('site.services') }}">{{ __('Show All') }}</a>
        </div>
        <div class="our-services-container">
            <div class="swiper myServicesSwiper">
                <div class="swiper-wrapper">

                    @foreach($services as $service)
                    <div class="swiper-slide">
                        <div class="our-services-card">
                            <div class="our-services-img">
                                <img src="{{$service->image_path}}" alt="">
                            </div>
                            <div class="our-services-text">
                                <h3> {{ $service->name }}</h3>
                                <p> {!!   \Illuminate\Support\Str::words($service->desc, 10, '...')!!}</p>
                                <a class="more-btn" href="{{ route('site.services.show',$service->slug) }}"> {{ __('Show Details') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            <div class="swiper-button-next Services-btn-next"></div>
            <div class="swiper-button-prev Services-btn-prev"></div>
        </div>
    </div>
</section>
