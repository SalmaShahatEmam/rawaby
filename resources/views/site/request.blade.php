@extends('site.layouts.app')
@section('title', __('Request') .'|'.getSetting('site_name_'.app()->getLocale()))

@section('content')

@php
    $name = __('Request');
@endphp
<x-sub-header :name="$name" />

<section class="conatact-section contact-page">
    <div class="main-container">
        <div class="conatact-section-header">
          <h2>{{ __('Let us know how we can help you.') }}</h2>
        </div>
        <div class="row">
          <div class="col-lg-6 ctm-n-padd">
              <div class="contatc-us-form">
                <form action="{{ route('site.request.apply') }}" method="post" id="requestService">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <input type="text" placeholder="{{ __('Name') }}" name="name">
                            <span class="text-danger name-error error-text"></span>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <input type="text" placeholder="{{ __('Email') }}" name="email">
                            <span class="text-danger email-error error-text"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="select-input master">
                                <select id="requestType" name="type">
                                    <option value="">{{ __('What do we offer you?') }}</option>
                                    <option value="services" @isset($type) @if($type == "services") selected @endif @endisset>{{ __('Services') }}</option>
                                    <option value="products" @isset($type) @if($type == "products") selected @endif @endisset>{{ __('Products') }}</option>
                                    <option value="projects" @isset($type) @if($type == "projects") selected @endif @endisset>{{ __('Projects') }}</option>
                                </select>
                                <span class="text-danger type-error error-text"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="select-input main">
                                <select @if(isset($all_models)) class="enabled-dropdown" @else class="disabled-dropdown" @endif name="id" id="service-offers">
                                    <option value="">{{ __('Choose') }}</option>
                                    @isset($all_models)
                                    @foreach ($all_models as $model)
                                    <option value="{{ $model->id }}" @if($resource->id == $model->id) selected @endif>{{ $model->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                                <span class="text-danger id-error error-text"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="{{ __('Phone Number') }}" name="phone">
                            <span class="text-danger phone-error error-text"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="{{ __('Country') }}" name="country">
                            <span class="text-danger country-error error-text"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="{{ __('Company Name') }}" name="company_name">
                            <span class="text-danger company_name-error error-text"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="{{ __('Job Title') }}" name="job_title">
                            <span class="text-danger job_title-error error-text"></span>
                        </div>
                        <div class="col-12">
                            <textarea name="message" placeholder="{{ __('Write your message here') }}"></textarea>
                            <span class="text-danger message-error error-text"></span>
                        </div>
                    </div>

                    <button type="submit">{{ __('Send') }}</button>
                </form>

              </div>
          </div>
          <div class="col-lg-6 ctm-n-padd">

                <div class="contact-map" id="map">
                <input type="hidden" name="lat" value="{{ getSetting("location")['lat'] }}">
                <input type="hidden" name="lng" value="{{getSetting("location")['lng'] }}">
                </div>
          </div>


        </div>

    </div>
 </section>

 <section class="contact-details">
    <div class="main-container">



       <a class="contact-details-item" href="{{ 'https://www.google.com/maps/search/?api=1&query='.getSetting('location')['lat'].','.getSetting('location')['lng'] }}" target="_blank">

            <div class="item-icon">
                <img src="{{ asset('site') }}/images/location-pin-alt-1_svgrepo.com.svg" alt="" />
              </div>
            <div class="item-info">
                <h3>{{ __('Our Location') }}</h3>
                <p>{{ getSetting('address') }}</p>
              </div>
        </a>

        <a href="{{ 'mailto:'.getSetting('email') }}" class="contact-details-item">
            <div class="item-icon">
                <img src="{{ asset('site') }}/images/email.svg" alt="" />
              </div>

              <div class="item-info">
                <h3>{{ __('Email') }}</h3>
                <p>{{ getSetting('email') }}</p>
              </div>
        </a>

      <div class="contact-details-item">
        <a href="{{ 'tel:+'.getSetting('phone') }}">
            <div class="item-icon">
                <img src="{{ asset('site') }}/images/tel.svg" alt="" />
              </div>
              <div class="item-info">
                <h3>{{ __('Contact Number') }}</h3>
                <p>{{ getSetting('phone') }}</p>
              </div>
        </a>

      </div>

  </div>
</section>
@endsection
