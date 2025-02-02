@props(['questions'])
<section class="common-questions" style="background-image: url('{{ asset('site') }}/images/questions-bg.png');" >
    <div class="main-container">
      <div class="question-txt-container">
            <div class="txt-head-question"> الأسئلة الشائعة </div>
            <p> نعتز بثقة عملائنا ونحرص دائماً على تقديم أفضل الخدمات والمنتجات لتلبية احتياجاتهم </p>
      </div>
        <div class="row">
             <div class="col-md-6">
                    <div class="questions-container">
                      <div class="accordion" id="accordionExample">
                        @foreach($questions as $question)
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  {{ $question->question }}
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                            {{ $question->answer }}               </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                    </div>
             </div>

             <div class="col-md-6">
                <div class="img-dogs-container">
                   <div class="img"> <img src="{{ asset('site') }}/images/dogs1.png" alt=""> </div>
                   <div class="img"> <img src="{{ asset('site') }}/images/dogs2.png" alt=""> </div>
                   <div class="img"> <img src="{{ asset('site') }}/images/dogs3.png" alt=""> </div>
                   <div class="img"> <img src="{{ asset('site') }}/images/dogs4.png" alt=""> </div>
                   <div class="img"> <img src="{{ asset('site') }}/images/dogs.png" alt=""> </div>
                   <div class="dog-haddi"> <img src="{{ asset('site') }}/images/haddi 1.png" alt=""> </div>
                </div>
             </div>
        </div>
    </div>
 </section>
