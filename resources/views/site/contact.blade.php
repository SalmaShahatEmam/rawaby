    @extends('site.layouts.app')
@section('title', __('تواصل معنا ').'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')
@php
$name = __('contact us');
@endphp
<x-sub-header :name="$name" />



<section class="contact-section" >
<div class="main-container">
    <div class="row">
       <div class="col-lg-6">
           <div class="contact-inf">
                     <div class="question-txt-container">
                         <div class="txt-head-question">  بيانات التواصل </div>
                         <p>  في حدائق روابي النيل، نلتزم بتوفير مجموعة متنوعة من المنتجات التي تلبي احتياجات محبي الحيوانات الأليفة ونباتات الزينة. نسعى دائمًا لتقديم أفضل الحلول لضمان راحة ورفاهية حيواناتكم الأليفة </p>
                     </div>
                     <div class="contact-links">
                           <div class="links">
                                 <a href="/" class="link">
                                       <div class="img"> <i class="fa-solid fa-location-dot"></i> </div>
                                       <p> المملكة العربية السعودية </p>
                                 </a>
                                 <a href="/" class="link">
                                       <div class="img"> <i class="fa-regular fa-envelope"></i> </div>
                                       <p> Gardenniles info1987@gmail.com </p>
                                 </a>
                                 <a href="/" class="link">
                                       <div class="img"> <i class="fa-solid fa-phone"></i> </div>
                                       <p> +96646567655 - +96646567655</p>
                                 </a>
                           </div>
                           <div class="img"> <img src="{{ asset('site') }}/images/cat-contact.png" alt=""> </div>
                     </div>
           </div>
       </div>
       <div class="col-lg-6">
           <div class="contact-form">
                <form id="contactForm" action="{{ route('site.contact.request') }}" method="post">
                    @csrf
                         <p> تواصل معنا </p>

                         <div class="ctm-inp">
                               <input type="text" placeholder="الاسم" name="name" >
                               <span class="name-error error-text text-danger"></span>

                               <input type="text" placeholder="البريد الالكتروني" name="email">
                               <span class="email-error error-text text-danger"></span>

                         </div>

                         <div class="ctm-inp">
                               <input type="text" placeholder="رقم الهاتف" name="phone">
                               <span class="phone-error error-text text-danger"></span>

                               <input type="text" placeholder="الموضوع" name="subject">
                               <span class="subject-error error-text text-danger"></span>

                         </div>

                         <textarea name="message" placeholder="نص الرسالة" ></textarea>
                         <span class="message-error error-text text-danger"></span>

                         <button type="submit" > ارسال </button>
                </form>
           </div>
       </div>
    </div>
</div>
</section>

<!-- Google map -->
<section class="map" >
       <iframe
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509807!2d-122.419415084681!3d37.77492927975945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808fb3d3a3b1%3A0x3c6e0b5a2e3e5c68!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1617922030200!5m2!1sen!2sus"
               width="100%"
               height="450"
               style="border:0;"
               allowfullscreen=""
               loading="lazy">
      </iframe>
</section>

@endsection

