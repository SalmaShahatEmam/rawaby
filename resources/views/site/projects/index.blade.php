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
                                <div class="landing__header"> {{ __('المشاريع') }} </div>
                                <div class="landing__links">
                                    {{ __('المشاريع') }}<a href="/"> / {{ __('الرئيسية') }} </a>
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
    <!-- Projects Section -->
    <section class="projects projects__page">
        <div class="main-container">
            <div class="projects__content">
                <div class="about__company__text__header">
                    <div class="img">
                        <img src="{{ asset('site/images/about-us-img.png') }}" alt="logo" />
                    </div>
                    <h2> {{ __('المشاريع') }} </h2>
                </div>
                <div id="projects_data">
                    <div class="projects__slider__container list">
                        @forelse ($projects as $project)
                            <a href="{{ route('site.projects.show', $project->slug) }}" class="item">
                                <div class="project__card">
                                    <div class="img"> <img src="{{ $project->image_path }}" alt=""> </div>
                                    <h3 class="text-name"> {{ $project->name }}</h3>
                                    <p> {{ Str::limit($project->desc, 100)  }} </p>


                                </div>
                            </a>
                        @empty
                            <div>
                                <h3> {{ __('لا يوجد مشاريع حاليا') }} </h3>
                            </div>
                        @endforelse
                    </div>
                    @if ($projects->count() > 0)
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
                    valueNames: ['text-name'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('projects_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
