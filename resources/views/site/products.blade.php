@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Products');
    @endphp
    <x-sub-header :name="$name" />

<section class="products-sectoin">
    <div class="main-container">
        <h2> نقدم حلولاً مبتكرة لتلبية احتياجاتكم الصناعية.  </h2>
        <p> تتميز منتجاتنا بالجودة العالية والدقة، مما يجعلها الاختيار المثالي للعديد من الصناعات مثل الأسمنت، الحديد، المعدات الثقيلة، وغيرها. نسعى دومًا لتوفير منتجات تجمع بين الأداء المثالي والمتانة التي تحتاجها المشاريع الصناعية الكبرى. </p>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('site.products.show',$product->slug) }}" class="img-ccard-product">
                      <img src="{{  $product->image_path }}" alt="">
                      <div class="txt">
                        <p> {{  $product->name }}</p>
                          <img src="{{ asset('site') }}/images/send.svg" alt="">
                      </div>
                </a>
           </div>
            @endforeach





        </div>
    </div>

</section>
@endsection
