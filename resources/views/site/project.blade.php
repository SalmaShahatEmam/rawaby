@extends('site.layouts.app')
@section('title', $project->name  . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name =  $project->name;
    @endphp
        <x-sub-header :name="$name" />

     <section class="project-details-section" >
        <div class="main-container">
                    <div class="img-project"> <img src="{{  $project->image_path }}" alt=""> </div>
                     <div class="project-details-container">
                          <div class="project-txt">
                               <h2> {{ $project->name }}</h2>
                               <p> {!! $project->desc !!}</p>
                          </div>
                          <div class="project-links">
                              <h2> {{ __("نظرة عامة")}}</h2>

                              <div class="item-link">
                                  <div class="icon">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.9999 13.4299C13.723 13.4299 15.1199 12.0331 15.1199 10.3099C15.1199 8.58681 13.723 7.18994 11.9999 7.18994C10.2768 7.18994 8.87988 8.58681 8.87988 10.3099C8.87988 12.0331 10.2768 13.4299 11.9999 13.4299Z" stroke="#FF6F3C" stroke-width="1.5"/>
                                          <path d="M3.61971 8.49C5.58971 -0.169998 18.4197 -0.159997 20.3797 8.5C21.5297 13.58 18.3697 17.88 15.5997 20.54C13.5897 22.48 10.4097 22.48 8.38971 20.54C5.62971 17.88 2.46971 13.57 3.61971 8.49Z" stroke="#FF6F3C" stroke-width="1.5"/>
                                        </svg>
                                  </div>
                                  <div class="txt">
                                      <p class="txt-h" > {{  __('location')}} </p>
                                      <p>  {{  $project->address}}</p>
                                  </div>
                              </div>

                              <div class="item-link">
                                  <div class="icon">
                                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.3622 3.34667C15.2427 4.63374 17.25 7.52381 17.25 10.8827C17.25 15.4391 13.5563 19.1327 9 19.1327C4.44365 19.1327 0.75 15.4391 0.75 10.8827C0.75 8.67066 1.62058 6.66195 3.03781 5.18051C3.8043 6.25092 4.82048 7.13036 6.00121 7.7337C6.04632 4.95803 7.34797 2.48784 9.36211 0.867188C10.1255 1.89094 11.1379 2.75126 12.3622 3.34667Z" stroke="#FF6F3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 16.1331C11.0711 16.1331 12.75 14.4542 12.75 12.3831C12.75 10.4798 11.3321 8.90767 9.49489 8.66547C8.48657 9.57001 7.78619 10.8109 7.57031 12.2117C6.78769 12.0204 6.06529 11.6756 5.43682 11.211C5.31559 11.5797 5.25 11.9738 5.25 12.3831C5.25 14.4542 6.92893 16.1331 9 16.1331Z" stroke="#FF6F3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                  </div>
                                  <div class="txt">
                                      <p class="txt-h" > {{ __('Production Power') }}</p>
                                      <p>{{  $project->power}}</p>
                                  </div>
                              </div>

                              <div class="item-link">
                                  <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.24 2H8.76004C5.00004 2 4.71004 5.38 6.74004 7.22L17.26 16.78C19.29 18.62 19 22 15.24 22H8.76004C5.00004 22 4.71004 18.62 6.74004 16.78L17.26 7.22C19.29 5.38 19 2 15.24 2Z" stroke="#FF6F3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                  </div>
                                  <div class="txt">
                                      <p class="txt-h" > {{ __("الإطار الزمني ") }}</p>
                                      <p> {{  $project->time}}</p>
                                  </div>
                              </div>

                          </div>
                     </div>
       </div>
   </section>

   <div class="project-results">

   <div class="main-container">
            <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/diagram.png" alt=""> </div>
                <div class="txt">
                <h3> {{ __("المخرجات") }} </h3>
                <p> {!! nl2br(e($project->product)) !!} </p>

                </div>
           </div>

        <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/star.png" alt=""> </div>
                <div class="txt">
                <h3> {{ __("المميزات التقنية") }}</h3>
                <p>{!! nl2br(e($project->feature)) !!} </p>
               </div>
        </div>

        <div class="result-item">
                <div class="img"> <img src="{{ asset('site') }}/images/target-result.png" alt=""> </div>
                <div class="txt">
                <h3> {{ __("الفئات المستهدفة") }}</h3>
                <p> {!!$project->target !!} </p>
                </div>
        </div>
   </div>

</div>

<div>
      <p class="link-txt">{{__(" من خلال هذا المشروع، نهدف إلى أن نكون شريكًا استراتيجيًا موثوقًا لشركات النفط والغاز، مع التركيز على الجودة والابتكار, للطلب ولمزيد من المعلومات ")}} </p>
      <a href="{{  route('site.request',["type"=>"projects" ,"slug"=>$project->slug])}}" class="link-contact-us">  {{  __('أطلب ألان')}} </a>
</div>
@endsection
