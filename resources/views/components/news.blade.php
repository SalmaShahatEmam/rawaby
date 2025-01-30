@props(["blogs"])
    <section class="blog">
        <div class="main-container">
            <div class="blog-header">
                <h1>المدونة</h1>
                <p>كيف تهتم بحيوانك الأليف؟ نصائح ذهبية لرعاية مثالية!</p>
            </div>
            <div class="blog-content">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{  $blog->image_path }}" alt="">
                                <svg width="100%" height="100%">
                                    <rect x="0" y="0" width="100%" height="100%"
                                          fill="none"
                                          stroke="#FFC200"
                                          stroke-width="1.5"
                                          stroke-dasharray="6, 6"
                                          rx="10" ry="10"/>
                                    </svg>
                            </div>
                            <div class="blog-info">
                                <div class="blog-text">
                                    <h4> {{ $blog->title }}</h4>
                                    <p>{!! $blog->desc !!}</p>
                                </div>
                                <div class="blog-info-links">
                                    <a href="{{ route('site.blogs.show' ,$blog->slug) }}">عرض التفاصيل</a>
                                    <div class="blog-date">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.4668 1.6665V4.1665" stroke="#FFC200" stroke-width="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.1333 1.6665V4.1665" stroke="#FFC200" stroke-width="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.7168 7.5752H17.8835" stroke="#FFC200" stroke-width="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.2999 7.08366V14.167C18.2999 16.667 17.0499 18.3337 14.1332 18.3337H7.46656C4.5499 18.3337 3.2999 16.667 3.2999 14.167V7.08366C3.2999 4.58366 4.5499 2.91699 7.46656 2.91699H14.1332C17.0499 2.91699 18.2999 4.58366 18.2999 7.08366Z" stroke="#FFC200" stroke-width="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.7962 11.4167H10.8037" stroke="#FFC200" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.71189 11.4167H7.71938" stroke="#FFC200" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.71189 13.9167H7.71938" stroke="#FFC200" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                        <p>2023-09-12</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="all-blogs" href="{{ route('site.blogs') }}">المزيد من الاخبار</a>
            </div>
        </div>
        <img class="footer-top-img  sound-birds"  src="images/footer-dog.png" alt="">
        <audio  preload="auto" id="birds" src="./cardinal-37075.mp3"></audio>

    </section>
