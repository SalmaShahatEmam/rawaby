@extends('site.layouts.app')
@section('title', __('Target Sectors') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
    $name = __('Target Sectors');
@endphp
<x-sub-header :name="$name" />

<!-- Targeted Sectors -->
<section class="targeted-sectors">
    <div class="main-container">

        <div class="row targeted-sectors-content">
            @foreach ( $sectors as $sector)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="targeted-sectors-card">
                    <div class="targeted-sectors-card-img">
                        <img src="{{  $sector->image_path }}" alt="">
                    </div>
                    <div class="targeted-sectors-card-text">
                        <h4> {{ $sector->name }}</h2>
                        <p>{!! $sector->desc !!} </p>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>
@endsection
