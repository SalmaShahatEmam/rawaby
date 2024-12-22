@if (request()->is('/'))
<div class="hero">
    <div class="row">
      <div class="col-12 col-xl-6 text-hero">
        <div class="text">
          <div class="text-header">
            <p data-aos="fade-up">{{ __('Parts and More For Trading') }}</p>
            <img
              data-aos="fade-up"
              src="{{ asset('site/images/line.png')}}"
              alt="smile-line"
            />
          </div>
          <h3 data-aos="fade-up">
            {{ __('We provide all your spare part needs with the highest quality.') }}
          </h3>
          <p data-aos="fade-up" class="desc">
            {{ __('Parts and More For Trading offers a wide range of original and certified car spare parts for all types of vehicles, with exceptional customer service to ensure your comfort and trust.') }}
          </p>
          <div class="main-btn more-read" data-aos="fade-up">
            <a href="#aboutUs"> <p>{{ __('Read More') }}</p> </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6 hero-img">
        <img src="{{ asset('site/images/hero-img.png')}}" alt="" />
      </div>
    </div>
    <div class="abs-img">
      <img src="{{ asset('site/images/hero-bg-img-1.png')}}" alt="img" />
      <img src="{{ asset('site/images/hero-bg-img-2.png')}}" alt="img" />
      <img src="{{ asset('site/images/hero-bg-img-3.png')}}" alt="img" />
    </div>
    <div class="img-setting">
      <img src="{{ asset('site/images/settings-circle.png')}}" alt="img" />
    </div>
</div>
@else
@if(request()->is('contact'))
@php $location = __("Contact Us"); @endphp
@elseif(request()->is('services'))
@php $location = __("Our Services"); @endphp
@elseif(request()->is('branches'))
@php $location = __("Our Branches"); @endphp
@elseif(request()->is('about'))
@php $location = __("About Us"); @endphp
@endif
<div class="custom-hero">
    <img src="{{ asset('site/images/settings-circle.png')}}" alt="img" />
    <img class="ctm-img" src="{{ asset('site/images/hero-imgs.png')}}" alt="img" />
    <h2 data-aos="fade-up">{{ $location }}</h2>
    <div class="custom-hero-links" data-aos="fade-up">
      <a href="/">{{ __('Home') }}</a>
      <img src="{{ asset('site/images/home-img.png')}}" alt="" />
      <p>{{ $location }}</p>
    </div>
</div>
@endif
