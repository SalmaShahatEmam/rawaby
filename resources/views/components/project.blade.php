@props(['projects'])

<section class="our-prev-projects">
    <div class="main-container">
        <div class="our-prev-projects-header">
            <h2> سابقة أعمالنا </h2>
            <a href="{{route('site.projects')}}">عرض الكل</a>
        </div>
        <div class="our-prev-projects-container">
            <div class="owl-carousel owl-theme" >

                @foreach ($projects as $project )
                <div class="item">
                    <div class="our-prev-projects-card">
                        <div class="our-prev-projects-img">
                            <img src="{{  $project->image_path}}" alt="">
                        </div>
                        <div class="our-prev-projects-text">
                            <h3>{{  $project->name}}</h3>
                            <p> {!! $project->desc !!}</p>
                            <a href="{{ route('site.projects.show',$project->slug) }}" class="main-btn"> معرفة تفاصيل المشروع </a>
                        </div>
                    </div>
                </div>
                @endforeach


                </div>


        </div>
    </div>
</section>
