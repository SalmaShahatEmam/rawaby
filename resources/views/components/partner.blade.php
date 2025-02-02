
@props(["partners"])

<section class="partners">
    <div class="main-container">
        <div class="owl-carousel owl-partner owl-theme">
            @foreach($partners as $partner)
            <div class="item">
                <div class="partner-item">
                    <div class="partner-img">
                        <img src="{{ $partner->image_path }}" alt="">
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
