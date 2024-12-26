<section class="about-us">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="about-text">
                        <h2>{{ __('About Us') }}</h2>
                        <p>{{ __('Metal Casting Limited Company is one of the leading companies in the field of metal casting and shaping, providing innovative industrial solutions that meet the needs of various industrial sectors. Our company was founded to provide local and international solutions.') }}</p>
                        <a href="{{ route('site.about') }}" class="apply-btn">{{ __('More Information') }}</a>
                        <ul>
                            <li>
                                <div class="about-icon">
                                    <img src="{{ asset('site') }}/images/targe.svg" alt="">
                                </div>
                                <p>{{ getSetting('vision_' . app()->getLocale()) }}</p>
                            </li>
                            <li>
                                <div class="about-icon">
                                    <img src="{{ asset('site') }}/images/eyesvg.svg" alt="">
                                </div>
                                <p>{{ getSetting('message_' . app()->getLocale()) }}</p>
                            </li>
                            <li>
                                <div class="about-icon">
                                    <img src="{{ asset('site') }}/images/book.svg" alt="">
                                </div>
                                <p>{{ getSetting('value_desc_' . app()->getLocale()) }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-img">
                    <img class="about-cover" src="{{ asset('site') }}/images/about.png" alt="">
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
        </div>
    </div>
</section>
