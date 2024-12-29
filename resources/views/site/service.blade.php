
@extends('site.layouts.app')
@section('title', __('الرئسية') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
//dd($service);
    $name = __('Services');
@endphp
<x-sub-header :name="$name" />
<section class="services-details-section" >
    <div class="main-container">
        <div class="row">
           <div class="col-md-6"> <img src="{{  $service->image_path }}" alt=""> </div>
           <div class="col-md-6">
               <h2> {{  $service->name }}</h2>
               <p> {!! $service->desc !!} </p>
           </div>
        </div>
    </div>
</section>

  <div class="project-results">

  <div class="main-container">
           <div class="result-item">
               <div class="img"> <img src="{{ asset('site') }}/images/diagram.png" alt=""> </div>
               <div class="txt">
               <h3> {{ __('service steps') }}</h3>
               <p>{!! nl2br(e($service->service_step)) !!} </p>

               </div>
          </div>

       <div class="result-item">
               <div class="img"> <img src="{{ asset('site') }}/images/star.png" alt=""> </div>
               <div class="txt">
               <h3>  {{ __('advantages') }}</h3>
               <p>{!! nl2br(e( $service->advantage )) !!} </p>

               </div>
       </div>

  </div>

</div>

<div>
     <p class="link-txt"> {{ __('We offer a range of services that meet your needs accurately and efficiently, including advanced hydraulic system services, designed to provide high performance and lasting reliability.') }} </p>
     <a href="{{  route('site.request',["type"=>"services" ,"slug"=>$service->slug])}}" class="link-contact-us">  {{  __('أطلب ألان')}} </a>
</div>
@endsection
