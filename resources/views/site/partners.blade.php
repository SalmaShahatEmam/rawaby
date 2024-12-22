@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Partners');
    @endphp
    <x-sub-header :name="$name" />
    <section class="partners-section">
        <div class="main-container">
            <h2> تعرف على شركاء نجاحنا  </h2>
            <div class="all-partners">
                <div class="img"> <img src="images/part-4.png" alt=""> </div>
                <div class="img"> <img src="images/part-5.png" alt=""> </div>
                <div class="img"> <img src="images/part-3.png" alt=""> </div>
                <div class="img"> <img src="images/part-2.png" alt=""> </div>
                <div class="img"> <img src="images/part-1.png" alt=""> </div>
                <div class="img"> <img src="images/part-5.png" alt=""> </div>
                <div class="img"> <img src="images/part-3.png" alt=""> </div>
                <div class="img"> <img src="images/part-4.png" alt=""> </div>
                <div class="img"> <img src="images/part-3.png" alt=""> </div>
                <div class="img"> <img src="images/part-1.png" alt=""> </div>
                <div class="img"> <img src="images/part-4.png" alt=""> </div>
                <div class="img"> <img src="images/part-2.png" alt=""> </div>
                <div class="img"> <img src="images/part-5.png" alt=""> </div>
                <div class="img"> <img src="images/part-1.png" alt=""> </div>
                <div class="img"> <img src="images/part-2.png" alt=""> </div>
            </div>
        </div>
     </section>

@endsection
