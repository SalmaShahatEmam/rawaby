@extends('site.layouts.app')
@section('title', __('Partners') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Partners');
    @endphp
    <x-sub-header :name="$name" />
    <section class="partners-section">
        <div class="main-container">
            <h2>{{ __("تعرف على شركاء نجاحنا") }} </h2>
            <div class="all-partners">
                @foreach ($partners as $partner)
                    <div class="partner">
                        <img src="{{ $partner->image_path }}" alt="">
                    </div>

                @endforeach

            </div>
        </div>
     </section>

@endsection
