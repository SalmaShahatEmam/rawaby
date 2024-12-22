@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Projects');
    @endphp
    <section class="news-section projects-section">
        <div class="main-container">
          <div class="row">

            @foreach($projects as $project)
            <div class="col-lg-6">
              <div class="news-card project-card">
                <div class="img">
                  <img src="{{  $project->image_path }}" alt="" />
                </div>

                <h4>{{ $project->name }}</h4>
                <p>
              {!! $project->desc !!}  </p>

                <div class="news-card-links">
                  <a href="{{  route('site.projects.show',$project->slug )}}"> معرفة تفاصيل المشروع </a>
                </div>
              </div>
            </div>

            @endforeach
          </div>
        </div>
      </section>
@endsection
