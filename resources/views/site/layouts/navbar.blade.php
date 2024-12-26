<!-- welcome -->
<main>

    <!-- start header -->
    <section class="header">
        <nav>
            <div class="main-container">
                <a href="/" class="logo-container">
                    <img src="{{ asset('site') }}/images/logo 1.svg">
                </a>
                <div class="nav-element">
                    <ul>
                        <li><a @if( request()->is('/')) class="active" @endif  href="/">{{ __("Home") }}</a></li>
                        <li  class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn" @if( !(request()->is('productlines')) && !(request()->is('/'))  ) class="dropbtn active" @endif> {{ __("About Us") }} <i class="fa-solid fa-angle-down"></i></a>
                            <div class="dropdown-content">
                                <div class="content-item">
                                    <a href="{{ route('site.about') }}">{{ __("Who We Are") }}</a>
                                    <a href="{{ route('site.products') }}">{{ __("Our Products") }}</a>
                                    <a href="{{ route('site.services') }}">{{ __("Our Services") }}</a>
                                    <a href="{{ route('site.projects') }}">{{ __("Our Projects") }}</a>
                                </div>
                                <div class="content-item">
                                    <a href="{{ route('site.sector') }}">{{ __("Target Sectors") }}</a>
                                    <a href="{{ route('site.liberary') }}">{{ __("Media Library") }}</a>
                                    <a href="{{ route('site.blogs') }}">{{ __("Blog") }}</a>
                                    <a href="{{ route('site.partners') }}">{{ __("Our Partners") }}</a>
                                </div>
                            </div>
                        </li>
                        <li><a  @if( request()->is('productlines')) class="active" @endif href="{{ route('site.productlines') }}">{{ __("Production Lines") }}</a></li>
                        <li><a  href="/#contactUs">{{ __("Contact Us") }}</a></li>
                    </ul>
                </div>
                <div class="nav-end">
                    <a href="{{ route('site.jobs') }}" class="apply-btn">{{ __("Apply for a Job") }}</a>
                    <div class="language">
                        <div class="dropdown">
                            <button class="dropbtn"><i class="fa-solid fa-angle-down"></i> @if(app()->getLocale() != "en")   {{ __("English") }}  @else  {{ __("Arabic") }} @endif</button>
                            <div class="dropdown-content">
                                <a @if(app()->getLocale() != "en") class="active-lang" @endif href="/toggle-language/en">{{ __("Arabic") }}</a>
                                <a @if(app()->getLocale() != "ar") class="active-lang" @endif href="/toggle-language/ar">{{ __("English") }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-div">
                        <div class="content" id="times-ican">
                            <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                                <span class="navicon__item"></span>
                                <span class="navicon__item"></span>
                                <span class="navicon__item"></span>
                                <span class="navicon__item"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</main>
