<div>


    {{-- retreats --}}
    <section class="retreats__container" >
        <div class="main-container">
            <div class="retreat__search">
                <form action="">
                    <div class="input search-header">
                        <img src="{{ asset('site/images/basil_location-solid.png') }}" alt="" class="location" />
                        <input type="text" placeholder="{{ __('ادخل المدينة أو الحي') }}" />
                        <button class="icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
                <div class="search__filter" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
                    <img src="{{ asset('site/images/mage_filter.png') }}" alt="" />
                    <p>{{ __('عوامل التصفية') }}</p>
                </div>
            </div>
            <div class="retreats__count">
                <p>{{ __('مسكنًا فى المنطقة المحددة فى البحث') . $retreats->count() }}</p>
                <div class="filter__select">
                    <select wire:model.live='sort'>
                        <option value="all">{{ __('الكل') }}</option>
                        <option value="latest">{{ __('الاحدث') }}</option>

                        <option value="high_price">{{ __('الاعلي سعرا') }}</option>
                        <option value="low_price">{{ __('الاقل سعرا') }}</option>
                    </select>
                    <div class="icon"><i class="fa-solid fa-angle-down"></i></div>
                </div>
            </div>
            <div class="retreats__cards__container">
                @forelse ( $retreats as  $estate)
                    <a wire:key="{{ $estate->id }} href="{{ route('site.retreat.show', $estate->id) }}"
                        class="product">
                        <div class="img-product">
                            <img src="{{ $estate->images->first()->image_path }}" alt="" />
                        </div>
                        <div class="text-product">
                            <div class="price-product">
                                <h2>{{ $estate->price }} {{ __('ريال سعودي / الشهر') }}</h2>
                                <div class="rate-product">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($estate->reviews->avg('rate')))
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                    {{-- <i class="bi bi-star-fill"></i> --}}
                                    <span>{{ $estate->reviews->avg('rate') }} </span>
                                    <span>({{ $estate->reviews->count() }} {{ __('تقييم') }})</span>

                                </div>
                            </div>

                            <p>
                                {{ $estate->desc }}
                            </p>
                            <h3 class="address-product">
                                <img src="{{ asset('site/images/map.png') }}" alt="" />
                                {{ $estate->address }}
                            </h3>
                            <div class="num-details-product">
                                <div class="sub-num-details-product">
                                    <img src="{{ asset('site/images/pi-1.png') }}" alt="" />
                                    <h4>{{ $estate->area . ' ' . __('متر²') }} </h4>
                                </div>
                                <div class="sub-num-details-product">
                                    <img src="{{ asset('site/images/pi-2.png') }}" alt="" />
                                    <h4>
                                        {{ $estate->rooms }}
                                    </h4>
                                </div>
                                <div class="sub-num-details-product">
                                    <img src="{{ asset('site/images/pi-3.png') }}" alt="" />
                                    <h4>
                                        {{ $estate->baths }}
                                    </h4>
                                </div>
                            </div>
                            <div class="btn-product">
                                <div class="ctm-btn2 w-100 to-chat ctm-btn">
                                    <i class="bi bi-chat-square-text"></i>
                                    {{ __('تواصل مع المعلن') }}
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="not_found">
                        <p>{{ __('لا توجد بيانات') }}</p>
                    </div>

                @endforelse

            </div>
            {{ $retreats->links() }}
        </div>
    </section>
    {{-- end retreats --}}




    {{-- pagination --}}
    {{-- <section class="make__pagination">
        <a href="" class="icon"> <i class="fa-solid fa-chevron-right"></i> </a>
        <div class="nums">
            <a href="" class="num"> 1 </a>
            <a href="" class="num"> 2 </a>
            <a href="" class="num"> 3 </a>
            <a href="" class="num"> 4 </a>
        </div>
        <a href="" class="icon"> <i class="fa-solid fa-chevron-left"></i> </a>
    </section> --}}
    {{-- end pagination --}}



    {{-- filter --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"

    >
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <h3>{{ __('عوامل تصفية') }}</h3>
        </div>
        <div class="offcanvas-body">
            <form class="left-modal-form" action="">
                <div class="retreat__space">
                    <div class="retreat__space__title">
                        <p>{{ __('المنطقة') }}</p>
                    </div>
                    <input type="text" placeholder="{{ __('المدينة') }}" wire:model="city" />
                </div>
                <div class="retreat__kind">
                    <div class="retreat__space__title">
                        <p>{{ __('نوع العقار') }}</p>
                    </div>
                    <div class="retreat__kind__inputs">

                        @foreach ($categories as $category)
                            <div wire:key="{{ $category->id }}" class="input">
                                <input type="checkbox" id="{{ $category->id }}" value="{{ $category->id }}"
                                    wire:model="category_ids" />
                                <label for="{{ $category->id }}">
                                    <img src="{{ $category->icon_path }}" alt="" />
                                    <p>{{ $category->name }}</p>
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="price__slider">
                    <div class="retreat__space__title">
                        <p>
                            {{ __(' السعر ب (الريال السعودي)') }}

                        </p>
                    </div>
                    <div class="range__vlue">
                        <input class="data__range"  type="text" value="200"  wire:model='min_price' />
                        <input class="data__range"  type="text" value="1000" wire:model='max_price'/>
                        {{-- {{ $min_price }}
                        {{ $max_price }} --}}
                        {{-- <p data-range="200" class="data__range" wire:model.change="min_price">200 ريال</p>
                        <p data-range="1000" class="data__range" wire:model.live="max_price">1000 ريال</p> --}}
                    </div>

                    <div id="main_slider"></div>
                    <div class="range__vlue__text">
                        <p class="data__range">{{ __('اقل') }}</p>
                        <p class="data__range">{{ __('اعلى') }}</p>
                    </div>
                </div>

                <div class="price__slider">
                    <div class="retreat__space__title">
                        <p>{{ __('المساحة') }}</p>
                    </div>
                    <div class="range__vlue">
                        {{-- <p data-range="200" class="data__range">200 م</p>
                        <p data-range="1000" class="data__range">1000 م</p> --}}
                        <input class="data__range" disabled type="text" value="200" />
                        <input class="data__range" disabled type="text" value="1000" />
                    </div>
                    <div id="main_slider_two"></div>
                    <div class="range__vlue__text">
                        <p class="data__range">{{ __('اقل') }}</p>
                        <p class="data__range">{{ __('اعلى') }}</p>
                    </div>
                </div>
                <div class="rooms">
                    <div class="retreat__space__title">
                        <p>{{ __('الغرف والحمامات') }}</p>
                    </div>
                    <h2>{{ __('عدد الغرف') }}</h2>
                    <div class="inputs__container">
                        <div class="input">
                            <input id="room_notselected" type="radio" value="0"  wire:model="rooms"  />
                            <label for="room_notselected"> {{ __('بدون تحديد') }}</label>
                        </div>

                        @for ($i = 1; $i <= 7; $i++)
                            <div class="input" wire:key="{{ $i }}">
                                <input id="room-{{ $i }}" type="radio" value="{{ $i }}" wire:model="rooms" />

                                <label for="room-{{ $i }}"> {{ $i }} {{ $i == 7 ? '+' : '' }} </label>
                            </div>
                        @endfor


                    </div>
                    <h2>{{ __('عدد الحمامات') }}</h2>
                    <div class="inputs__container">
                        <div class="input">
                            <input id="0"  type="radio" value="0" wire:model="baths" />
                            <label for="0"> {{ __('بدون تحديد') }} </label>
                        </div>
                        @for ($i = 1; $i <= 7; $i++)

                        <div class="input" wire:key="{{ $i }}">
                            <input id="bath-{{ $i }}" type="radio" value="{{ $i }}" wire:model="baths" />
                            <label for="bath-{{ $i }}"> {{ $i }} {{ $i == 7 ? '+': '' }} </label>
                        </div>

                    @endfor
                    </div>
                </div>
       

                <div class="frm__btns">
                    <button class="" type="submit" wire:click.prevent="filter">تطبيق</button>
                    <button class="custom__hov" type="submit" wire:click.prevent="resetFilter">{{ __('مسح الكل') }}</button>
                </div>
            </form>
        </div>
    </div>
    {{-- end filter --}}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        // Listen for the event emitted from Livewire
        window.livewire.on('componentRendered', function () {
            const rangeValues = document.querySelectorAll(".range__vlue input");

            const startValueOne = Number(rangeValues[0].value);
            const endValueOne = Number(rangeValues[1].value);
            const startValueTwo = Number(rangeValues[2].value);
            const endValueTwo = Number(rangeValues[3].value);

            var slider = document.getElementById("main_slider");
            var sliderTwo = document.getElementById("main_slider_two");

            noUiSlider.create(slider, {
                start: [startValueOne, endValueOne],
                connect: true,
                range: {
                    min: startValueOne,
                    max: endValueOne,
                },
                direction: "rtl",
            });

            slider.noUiSlider.on("update", function(values) {
                rangeValues[0].value = `${Math.floor(values[0])} ريال`;
                rangeValues[1].value = `${Math.floor(values[1])} ريال`;
            });

            noUiSlider.create(sliderTwo, {
                start: [startValueTwo, endValueTwo],
                connect: true,
                range: {
                    min: startValueTwo,
                    max: endValueTwo,
                },
                direction: "rtl",
            });

            sliderTwo.noUiSlider.on("update", function(values) {
                rangeValues[2].value = `${Math.floor(values[0])} م`;
                rangeValues[3].value = `${Math.floor(values[1])} م`;
            });
        });
    });
</script>
