<section class="barnches-cards-container">
    <div class="main-container">
        <div class="row">
            @foreach($branches as $branch)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <h2> @if(app()->getLocale()=="en") {{ $branch->title_en }} @else {{ $branch->title_ar }}  @endif  </h2>
                    <ul>
                        <li>
                            <a
                        class="bra-item-li"
                        href="https://www.google.com/maps?q={{ $branch->lat }},{{ $branch->lng }}"
                        target="_blank"
                        data-lat="{{ $branch->lat }}"
                        data-lng="{{ $branch->lng }}"
                    >
                                <div class="img">
                                    <img src="{{ asset('site/images/location-2.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <p class="title">{{ __('Address') }}</p>
                                    <p class="decrip">{{ $branch->address }}</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a
                                class="bra-item-li"
                                href="https://wa.me/{{ $branch->phone }}"
                                target="_blank"
                            >
                                <div class="img">
                                    <img src="{{ asset('site/images/phone-2.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <p class="title">{{ __('Phone Number') }}</p>
                                    <p class="decrip">{{ $branch->phone }}</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="bra-item-li">
                                <div class="img">
                                    <img src="{{ asset('site/images/others.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <p class="title">{{ __('Available Services') }}</p>
                                    <p class="decrip">
                                        @foreach($branch->services as $service)
                                            {{ $service->name . " " }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
