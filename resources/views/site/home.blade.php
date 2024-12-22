@extends('site.layouts.app')
@section('title', __('الرئسية') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')
<x-landing/>
<x-about-us/>
<x-product-line/>
<x-services :services="$services"/>
<x-product :products="$products"/>
<x-project :projects="$projects"/>
<x-partner :partners="$partners"/>
<x-news :blogs="$blogs" />
<x-question :questions="$questions"/>
<x-contact-us/>

@endsection
