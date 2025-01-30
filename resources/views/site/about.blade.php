@extends('site.layouts.app')
@section('title', __('About Us').'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')
@php
    $name = __('About Us');
@endphp
<x-sub-header :name="$name" />
<section class="about-us about-page">
    <div class="main-container">
        <div class="row about-section">
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="about-text">
                        <h2>{{ __('Who We Are') }}</h2>
                        <p>{{  getSetting('about_desc_' . app()->getLocale()) }}</p>
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
                    <p>{{getSetting('message_' . app()->getLocale()) }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="mission-container">
                    <div class="about-icon">
                        <img src="{{ asset('site') }}/images/eyesvg.svg" alt="">
                    </div>
                    <h3>{{ __('Our Vision') }}</h3>
                    <p>{{getSetting('vision_' . app()->getLocale()) }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="mission-container">
                    <div class="about-icon">
                        <img src="{{ asset('site') }}/images/book.svg" alt="">
                    </div>
                    <h3>{{ __('Our Mission') }}</h3>
                    <p>{{  getSetting('value_desc_' . app()->getLocale())}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
