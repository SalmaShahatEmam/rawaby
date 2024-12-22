@extends('site.layouts.app')
@section('title', __('من نحن'))

@include('site.layouts.seo')

@section('background-image')
    style="background-image: url({{ asset('site/images/landing-bg.png') }})"
@endsection
@section('header-hero')
    <div class="owl-carousel">

        <div class="item">
            <div class="landing custom__landing">
                <div class="main-container">
                    <div class="row">
                        <div class="col-lg-7 col-md-5 col-5">
                            <div class="landing__text">
                                <div class="landing__header">{{ __('شركاء النجاح') }}</div>
                                <div class="landing__links">
                                    {{ __('شركاء النجاح') }}<a href="/"> / {{ __('الرئيسية') }} </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 mask-img-intro col-7">
                            <div class="landing-img mask1">
                                <img src="{{ asset('site/images/image.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <section class="partners">
        <div class="main-container">
            <div class="partners__content">
                <div class="about__company__text__header">
                    <div class="img">
                        <img src="{{ asset('site/images/about-us-img.png') }}" alt="logo" />
                    </div>
                    <h2>{{ __('شركاء النجاح') }}</h2>
                </div>
                <div class="partners__slider" id="partner_data">
                    <div class="partner__container list">
                        @forelse ($partners as $partner)
                            <div class="item">
                                <div class="img">
                                    <img class="image-head" src="{{ $partner->image_path }}" alt="" />
                                </div>
                            </div>

                        @empty
                            <div>
                                <h2>{{ __('لا يوجد شركاء حاليا') }}</h2>
                            </div>
                        @endforelse

                    </div>
                    @if ($partners->count() > 0)
                        <ul class="pagination custom-pagination"></ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <!-- Include jQuery and List.js -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('ready');

            function initializeListJS() {
                var options = {
                    valueNames: ['image-head'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('partner_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
