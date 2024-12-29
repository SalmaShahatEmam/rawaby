@extends('site.layouts.app')
@section('title', $job->title . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = $job->title;
    @endphp
    <x-sub-header :name="$name" />
    <section class="jop-details-page">
        <div class="jop-details-img">
            <img src="{{ asset('site').'/images/JOB ICON.svg' }}" alt="">
        </div>
        <div class="main-container">
            <div class="jop-details-content">
                <div class="jop-details-content-head">
                    <h2>{{ $job->title }}</h2>
                </div>
                <div class="jop-description">

                    <h3>{{ $job->section }}</h3>
                    <div class="main-description">
                        <div class="time sub-main-description">
                            <img src="{{ asset('site') }}/images/clock.svg" alt="">
                            <p>{{ $job->hours . " ".__("Hour Daily") }}</p>
                        </div>
                        <div class="experience sub-main-description">
                            <img src="{{ asset('site') }}/images/bag-exp.svg" alt="">
                            <p>{{ $job->expertise }}</p>
                        </div>
                        <div class="work-place sub-main-description">
                            <img src="{{ asset('site') }}/images/building-3.svg" alt="">
                            <p>{{ $job->work_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="main-tasks sub-description">
                    <div class="main-tasks-head description-head">
                        <img src="{{ asset('site') }}/images/to-do_svgrepo.com.svg" alt="">
                        <h3>{{ __('Core Tasks') }}</h3>
                    </div>
                    <div class="">
                        <p>{!! nl2br(e($job->core_tasks)) !!}</p>
                    </div>
                </div>
                <div class="skills sub-description">
                    <div class="skills-head description-head">
                        <img src="{{ asset('site') }}/images/to-do_svgrepo.com.svg" alt="">
                        <h3>{{ __('Required Skills') }}</h3>
                    </div>
                    <div class="">
                        <p>{!! nl2br(e($job->required_skills)) !!}</p>
                    </div>
                </div>
                <div class="features sub-description">
                    <div class="features-head description-head">
                        <img src="{{ asset('site') }}/images/to-do_svgrepo.com.svg" alt="">
                        <h3>{{ __('Advantages') }}</h3>
                    </div>
                    <div class="">
                        <p>{!! nl2br(e($job->advantages)) !!}</p>
                    </div>
                </div>
            </div>
            <div class="news-card-links">
                <a class="apply-now-link" href="{{ route('site.jobs.apply', $job->slug) }}">{{ __('Apply Now') }}</a>
            </div>
        </div>
    </section>
@endsection
