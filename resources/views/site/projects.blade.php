@extends('site.layouts.app')
@section('title', __('Projects') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Projects');
    @endphp
    <x-sub-header :name="$name" />

    <section class="news-section projects-section">
        <div class="main-container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-6">
                        <div class="news-card project-card">
                            <div class="img">
                                <img src="{{ $project->image_path }}" alt="" />
                            </div>

                            <h4>{{ $project->name }}</h4>
                            <p>
                                {!! $project->desc !!} </p>
                            <div class="news-card-links">
                                <a href="{{ route('site.projects.show', $project->slug) }}"> {{ __('Project Details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            {{ $projects->links() }}
        </div>
    </section>
@endsection
