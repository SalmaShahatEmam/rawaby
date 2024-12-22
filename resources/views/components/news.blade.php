@props(['blogs'])

<section class="news-section">
    <div class="main-container">
         <h2> الأخبار </h2>
         <p> ابقَ على اطلاع بأحدث المستجدات في عالم السبك المعدني والصناعات المعدنية من خلال مقالاتنا ونصائحنا المتنوعة. </p>
         <div class="row">
            @foreach($blogs as $blog)
              <div class="col-lg-6">
                   <div class="news-card">
                        <div class="img"> <img src="{{  $blog->image_path  }}" alt=""> </div>

                        <h4>{{ $blog->name }}</h4>
                        <p> {!! $blog->desc !!}</p>

                        <div class="news-card-links">
                             <a href="{{  route('site.blogs.show',$blog->slug) }}"> عرض التفاصيل  </a>
                             <div class="date">
                                 <img src="{{ asset('site') }}/images/calendar-2.png" alt="">
                                 <p> <p>{{ \Carbon\Carbon::createFromTimestamp((int)$blog->created_at)->translatedFormat('F j, Y') }}</p>
                                </p>
                             </div>
                        </div>
                   </div>
              </div>

              @endforeach
         </div>
    </div>
</section>
