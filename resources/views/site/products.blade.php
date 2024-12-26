@extends('site.layouts.app')
@section('title', __('Products') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Products');
    @endphp
    <x-sub-header :name="$name" />

<section class="products-sectoin">
    <div class="main-container">
        <h2>{{ __('We offer innovative solutions to meet your industrial needs.') }}</h2>
        <p>{{ __('Our products are distinguished by high quality and precision, making them the ideal choice for various industries such as cement, steel, heavy equipment, and more. We always strive to provide products that combine optimal performance and durability needed for major industrial projects.') }}</p>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('site.products.show', $product->slug) }}" class="img-ccard-product">
                      <img src="{{ $product->image_path }}" alt="">
                      <div class="txt">
                        <p>{{ $product->name }}</p>
                          <img src="{{ asset('site') }}/images/send.svg" alt="">
                      </div>
                </a>
           </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
