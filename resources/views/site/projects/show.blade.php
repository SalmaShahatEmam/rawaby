@extends('site.layouts.app')
@section('title', __('المشاريع'))

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
                                <div class="landing__header"> {{ __('تفاصيل المشروع') }} </div>
                                <div class="landing__links">
                                    {{-- {{ $project->name }}/ --}}
                                    <a href="{{ route('site.projects') }}"> {{ __('المشاريع') }} </a> /
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
    <section class="about__project">
        <div class="main-container">
            <div class="about__project__content">
                <div class="img"> <img src="{{ $project->image_path }}" alt=""> </div>
                <div class="about__project__text">
                    <h4> {{ $project->name }}</h4>
                    <p> {{ $project->desc }} </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about__project__section">
        <div class="main-container">
            <div class="about__service__slider">
                <div class="about__service__slider__header">
                    <h3> {{ __('مشاريع اخري') }}</h3>
                </div>
                <div class="about__service__slider__owl">
                    <div class="owl-carousel">
                        @forelse ($other_projects as $project)
                            <div class="item">
                                <a href="{{ route('site.projects.show', $project->slug) }}" class="project_details_slider">
                                    <div class="img"> <img src="{{ $project->image_path }}" alt=""> </div>
                                    <h3>{{ $project->name }}</h3>
                                    <p> {{ Str::limit($project->desc, 100)  }} </p>

                                </a>
                            </div>
                        @empty
                            <div>
                                <h3> {{ __('لا يوجد مشاريع حاليا') }} </h3>
                            </div>
                        @endforelse



                    </div>
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
                    valueNames: ['text-name'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('projects_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });


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
