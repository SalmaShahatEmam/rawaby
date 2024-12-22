
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
                            <li><a href="/">الرئيسية</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropbtn"> عن الشركة<i class="fa-solid fa-angle-down"></i></a>
                                <div class="dropdown-content">
                                  <div class="content-item">
                                    <a href="{{route('site.about')}}">من نحن</a>
                                    <a href="{{ route('site.products') }}">منتجاتنا</a>
                                    <a href="{{ route('site.services') }}">خدماتنا</a>
                                    <a href="{{ route('site.projects') }}">مشاريعنا</a>
                                  </div>
                                  <div class="content-item">
                                    <a href="{{ route('site.sector') }}">القطاعات المستهدفة </a>
                                    <a href="{{ route('site.liberary') }}">المكتبة المرئية </a>

                                    <a href="{{ route('site.blogs') }}">المدونة</a>
                                    <a href="{{ route('site.partners') }}">شركائنا</a>
                                  </div>

                                </div>

                            </li>
                            <li><a href="{{ route('site.productlines') }}">خطوط الإنتاج</a></li>
                            <li><a href="/#contactUs">تواصل معنا</a></li>

                        </ul>
                    </div>
                    <div class="nav-end">
                        <a href="{{ route('site.jobs') }}" class="apply-btn">قدم على وظيفة</a>
                        <div class="language">

                            <div class="dropdown">
                                <button class="dropbtn"><i class="fa-solid fa-angle-down"></i> عربي </button>
                                <div class="dropdown-content">
                                <a href="#">انجليزي</a>
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
