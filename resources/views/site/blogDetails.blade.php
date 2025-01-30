
@extends('site.layouts.app')
@section('title',$blog->name . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

@php
$name =$blog->name;
$parent =__("Blogs");
@endphp
<x-sub-header :name="$name" :parent="$parent" />
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

                                <div class="blog-card details">
                                     <div class="img"> <img src="{{  $blog->image_path }}" alt=""> </div>

                                     <div class="date">
                                          <div class="icon"> <img src="images/calendar-2.png" alt=""> </div>
                                          <p>{{ $blog->created_at }}</p>
                                    </div>

                                     <div class="blog-card-txt-details"> {{ $blog->title }} </div>

                                     <p class="dt" >  {!! $blog->desc !!} </p>

                                </div>

                </div>
          </div>
    </div>
</section>

@endsection
