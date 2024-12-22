<section
  style="background-image: url('./images/bg-section.png')"
  class="benafites mtb-margin"
>
  <div class="section-header" data-aos="fade-up">
    <div class="abt-header-txt">{{ __('What Distinguishes Us') }}</div>
    <p>{{ __('Why choose Parts and More For Trading') }}</p>
  </div>
  <div class="main-container">
    <div class="benafites-cards">
      <div class="row">
        @foreach($features as $feature)
        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
          <div class="benafite-card">
            <div class="img">
              <img src="{{ asset('storage/'.$feature->image) }}" alt="" />
{{--               <img class="s1" src="{{ asset('site/images/s-1.png') }}" alt="" />
 --}}            </div>
            <h2>{{ $feature->name }}</h2>
            <p>
              {{ $feature->desc }}
            </p>
          </div>
        </div>
@endforeach
      </div>
    </div>
  </div>
</section>
