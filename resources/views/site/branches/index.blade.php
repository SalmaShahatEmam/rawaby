@extends('site.layouts.app')
@section('title', __('فروعنا').'|'.getSetting('site_name_'.app()->getLocale()))


@section('content')
<x-branches-second :branches="$branches"/>

@endsection

@push('js')
@endpush
