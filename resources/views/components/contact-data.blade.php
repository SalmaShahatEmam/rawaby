<section class="benafites contactsection">
    <div class="section-header" data-aos="fade-up">
      <div class="abt-header-txt"> {{ __('Contact Info') }}</div>
    </div>
    <div class="main-container">
      <div class="benafites-cards">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4 cl-mb-sm" data-aos="fade-up">
            <div class="benafite-card cont-card">
              <div class="img">
                <img src="{{ asset('site/images/mail-3.png') }}" alt="" />
              </div>
              <h2> {{ __('Email') }}</h2>
              <p>{{ getSetting('email') }}</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 cl-mb-sm" data-aos="fade-up">
            <div class="benafite-card cont-card">
              <div class="img">
                <img src="{{ asset('site/images/phone-3.png')}}" alt="" />
              </div>
              <h2> {{  __('Phone Number')}}</h2>
              <p>{{ getSetting('phone') }}</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 cl-mb-sm" data-aos="fade-up">
            <div class="benafite-card cont-card">
              <div class="img">
                <img src="{{ asset('site/images/location-3.png')}}" alt="" />
              </div>
              <h2>{{  __('Location')}}</h2>
              <p>{{ getSetting('address') }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
