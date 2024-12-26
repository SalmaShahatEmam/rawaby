@extends('site.layouts.app')
@section('title', __('About Us').'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')
<section class="about-us about-page">
    @php
        $name = __('About Us');
    @endphp
    <x-sub-header :name="$name" />
    <div class="main-container">
        <div class="row about-section">
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="about-text">
                        <h2>{{ __('Who We Are') }}</h2>
                        <p>{{ __('Metal Casting Company Ltd. is a prominent player in the field of casting and shaping metals, specializing in providing innovative industrial solutions to meet the needs of various sectors. The company was established with the aim of providing high-quality metal products that cater to local and international markets, while committing to exceptional services that enhance customer satisfaction. We strive to build long-term relationships with our partners based on trust and innovation, contributing to the development of the industrial sector and keeping pace with the latest global technologies.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-img">
                    <img class="about-cover" src="{{ asset('site') }}/images/about.png" alt="">
                    <div class="img-capction">
                        <p>{{ __('Specialists in metal casting using the latest technologies and equipment.') }}</p>
                        <div class="capction-icon-container">
                            <div class="capction-icon">
                                <div class="hummer">
                                    <img class="fire-img" src="{{ asset('site') }}/images/fire.svg" alt="">
                                    <img class="hummer-img" src="{{ asset('site') }}/images/hummer.svg" alt="">
                                </div>
                                <div class="kicked-container">
                                    <img src="{{ asset('site') }}/images/kicked.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us mission -->
<section class="about-mission">
    <div class="main-container">
        <div class="row our-mission">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="mission-container">
                    <div class="about-icon">
                        <img src="{{ asset('site') }}/images/targe.svg" alt="">
                    </div>
                    <h3>{{ __('Our Story') }}</h3>
                    <p>{{ __('Our vision is to provide high-quality products to our valued customers while delivering superior service and fast execution of custom orders.') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="mission-container">
                    <div class="about-icon">
                        <img src="{{ asset('site') }}/images/eyesvg.svg" alt="">
                    </div>
                    <h3>{{ __('Our Vision') }}</h3>
                    <p>{{ __('Our mission is to continuously engage with our customers to improve the lifespan of equipment parts and increase business profitability.') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="mission-container">
                    <div class="about-icon">
                        <img src="{{ asset('site') }}/images/book.svg" alt="">
                    </div>
                    <h3>{{ __('Our Mission') }}</h3>
                    <p>{{ __('Our story began when Metal Casting Company was founded in Riyadh in 2013, specializing in the production of high-friction-resistant parts using chromium iron alloys and austenitic steel.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
