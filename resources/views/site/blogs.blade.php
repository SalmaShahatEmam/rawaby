
@extends('site.layouts.app')
@section('title',  getSetting('site_name_' . app()->getLocale()))

@section('content')

@php
$parent =__("Blogs");
@endphp
<x-sub-header :name="$name" :parent="$parent" />
  <!-- Blog -->
  <section class="blog-section" >
    <div class="main-container">
          <div class="row">
                <div class="col-lg-4">
                    <div class="blog-search">
                         <div class="blog-search-head">
                               <form action="">
                                      <input type="text" placeholder="بحث">
                                      <button type="submit" class="icon"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                               </form>
                         </div>
                         <div class="blog-search-result">
                            <div class="txt"> اخر الاخبار </div>
                            @foreach($recent_blogs as $blog)
                            <a href="{{ route('site.blogs.show' ,$blog->slug) }}">
                                <div class="img"> <img src="{{ $blog->image_path }}" alt=""> </div>
                                <div class="text">
                                    <p> {{ $blog->title }}</p>
                                    <div class="date">
                                        <div class="icon"> <img src="images/blog-calender.png" alt=""> </div>
                                        <div class="date-txt">{{ $blog->created_at }}</div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                         </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($blogs  as  $blog)
                        <div class="col-md-6">
                            <div class="blog-card">
                                 <div class="img"> <img src="{{ $blog->image_path }}" alt=""> </div>

                                 <div class="blog-card-txt"> {{  $blog->title }}</div>

                                 <p> {!! $blog->desc !!} </p>

                                 <div class="card-conatct">
                                      <a href="blog-details.html"> عرض التفاصيل </a>

                                      <div class="date">
                                             <div class="icon"> <img src="images/blog-calender.png" alt=""> </div>
                                             <p> {{ $blog->created_at }}</p>
                                      </div>
                                 </div>
                            </div>
                     </div>
                        @endforeach


                    </div>
                </div>
          </div>
    </div>
</section>


@endsection
