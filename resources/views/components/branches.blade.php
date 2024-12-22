<section class="barnches">
    <div class="section-header" data-aos="fade-up">
      <div class="abt-header-txt">{{ __('Our Branches') }}</div>
      <p>{{ __('Here are the company branches across the Kingdom') }}</p>
      <img src="{{ asset('site/images/map-img.png')}}" alt="img" />
    </div>
    <div class="main-container">
      <div class="row">
        @foreach($branches as $branch)
        <div class="col-12 col-sm-6 col-lg-4 mka-border" data-aos="fade-up">
          <div class="links-card">
            <ul>
              <li>
             {{--    <a
                class="bra-item-li"
                href="https://www.google.com/maps?q={{ $branch->lat }},{{ $branch->lng }}"
                target="_blank"
                data-lat="{{ $branch->lat }}"
                data-lng="{{ $branch->lng }}"
            >
                --}} <img src="{{ asset('site/images/b-location.png')}}" alt="" />
                <p>{{ __('Address') }} : {{$branch->title}}</p>{{-- </a> --}}
              </li>
              <li>
                <img src="{{ asset('site/images/b-phone.png')}}" alt="" />
                <p>{{ __('Phone Number') }} : {{$branch->phone}}</p>
              </li>
              <li>
                <img src="{{ asset('site/images/b-services.png')}}" alt="" />
                <p>{{ __('Available Services') }} :  @foreach($branch->services as $service) {{ $service->name ." " }} @endforeach</p>
              </li>
            </ul>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
