@extends('site.layouts.app')
@section('title', __('الرئسية') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
//dd($service);
    $name = __('Services');
@endphp
<x-sub-header :name="$name" />
<section class="question-section" >
    <div class="main-container">
         <div class="common-questions-head"> <h2> الأسئلة الشائعة  </h2> </div>
    </div>
    <div class="ctmx-container">

       <!--  -->
         <h2 class="question-head" >  عام  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','all') as $question)

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{  $question->question}}
                   </button>
                 </h2>
                 <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                   <div class="accordion-body">
                    {{  $question->answer}}                         </div>
                 </div>
               </div>
               @endforeach
             </div>
         </div>
         <!--  -->



       <!--  -->
         <h2 class="question-head" >  المنتجات وخطوط الإنتاج  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','services') as $question)
               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       {{  $question->question}}
                   </button>
                 </h2>
                 <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                   <div class="accordion-body">
                       {{  $question->answer}}
                                            </div>
                 </div>
               </div>
               @endforeach
             </div>
         </div>
         <!--  -->


       <!--  -->
         <h2 class="question-head" >  التوظيف  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','jobs') as $question)

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{  $question->question}}
                   </button>
                 </h2>
                 <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                   <div class="accordion-body">
                    {{  $question->answer}}                        </div>
                 </div>
               </div>
               @endforeach
             </div>
         </div>
         <!--  -->


       <!--  -->
         <h2 class="question-head" >  التواصل والشركاء  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','contacts') as $question)

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 {{  $question->question}}
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 {{  $question->answer}}                        </div>
              </div>
            </div>
            @endforeach

             </div>
         </div>
         <!--  -->
         <h2 class="question-head" >   الدعم الفنى  </h2>
         <div class="questions-common-conatiner">
           <div class="accordion" id="accordionExample">
            @foreach($questions->where('category','support') as $question)

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 {{  $question->question}}
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 {{  $question->answer}}                        </div>
              </div>
            </div>
            @endforeach

             </div>
         </div>

    </div>
</section>
@endsection
