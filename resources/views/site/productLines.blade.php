@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Product Lines');
    @endphp
    <x-sub-header :name="$name" />
    <div class="production-page">
        <div class="main-container">
            <div class="production-page-content">
                <div class="mx-0 row ">
                    @foreach($productlines as $product)
                    <div class="col-12 production-item">
                        <div class="mx-0 row">
                            <div class="col-12">
                                <div class="production-page-item">
                                    <div class="mx-0 row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="production-page-card-img">
                                                <img src="{{  $product->image_path}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="production-page-card">

                                                <div class="number">
                                                    <span>{{  $loop->iteration}}</span>
                                                </div>
                                                <div class="production-page-card-content">
                                                    <h3> {{ $product->name }}</h3>
                                                    <p>   {!! $product->desc !!}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mx-0 row">
                                    <section class="production-mission">



                                        <div class="mx-0 row our-mission">
                                            <div class="col-lg-4 col-md-6 col-sm-12">

                                                <div class="mission-production-container">

                                                    <div class="about-icon">
                                                        <img src="{{ asset('site') }}/images/star.svg" alt="">
                                                    </div>
                                                    <div class="mission-text">

                                                        <h3>المزايا</h3>
                                                        <p>{!! $product->feature !!}</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="mission-production-container">

                                                    <div class="about-icon">
                                                        <img src="{{ asset('site') }}/images/bag-tick.svg" alt="">
                                                    </div>
                                                    <div class="mission-text">

                                                        <h3>المنتجات</h3>
                                                        <p> {!! $product->product !!}
                                                          </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="mission-production-container">
                                                    <div class="about-icon">
                                                        <img src="{{ asset('site') }}/images/checklist.svg" alt="">
                                                    </div>
                                                    <div class="mission-text">

                                                        <h3>المواصفات الفنية</h3>
                                                        <p>{!! $product->advantage !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


@endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
