@extends('site.layouts.app')
@section('title', __('Home') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')
   <!-- Hero Section -->
   <section class="hero-section"  >
    <div class="main-container" style="background-image: url('images/hero\ section.png');" >
         <div class="owl-carousel carousel-hero">
              <div class="item">
                  <div class="crousel-card-dog">
                      <div class="txt">
                            <h2> كـل مـا يحتاجـه حيوانـك الأليـف فـي   <span> مكان واحد  !</span>   </h2>

                            <p> أفضل المنتجات، العروض المميزة، وخدمات استثنائية لرعاية أصدقائك الأوفياء. لأنهم يستحقون الأفضل دائمًا </p>

                            <a class="shopping-now" href="/"> تسوّق الآن </a>
                      </div>
                      <div class="imgs">
                           <div style="background-image: url('images/bg-yellow.png');" class="img-1"> <img src="images/dog.png" alt=""> </div>
                           <div style="background-image: url('images/bg-white.png');" class="img-2"> <img src="images/dog-hand.png" alt=""> </div>
                           <div class="haddi"> <img src="images/haddi 1.png" alt=""> </div>
                           <div style="background-image: url('images/discount.png');" class="discount">
                              <h2> خصم <br> خاص </h2>
                              <p>  لفترة محدودة </p>
                           </div>
                           <div class="discount-precentge"> 60%- </div>
                      </div>

                      <div class="home-img">
                           <img src="images/home.png" alt="">
                      </div>

                      <div class="dog-foot">
                            <img src="images/dog-foot.png" alt="">
                      </div>
               </div>
              </div>
              <div class="item">
                  <div class="crousel-card-dog">
                      <div class="txt">
                            <h2> كـل مـا يحتاجـه حيوانـك الأليـف فـي   <span> مكان واحد  !</span>   </h2>

                            <p> أفضل المنتجات، العروض المميزة، وخدمات استثنائية لرعاية أصدقائك الأوفياء. لأنهم يستحقون الأفضل دائمًا </p>

                            <a href="/"> تسوّق الآن </a>
                      </div>
                      <div class="imgs">
                           <div style="background-image: url('images/bg-yellow.png');" class="img-1"> <img src="images/dog.png" alt=""> </div>
                           <div style="background-image: url('images/bg-white.png');" class="img-2"> <img src="images/dog-hand.png" alt=""> </div>
                           <div class="haddi"> <img src="images/haddi 1.png" alt=""> </div>
                           <div style="background-image: url('images/discount.png');" class="discount">
                              <h2> خصم <br> خاص </h2>
                              <p>  لفترة محدودة </p>
                           </div>
                           <div class="discount-precentge"> 60%- </div>
                      </div>

                      <div class="home-img">
                           <img src="images/home.png" alt="">
                      </div>

                      <div class="dog-foot">
                            <img src="images/dog-foot.png" alt="">
                      </div>
               </div>
              </div>
         </div>
    </div>
</section>
<x-category/>
<x-best-seller/>
<x-about-us/>
<x-banner/>
<x-partner :partners="$partners"/>
<x-customer-review/>
   <!-- newas banner-->
   <section class="news-banner" style="background-image: url(images/banner-bg.png);">
    <div class="main-container">
        <div class="news-banner-content">
            <div class="news-banner-header">
                <h1>اشترك فى النشرة الاخبارية واحصل على 20% خصم</h1>
                <form action="">
                    <input type="text" placeholder="ادخل بريدك الالكتروني">
                    <button type="submit">ارسال</button>
                </form>
            </div>
        </div>
        <div class="news-banner-img sound-cat">
            <img src="images/news.png" alt="">
            <audio preload="auto" id="soundCat" src="./mixkit-cartoon-kitty-begging-meow-92.wav" loop></audio>
        </div>
    </div>
</section>


<x-news :blogs="$blogs" />

@push("js")
<script>
// Get references to the textarea and the span
const textInput = document.getElementById('text-input');
const charCount = document.getElementById('char-count');

// Add an event listener for input events
textInput.addEventListener('input', function() {
  // Update the character count
  charCount.textContent = textInput.value.length;


});
</script>
@endpush
@endsection
