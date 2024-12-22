@extends('site.layouts.app')
@section('title', __('الرئسية') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')

    @php
        $name = __('Liberaries');
    @endphp
    <x-sub-header :name="$name" />

    <section class="our-library">
        <div class="main-container">
            <div class="library-content">
                <div class="library-page-head">
                    <h2> {{ $liberary->name }}</h2>
                    <P>{!! $liberary->desc !!}</P>
                </div>
                 <!-- start video-aboutus  -->
                <section class="video-aboutus" style="background-image: url(./images/video.png);">
                    <div class="video-container">
                        <!-- Video element -->
                        <video id="video" src="{{  $liberary->image_path}}" type="video/mp4" preload="metadata" muted crossorigin="anonymous" controls>
                          Your browser does not support the video tag.
                        </video>

                        <!-- Thumbnail (generated from the video) -->
                        <div class="thumbnail" id="thumbnail">
                        </div>
                      </div>
                </section>
                <!-- end video-aboutus  -->
            </div>


        </div>
    </section>
    @push('js')
    <script>
        // Get the video, thumbnail, and thumbnail image elements
        const video = document.getElementById('video');
        const thumbnail = document.getElementById('thumbnail');
        const thumbnailImg = document.getElementById('thumbnail-img');

        // Create a canvas element to capture the video frame
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Ensure the video is fully loaded before capturing a frame
        video.addEventListener('loadedmetadata', function() {
          // Set canvas size to match the video size
          const middleTime = video.duration / 2;
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;

          // Capture the first frame of the video (at 0 seconds)
          video.currentTime = middleTime;

          // Wait for the video to seek to the 0 second position before drawing the frame
          video.addEventListener('seeked', function() {
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Set the thumbnail image source to the canvas data URL
            thumbnailImg.src = canvas.toDataURL();
          });
        });

        // Add event listener to thumbnail to play the video on click
        thumbnail.addEventListener('click', function() {
          // Reset the video's current time to 0 (start) and play
          video.currentTime = 0;
          video.play();

          // Hide the thumbnail when the video starts
          thumbnail.style.display = 'none';
        });

        // Optional: Pause the video when it ends and show the thumbnail again
        video.addEventListener('ended', function() {
          thumbnail.style.display = 'flex';
        });
      </script>
    @endpush
    @endsection
