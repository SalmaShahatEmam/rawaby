@extends('site.layouts.app')
@section('title', __('Home') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = $job->title;
    @endphp
    <x-sub-header :name="$name" />
<section class="jop-application">
    <div class="main-container">
        <div class="jops-head">
            <h2>{{ __('Join the Team at Metal Casting Company') }}</h2>
            <p>{{ __('We aim to attract talents who contribute to our continuous success and business development. If you\'re looking for a great job opportunity, check out the available positions and apply now!') }}</p>
        </div>
        <div class="jop-form">

            <form id="applyJobs" action="{{ route('site.jobs.submitApplication') }}" method="post" enctype='multipart/form-data'>
                @csrf

                <div class="form-input">

                    <label for="">{{ __('Name *') }}</label>
                    <input type="text" placeholder="{{ __('Enter your full name') }}" name="name">

                </div>
                <span class="name-error error-text text-danger"></span>

                <div class="form-input">

                    <label for="">{{ __('Email *') }}</label>
                    <input type="text" placeholder="{{ __('Email') }}" name="email">
                    <span class="email-error error-text text-danger"></span>

                </div>

                <div class="form-input">

                    <label for="">{{ __('Phone Number *') }}</label>
                    <input type="text" placeholder="{{ __('Enter your phone number') }}" name="phone">
                </div>
                <span class="phone-error error-text text-danger"></span>


                <div class="form-input">

                    <label for="">{{ __('Address *') }}</label>
                    <input type="text" placeholder="{{ __('Enter your address') }}" name="address">
                </div>
                <span class="address-error error-text text-danger"></span>

                <input type="hidden" name="job_id" value="{{ $job->id }}">

                <div class="form-input">

                    <label for="">{{ __('City *') }}</label>
                    <input type="text" placeholder="{{ __('City') }}" name="city">
                </div>
                <span class="city-error error-text text-danger"></span>

                <div class="form-input file">

                    <label for="">{{ __('Upload Resume *') }}</label>
                    <input id="file-input" type="file" name="resume" >
                    <label  class="file-label " for="file-input">
                      <div class="file-text">
                        <img src="{{ asset('site') }}/images/pdf-file-2_svgrepo.com.svg" alt="">
                        <p>{{ __('Drop or upload a file (PDF or DOCX)') }}</p>
                      </div>
                    </label>

                    <div class="delete-icon">
                        <i class="fa-regular fa-trash-can"></i>
                    </div>
                </div>
                <span class="resume-error error-text text-danger"></span>
                <div class="next-form">
                    <button type="submit" class="next">
                       {{ __('Apply Now') }}
                    </button>

                </div>

            </form>
        </div>
    </div>
</section>
@endsection
