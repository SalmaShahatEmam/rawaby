@extends('site.layouts.app')
@section('title', __('المدونة'))

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
                                <div class="landing__header"> {{ __('تفاصيل الخبر') }} </div>
                                <div class="landing__links">
                                    {{-- {{ $blog->name }}/ --}}
                                    <a href="{{ route('site.blogs') }}"> {{ __('المدونة') }} </a> /
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
    <!-- Blog Section -->
    <section class="about_blog_section">
        <div class="main-container">
            <div class="about_blog_content">
                <div class="img"> <img src="{{ $blog->image_path }}" alt=""> </div>
                <div class="blog__text">
                    <h3> {{ $blog->name }}</h3>
                    {!! $blog->desc !!}
                    <div class="date">
                        <div class="img_date"> <img src="{{ asset('site/images/calendar.png') }}" alt=""> </div>
                        <p> {{ $blog->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about__project__section">
        <div class="main-container">
            <div class="about__service__slider">
                <div class="about__service__slider__header">
                    <h3>{{ __('المزيد من الاخبار') }}</h3>
                </div>
                <div class="about__service__slider__owl">
                    <div class="owl-carousel">
                        @forelse ($other_blogs as $other_blog)
                            <div class="item">
                                <a href="{{ route('site.blogs.show', $other_blog->slug) }}" class="blog__card">
                                    <div class="img"> <img src="{{ $other_blog->image_path }}" alt=""> </div>
                                    <div class="blog__tex">
                                        <h3>{{ $other_blog->name }}</h3>
                                        {!! str::limit($other_blog->desc, 100) !!}
                                        <div class="blog__text__date">
                                            <div class="icon"> <img src="{{ asset('site/images/calendar.png') }}"
                                                    alt=""> </div>
                                            <div class="date__text"> {{ $other_blog->created_at }} </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div>
                                <h3> {{ __('لا يوجد مدونات حاليا') }} </h3>
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
                    1100: {
                        items: 4,
                    },

                },
            });
        });
    </script>
@endpush
