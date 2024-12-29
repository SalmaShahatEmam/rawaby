@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Jobs');
    @endphp
    <x-sub-header :name="$name" />

    <section class="our-jops">
        <div class="main-container">
            <div class="jops-head">
                <h2>{{ __('انضم لفريق العمل في شركة السبك المعدني') }}</h2>
                <p>{{ __('نسعى لجذب الكفاءات التي تساهم في نجاحنا المستمر وتطوير أعمالنا. إذا كنت تبحث عن فرصة عمل مميزة، استعرض الوظائف المتاحة وتقدم الآن') }}</p>
            </div>
            <div class="jops-content">

              <div class="row">
                @foreach($jobs as $job)
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{  route('site.jobs.show',$job->slug)}}" class="jops-item">
                          <div class="jops-item-head main-head">
                            <h3> {{  $job->title }}</h3>
                          </div>
                          <div class="jop-item-details-hover">
                            <div class="jops-item-head">
                              <h3> {{  $job->title}}</h3>
                            </div>
                            <div class="jop-item-details">
                                <h3>  {{ $job->section }}</h3>
                                <div class="work-time">
                                    <img src="{{ asset('site') }}/images/clock.svg" alt="">
                                    <p>  {{$job->hours . " ".__("Hour Daily") }}</p>
                                </div>
                                <div class="experiecnc">
                                    <img src="{{ asset('site') }}/images/bag-exp.svg" alt="">
                                    <p>{{  $job->expertise}}</p>

                                </div>
                            </div>
                          </div>

                    </a>
                  </div>

@endforeach
                </div>
            </div>





        </div>

    </section>
    @endsection
