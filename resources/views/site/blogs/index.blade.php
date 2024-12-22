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
                                <div class="landing__header"> {{ __('المدونة') }} </div>
                                <div class="landing__links">
                                    {{ __('المدونة') }}<a href="/"> / {{ __('الرئيسية') }} </a>
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
    <section class="blogs">
        <div class="main-container">
            <div class="about__company__text__header">
                <div class="img">
                    <img src="{{ asset('site/images/about-us-img.png') }}" alt="logo" />
                </div>
                <h2> {{ __('المدونة') }} </h2>
            </div>
            <div id="blogs_data">
                <div class="blogs__content list">
                    @forelse ($blogs as $blog)
                        <a href="{{ route('site.blogs.show', $blog->slug) }}" class="blog__card">
                            <div class="img"> <img src="{{ $blog->image_path }}" alt=""> </div>
                            <div class="blog__tex">
                                <h3 class="blog_name"> {{ $blog->name }}</h3>

                                {!! str::limit($blog->desc, 100) !!}

                                <div class="blog__text__date">
                                    <div class="icon"> <img src="{{ asset('site/images/calendar.png') }}" alt="">
                                    </div>
                                    <div class="date__text"> {{ $blog->created_at }}</div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div>
                            <h3> {{ __('لا يوجد مدونات حاليا') }} </h3>
                        </div>
                    @endforelse

                </div>
                @if ($blogs->count() > 0)
                    <ul class="pagination custom-pagination"></ul>
                @endif
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
                    valueNames: ['blog__tex'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('blogs_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
