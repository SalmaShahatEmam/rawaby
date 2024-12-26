@extends('site.layouts.app')
@section('title', __('الرئسية') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
//dd($service);
    $name = __('Common Questions');
@endphp
<x-sub-header :name="$name" />
<section class="question-section" >
    <div class="main-container">
         <div class="common-questions-head"> <h2> {{  __("Common Questions")}} </h2> </div>
    </div>
    <div class="ctmx-container">

       <!--  -->
         <h2 class="question-head" >  {{  __("All")}}  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','all') as $question)

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseOne">
                    {{  $question->question}}
                   </button>
                 </h2>
                 <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                   <div class="accordion-body">
                    {{  $question->answer}}                         </div>
                 </div>
               </div>
               @endforeach
             </div>
         </div>
         <!--  -->



       <!--  -->
         <h2 class="question-head" >  {{ __("المنتجات وخطوط الإنتاج") }} </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','services') as $question)
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseOne">
                   {{  $question->question}}
                  </button>
                </h2>
                <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                   {{  $question->answer}}                         </div>
                </div>
              </div>
               @endforeach
             </div>
         </div>
         <!--  -->


       <!--  -->
         <h2 class="question-head" >  {{ __("Hiring") }}  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','jobs') as $question)

            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseOne">
                   {{  $question->question}}
                  </button>
                </h2>
                <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                   {{  $question->answer}}                         </div>
                </div>
              </div>
               @endforeach
             </div>
         </div>
         <!--  -->


       <!--  -->
         <h2 class="question-head" >  {{ __("التواصل والشركاء ") }} </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','contacts') as $question)

            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseOne">
                   {{  $question->question}}
                  </button>
                </h2>
                <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                   {{  $question->answer}}                         </div>
                </div>
              </div>
            @endforeach

             </div>
         </div>
         <!--  -->
         <h2 class="question-head" >  {{ __("الدعم الفنى") }} </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','support') as $question)

            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseOne">
                   {{  $question->question}}
                  </button>
                </h2>
                <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                   {{  $question->answer}}                         </div>
                </div>
              </div>
            @endforeach

             </div>
         </div>

    </div>
</section>
@endsection
