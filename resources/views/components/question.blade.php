@props(['questions'])

<section>
    <div class="main-container">
        <div class="common-questions-head">
            <h2> {{  __("Common Questions")}}</h2>
            <a href="{{  route('site.questions')}}"> {{  __("View All")}}</a>
        </div>
        <div class="questions-common-conatiner">
            <div class="accordion" id="accordionExample">
                @foreach ($questions as $question)

                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapseTwo".$question->id}}" aria-expanded="false" aria-controls="collapseTwo">
                        {{ $question->question }}
                      </button>
                    </h2>
                    <div id="{{"collapseTwo".$question->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        {{ $question->answer }}
                </div>
                    </div>
                  </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
