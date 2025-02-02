@props(["features"])

<section class="features" style="background-image: url('{{ asset('site') }}/images/featuers-bg.png');" >
    <img class="features-banner" src="{{ asset('site') }}/images/image-about 1.png">
    <div class="main-container">
                <div class="department_classifications_head">
                    <div class="top-title">   مميزاتنا  </div>
                    <p>  معنا عالمًا من الرعاية الاستثنائية التي تجعل حيوانك الأليف سعيدًا وصحيًا </p>
                </div>

                <div class="featuers-cards">
                       <div class="row">
                        @foreach($features as $feature)
                            <div class="col-sm-6 col-lg-4">
                                  <div class="featuers-card">
                                        <div class="img"> <img src="{{ asset('site') }}/images/24-7.png" alt=""> </div>

                                        <div class="featuers-txt-title"> {{$feature->title}}</div>

                                        <p>{{ $feature->desc }}</p>
                                  </div>
                            </div>
@endforeach
                       </div>
                </div>
         </div>
  </section>
