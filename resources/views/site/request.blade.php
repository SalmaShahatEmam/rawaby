
@extends('site.layouts.app')
@section('title', __('الرئسية') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
//dd($service);
    $name = __('Request');
@endphp
<x-sub-header :name="$name" />

<section class="conatact-section contact-page" >
    <div class="main-container">
        <div class="conatact-section-header">
          <h2>أخبرنا كيف يمكننا مساعدتك.</h2>
        </div>
        <div class="row">
          <div class="col-lg-6 ctm-n-padd">
              <div class="contatc-us-form">
                      <form action="{{ route('site.request.apply') }}" action="post" id="requestService" >
                        @csrf
                          <div class="row">
                              <div class=" col-lg-12 col-md-6"> <input type="text" placeholder="الاسم" name="name"> </div>
                              <div class="col-lg-12 col-md-6"> <input type="text" placeholder="البريد الالكتروني" name="email"> </div>
                              <div class="col-md-6 ">
                                <div class="select-input master">

                                  <select id="requestType"  name="type">
                                    <option value="">ماذا نقدم لك ؟</option>

                                    <option value="services" @isset($type) @if($type == "services") selected @endif @endisset> خدمات </option>
                                    <option value="products" @isset($type) @if($type == "products") selected @endif @endisset> منتجات </option>
                                    <option value="projects" @isset($type) @if($type == "projects") selected @endif @endisset> مشاريع </option>
                                  </select>
                                  <i class="fa-solid fa-chevron-down"></i>
                                </div>
                              </div>
                              <div class="col-md-6 ">
                                <div class="select-input main " >
                                  <select @if(isset($all_models)) class="enabled-dropdown" @else class="disabled-dropdown" @endif name="id" id="service-offers">
                                    <option value="">اختر</option>
                                    @isset($all_models)
                                    @foreach ($all_models as $model)
                                    <option value="{{ $model->id }}" @if($resource->id == $model->id) selected @endif>{{  $model->name }}</option>

                                    @endforeach
@endisset
                                  </select>
                                  <i class="fa-solid fa-chevron-down"></i>


                                </div>
                              </div>
                              <div class="col-md-6"> <input type="text" placeholder="رقم الهاتف" name="phone"> </div>
                              <div class="col-md-6"> <input type="text" placeholder="الدولة" name="country"> </div>
                              <div class="col-md-6"> <input type="text" placeholder="اسم الشركة" name="company_name"> </div>
                              <div class="col-md-6"> <input type="text" placeholder="الوظيفة" name="job_title"> </div>

                              <div class="col-12"> <textarea name="message" placeholder="اكتب رسالتك هنا" ></textarea> </div>
                          </div>

                          <button type="submit" > إرسال </button>
                      </form>
              </div>
          </div>
          <div class="col-lg-6 ctm-n-padd">
              <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2071.45405928431!2d31.406552246384464!3d31.05277816074429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1733385696129!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
          </div>
        </div>

    </div>
 </section>

 <section class="contact-details">
    <div class="main-container">
      <div class="contact-details-item">
        <div class="item-icon">
          <img src="images/location-pin-alt-1_svgrepo.com.svg" alt="" />
        </div>
        <div class="item-info">
          <h3>موقعنا</h3>
          <p> المنطقة الصناعية - شارع 10، المدينة، الدولة</p>
        </div>
      </div>
      <div class="contact-details-item">
        <div class="item-icon">
          <img src="images/email.svg" alt="" />
        </div>
        <div class="item-info">
          <h3>البريد الالكتروني</h3>
          <p>MetalPulse@gmail.com</p>
        </div>
      </div>
      <div class="contact-details-item">
        <div class="item-icon">
          <img src="images/fax.svg" alt="" />
        </div>
        <div class="item-info">
          <h3>فاكس</h3>
          <p>+9625564565468</p>
        </div>
      </div>
      <div class="contact-details-item">
        <div class="item-icon">
          <img src="images/tel.svg" alt="" />
        </div>
        <div class="item-info">
          <h3>رقم التواصل</h3>
          <p>+9625564565468</p>
        </div>
      </div>


  </div>
</section>
@endsection
