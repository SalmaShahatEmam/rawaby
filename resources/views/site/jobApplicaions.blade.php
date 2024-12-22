@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = $job->title;
    @endphp
    <x-sub-header :name="$name" />
<section class="jop-application">
    <div class="main-container">
        <div class="jops-head">
            <h2>انضم لفريق العمل في شركة السبك المعدني</h2>
            <p>نسعى لجذب الكفاءات التي تساهم في نجاحنا المستمر وتطوير أعمالنا. إذا كنت تبحث عن فرصة عمل مميزة، استعرض الوظائف المتاحة وتقدم الآن!</p>
        </div>
        <div class="jop-form">

            <form id="applyJobs" action="{{ route('site.jobs.submitApplication') }}" method="post" enctype='multipart/form-data'>
                @csrf

                <div class="form-input">

                    <label for="">الاسم *</label>
                    <input type="text" placeholder="أكتب أسمك كاملا" name="name">

                </div>
                <span class="name-error error-text text-danger"></span>

                <div class="form-input">

                    <label for="">البريد الالكتروني *</label>
                    <input type="text" placeholder="البريد الالكتروني" name="email">
                    <span class="email-error error-text text-danger"></span>

                </div>

                <div class="form-input">

                    <label for="">رقم الجوال *</label>
                    <input type="text" placeholder="أكتب رقم جوالك" name="phone">
                </div>
                <span class="phone-error error-text text-danger"></span>


                <div class="form-input">

                    <label for="">العنوان *</label>
                    <input type="text" placeholder="أكتب العنوان" name="address">
                </div>
                <span class="address-error error-text text-danger"></span>

                <input type="hidden" name="job_id" value="{{ $job->id }}">

                <div class="form-input">

                    <label for="">المدينة*</label>
                    <input type="text" placeholder="city" name="city">
                </div>
                <span class="city-error error-text text-danger"></span>

                <div class="form-input file">

                    <label for="">تحميل السيرة الذاتية *</label>
                    <input id="file-input" type="file" name="resume" >
                    <label  class="file-label " for="file-input">
                      <div class="file-text">
                        <img src="{{ asset('site') }}/images/pdf-file-2_svgrepo.com.svg" alt="">
                        <p>قم بإسقاط أوتحميل ملف (PDF أو DOCX)</p>
                      </div>
                    </label>

                    <div class="delete-icon">
                        <i class="fa-regular fa-trash-can"></i>
                    </div>
                </div>
                <span class="resume-error error-text text-danger"></span>
                <div class="next-form">
                    <button type="submit" class="next">
                       {{ __("apply now") }}

                    </button>

                </div>



            </form>
        </div>
    </div>
</section>
@endsection
