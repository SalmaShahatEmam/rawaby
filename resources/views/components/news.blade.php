@props(['blogs'])

<section class="news-section">
    <div class="main-container">
         <h2>{{ __('News') }}</h2>
         <p>{{ __('Stay updated with the latest developments in the world of metal casting and manufacturing industries through our diverse articles and tips.') }}</p>
         <div class="row">
            @foreach($blogs as $blog)
              <div class="col-lg-6">
                   <div class="news-card">
                        <div class="img"> <img src="{{ $blog->image_path }}" alt=""> </div>

                        <h4>{!! \Illuminate\Support\Str::limit($blog->name, 50) !!}</h4>
                        <p> {!! \Illuminate\Support\Str::limit($blog->desc, 100) !!} </p>

                        <div class="news-card-links">
                             <a href="{{ route('site.blogs.show', $blog->slug) }}">{{ __('View Details') }}</a>
                             <div class="date">
                                 <img src="{{ asset('site') }}/images/calendar-2.png" alt="">
                                 <p> <p>{{ $blog->created_at}}</p>
                                </p>
                             </div>
                        </div>
                   </div>
              </div>

            @endforeach
         </div>
    </div>
</section>
