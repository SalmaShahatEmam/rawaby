@extends('site.layouts.app')
@section('title', $product->name. '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = $product->name;
    @endphp
        <x-sub-header :name="$name" />

    <section class="services-details-section">
        <div class="main-container">
            <div class="row">
                <div class="col-md-6"> <img src="{{ $product->image_path }}" alt=""> </div>
                <div class="col-md-6">
                    <h2> {{ $product->name }}</h2>
                    <p> {!! $product->desc !!}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="project-results">

        <div class="main-container">
            <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/Frame 1686551816.png" alt=""> </div>
                <div class="txt">
                    <h3> {{ __('Technical specifications') }} </h3>
                    <p> {!! $product->feature !!} </p>
                </div>
            </div>

            <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/sabk.png" alt=""> </div>
                <div class="txt">
                    <h3> {{ __('Applications') }} </h3>
                    <p> {!! $product->application !!}</p>

                </div>
            </div>

            <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/star.png" alt=""> </div>
                <div class="txt">
                    <h3> {{ __('Advantages') }} </h3>
                    <p> {!! $product->advantage !!}</p>

                </div>
            </div>

        </div>

    </div>

    <div>
        <p class="link-txt">{{ __('We offer a wide range of products designed to meet your needs with precision and efficiency, focusing on achieving the highest levels of performance and reliability in all our solutions.') }}</p>
        <a href="{{ route('site.request', ['type' => 'products', 'slug' => $product->slug]) }}" class="link-contact-us">  {{  __('أطلب ألان')}} </a>
    </div>

    <section class="our-products">
        <div class="main-container">
            <div class="our-products-header">
                <h2>{{ __('Our Products') }}</h2>
                <a href="{{ route('site.products') }}">{{ __('View All') }}</a>
            </div>
            <div class="our-products-container">
                <div class="swiper myProductsSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($products as $pro)
                        <div class="swiper-slide">
                            <div class="our-products-card">
                                <div class="our-products-img">
                                    <img src="{{ $pro->image_path }}" alt="">
                                </div>
                                <div class="our-products-text">
                                    <h3> {{ $pro->name }}</h3>
                                    <a href="{{ route('site.products.show', $pro->slug) }}" class=""> <img src="{{ asset('site') }}/images/send.svg" alt=""></a>
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
@endsection
