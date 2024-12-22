<section class="about-cards main-container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
        <div class="about-card">
          <div class="img">
            <img src="{{Storage::disk('public')->url(getSetting('vision_image'))}}" alt="img" />
          </div>
          <h2>{{ __('vision') }}</h2>
          <p>{{ getSetting('vision_'.app()->getLocale()) }}  </p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
        <div class="about-card">
          <div class="img">
            <img src="{{ Storage::disk('public')->url(getSetting('message_image'))  }}" alt="img" />
          </div>
          <h2>{{ __('message') }}</h2>
          <p>{{ getSetting('message_'.app()->getLocale()) }}  </p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
        <div class="about-card">
          <div class="img">
            <img src="{{  Storage::disk('public')->url(getSetting('value_image'))  }}" alt="img" />
          </div>
          <h2>{{ __('Goals') }}</h2>

          <p>{{ getSetting('value_desc_'.app()->getLocale()) }}  </p>
        </div>
      </div>
    </div>
  </section>
