<section class="production-lines">
    <div class="main-container">
        <div class="row">

            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="production-img">
                    <div class="cover-container">
                        <img class="production-cover"  src="{{ asset('site') }}/images/production1-img.png" alt="">
                    </div>
                    <div class="cover-container">
                        <img class="production-cover"  src="{{ asset('site') }}/images/production2-img.png" alt="">
                    </div>
                    <div class="img-capction">
                        <p>{{ __('Specializing in metal casting using the latest technologies and equipment') }}</p>
                        <div class="capction-icon-container">
                            <div class="capction-icon">
                                <div class="hummer">
                                    <img class="fire-img" src="{{ asset('site') }}/images/fire.svg" alt="">
                                    <img class="hummer-img" src="{{ asset('site') }}/images/hummer.svg" alt="">
                                </div>
                                <div class="kicked-container">
                                    <img src="{{ asset('site') }}/images/kicked.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="production-content">
                    <div class="production-text">
                        <h2>{{ __('Our Production Lines') }}</h2>
                        <p>{{ __('Our production lines are designed with the highest standards of quality and efficiency to provide innovative solutions that meet the needs of various sectors. Using the latest technologies and a specialized team, whether you are looking for manufacturing high-quality products or developing your production processes, we are here to be your ideal partner in success.') }}</p>
                        <a href="{{ route('site.productlines') }}" class="apply-btn">{{ __('Discover more about our production lines') }}</a>
                        <ul>
                            <li>
                                <div class="production-icon">
                                    <img src="{{ asset('site') }}/images/headset.svg" alt="">
                                </div>
                                <p>{{ __('A specialized team provides technical assistance and continuous maintenance.') }}</p>
                            </li>
                            <li>
                                <div class="production-icon setting">
                                    <img  src="{{ asset('site') }}/images/setting.svg" alt="">
                                </div>
                                <p>{{ __('Flexibility and customization to suit your project needs.') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
