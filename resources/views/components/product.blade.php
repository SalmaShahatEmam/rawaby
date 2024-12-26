@props(['products'])

<section class="our-products">
    <div class="main-container">
        <div class="our-products-header">
            <h2>{{ __("منتجاتنا") }}</h2>
            <a href="{{ route('site.products') }}">{{ __("عرض الكل") }}</a>
        </div>
        <div class="our-products-container">
            <div class="swiper myProductsSwiper">
                <div class="swiper-wrapper">
                    @foreach ( $products as $product )
                    <div class="swiper-slide">
                        <div class="our-products-card">
                            <div class="our-products-img">
                                <img src="{{ $product->image_path }}" alt="">
                            </div>
                            <div class="our-products-text">
                                <h3> {{ $product->name }}</h3>
                                <a href="{{ route('site.products.show',$product->slug) }}" class=""> <img src="{{ asset('site') }}/images/send.svg" alt=""></a>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>
            </div>
            <div class="swiper-button-next products-btn-next"></div>
            <div class="swiper-button-prev products-btn-prev"></div>
        </div>
    </div>
</section>
