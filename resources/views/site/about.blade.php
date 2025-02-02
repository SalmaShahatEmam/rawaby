@extends('site.layouts.app')
@section('title', __('About Us') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')
    @php
        $name = __('About Us');
    @endphp
    <x-sub-header :name="$name" />
    <x-about-us />

    <x-features :features="$features" />

    <x-customer-review />

    <x-question :questions="$questions" />

    <x-banner />
    <x-partner :partners="$partners" />

@endsection
