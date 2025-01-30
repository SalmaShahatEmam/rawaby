@extends('site.layouts.app')
@section('title', __('Product Lines') . '|' . getSetting('site_name_' . app()->getLocale()))

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
                                                <img class="image"  data-bs-toggle="modal" data-bs-target="#exampleModal" src="{{  $product->image_path}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="production-page-card">

                                                <div class="number">
                                                    <span>{{  $loop->iteration}}</span>
                                                </div>
                                                <div class="production-page-card-content">
                                                    <h3> {{ $product->name }}</h3>
                                                    <p> {!! str(  $product->desc)->sanitizeHtml() !!}  </p>

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

                                                        <h3>{{ __('Features') }}</h3>
                                                        <p> {!! str(  $product->feature)->sanitizeHtml() !!} </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="mission-production-container">

                                                    <div class="about-icon">
                                                        <img src="{{ asset('site') }}/images/bag-tick.svg" alt="">
                                                    </div>
                                                    <div class="mission-text">

                                                        <h3>{{ __('Products') }}</h3>
                                                        <p>{!! str(  $product->product)->sanitizeHtml() !!}  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="mission-production-container">
                                                    <div class="about-icon">
                                                        <img src="{{ asset('site') }}/images/checklist.svg" alt="">
                                                    </div>
                                                    <div class="mission-text">

                                                        <h3>{{ __('Technical Specifications') }}</h3>
                                                        <p> {!! str(  $product->advantage)->sanitizeHtml() !!} </p>
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

                    <div class="col-12 production-item production-item-route">
                        <p>{{ __('For more information or to benefit from manufacturing services') }}</p>
                        <a class="apply-btn" href="{{route('site.request')}}">{{ __('Request') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
                <img src="" style="width: 100%; height: 500px; object-fit: scale-down;" id="modalimage" alt="">
            </div>

          </div>
        </div>
      </div>
      @push('js')

      <script>
       const modalImage = document.getElementById('modalimage');
       const images = document.querySelectorAll('.image');

       images.forEach(image => {
           image.addEventListener('click', () => {
               modalImage.src = image.src;
           });
       });

      </script>
      @endpush
@endsection
