@extends('site.layouts.app')
@section('title', __('Services') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
//dd($service);
    $name = __('Services');
@endphp
<x-sub-header :name="$name" />
<section class="products-sectoin">
    <div class="main-container">

        <div class="row">

            @foreach($services as $service)
            <div class="col-12 col-sm-6 col-lg-4">
                   <div class="services-card">
                        <div class="img"> <img src="{{  $service->image_path }}" alt=""> </div>

                       <div class="txt">
                                <p> {{  $service->name }}</p>
                                <h4> {!! \Illuminate\Support\Str::words($service->desc, 10, '...') !!}</h4>

                                <a href="{{ route('site.services.show',$service->slug) }}"> {{ __('Show Details') }} </a>
                       </div>
                   </div>
            </div>

            @endforeach


        </div>
    </div>

</section>
@endsection
