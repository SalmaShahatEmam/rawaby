@extends('site.layouts.app')
@section('title', __('تواصل معنا ').'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

<x-contact-data/>
<section class="contactus">
    <div class="main-container">
      <div class="mlr-auto">
        <div class="abt-header-txt" data-aos="fade-up"> {{ __('تواصل معنا') }}</div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 mlr-auto" data-aos="fade-up">
            <form id="contactForm" action="{{ route('site.contact.request') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" placeholder="{{ __('Name') }}" name="name" />
                        <span class="name-error error-text text-danger"></span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" placeholder="{{ __('Email') }}" name="email" />
                        <span class="email-error error-text text-danger"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="number" placeholder="{{ __('Phone Number') }}" name="phone" />
                        <span class="phone-error error-text text-danger"></span>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" placeholder="{{ __('Subject') }}" name="topic" />
                        <span class="topic-error error-text text-danger"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>{{ __("Character Count") }}: <span id="char-count">0</span></p>

                        <textarea placeholder="{{ __('Message') }}" name="message" id="text-input" ></textarea>
                        <span class="message-error error-text text-danger"></span>
                    </div>
                </div>
                <button type="submit">{{ __('Send') }}</button>
              </form>
        </div>
      </div>
    </div>
  </section>

  <section class="main-map">
    <div id="map" style="height: 500px;"></div>
</section>


@endsection

@push('js')<!-- Load the Google Maps JavaScript API optimally -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiy
            Y&loading=async&callback=initMap"></script>


<script>
    let map;
    let lat = 23.330592;//{{ getSetting('lat') }};//28.161233;
    let lng =45.305470;// {{ getSetting('lng') }};//30.607054;

    async function initMap() {

        const position = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");

        map = new Map(document.getElementById("map"), {
            zoom: 5,
            center: position,
            mapId: "DEMO_MAP_ID",
        });

        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: "",
        });

    }

       // Get references to the textarea and the span
       const textInput = document.getElementById('text-input');
    const charCount = document.getElementById('char-count');

    // Add an event listener for input events
    textInput.addEventListener('input', function() {
      // Update the character count
      charCount.textContent = textInput.value.length;
    });
</script>
@endpush
