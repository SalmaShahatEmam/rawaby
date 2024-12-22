@extends('site.layouts.app')
@section('title', __('خدماتنا'))

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
                                <div class="landing__header"> {{ __('تفاصيل الخدمة') }} </div>
                                <div class="landing__links">
                                    {{-- {{ $service->name }} / --}}
                                    <a href="{{ route('site.services') }}"> {{ __('خدماتنا') }} </a> /
                                    <a href="/"> {{ __('الرئيسية') }} </a>
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

    <section class="about__services">
        <div class="main-container">
            <div class="about__services__text">
                <h3>
                    {{ $service->name }}
                </h3>
                <p>
                    {{ $service->desc }}
                </p>
                <a href="{{ route('site.services.order',$service->slug) }}" class="btn__text">
                    <p>{{ __('طلب الخدمة') }}</p>
                    <div class="icon"><i class="fa-solid fa-arrow-left-long"></i></div>
                </a>
            </div>
            <div class="services__img__container">
                @foreach ($service->images as $image)
                    <div class="img"><img src="{{ asset('storage/' . $image) }}" alt="" /></div>
                @endforeach
            </div>
            <div class="about__service__slider">
                <div class="about__service__slider__header">
                    <h3>{{ __('خدمات اخري') }}</h3>
                </div>
                <div class="about__service__slider__owl">
                    <div class="owl-carousel">
                        @forelse ($otherServices as $otherService)
                            <div class="item">
                                <a href="{{ route('site.services.show', $otherService->slug) }}"
                                    class="item__slider__service">
                                    <div class="img">
                                        <img src="{{ $otherService->icon_path }}" alt="" />
                                    </div>
                                    <h3>{{ $otherService->name }}</h3>

                                    <h6>{{ Str::limit($otherService->desc, 100) }}</h6>
                                </a>
                            </div>
                        @empty
                            <div class="no-data">
                                <p>{{ __('لا يوجد بيانات') }}</p>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".about__service__slider .owl-carousel").owlCarousel({
                loop: true,
                nav: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fa-solid fa-arrow-left-long"></i>', // Left arrow
                    '<i class="fa-solid fa-arrow-right-long"></i>' // Right arrow
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });
        });
    </script>
@endpush
