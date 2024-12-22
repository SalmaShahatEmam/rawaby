@props(["partners"])
<section class="our-partners">
    <div class="our-partners-container">
        <div class="swiper myPartnersSwiper">
            <div class="swiper-wrapper">
                @foreach($partners as $partner)
                <div class="swiper-slide">
                    <div class="our-partners-card">
                        <img src="{{ $partner->image_path }}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
