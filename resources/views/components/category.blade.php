@props(["categories"])
<section class="department_classifications" >
    <div class="main-container">
            <div class="department_classifications_head">
                   <div class="top-title"> تصنيفات الاقسام </div>
                   <p> نوفر كل شيء من الطعام والعناية إلى الترفيه والمستلزمات اليومية </p>
            </div>

            <div class="owl-carousel department_classifications_slider">
                @foreach($categories as $category)
                  <div class="item">
                        <a href="/" class="card">
                               <div class="img"> <img src="{{ $category->icon_path}}" alt=""> </div>
                               <div class="txt">
                                   <div class="name"> {{ $category->name }} </div>
                                   <p> {{ $category->productCount() . ' ' . __('product')}} </p>
                               </div>
                               <div class="icon"> <i class="fa-solid fa-arrow-left"></i> </div>
                        </a>
                  </div>
                @endforeach
            </div>
    </div>
</section>

