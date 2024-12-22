<div>

    @if ($step != 5)

        <main id="app">
            <section class="add-property mr-section">
                <div class="main-container">
                    <div class="title-center">
                        <h2>{{ __('اعلن عن عقارك') }}</h2>
                    </div>

                    <div class="title-property">
                        <div class="sub-property active">
                            <a>
                                <h2>1</h2>
                                <p>{{ __('بياناتك الشخصية') }}</p>
                            </a>
                        </div>
                        {{-- @dd($step) --}}
                        <div class="sub-property {{ $step >= 2 ? 'active' : '' }}">
                            <a>
                                <h2>2</h2>
                                <p>{{ __('وصف العقار') }}</p>
                            </a>
                        </div>
                        <div class="sub-property {{ $step >= 3 ? 'active' : '' }}">
                            <a>
                                <h2>3</h2>
                                <p>{{ __('عنوان العقار') }}</p>
                            </a>
                        </div>
                        <div class="sub-property {{ $step >= 4 ? 'active' : '' }}">
                            <a>
                                <h2>4</h2>
                                <p>{{ __('صور العقار') }}</p>
                            </a>
                        </div>
                    </div>
                    @if ($step == 1)

                        <div class="form-property mt-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="{{ __('الاسم') }}" class="form-control"
                                            wire:model="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="tel" placeholder="{{ __('رقم الجوال') }}" class="form-control"
                                            wire:model="phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="email" placeholder="{{ __('البريد الالكتروني') }}"
                                            class="form-control" wire:model="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="{{ __('العنوان') }}" class="form-control"
                                            wire:model="personal_address">
                                        @error('personal_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" wire:loading.remove
                                            wire:click="firstStepSubmit">{{ __('التالي') }}</button>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" disabled wire:loading wire:target="firstStepSubmit">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            {{ __('جاري التحميل.') }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif ($step == 2)
                        <div class="form-property mt-5">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="input-form arrow-select">
                                        <select class="form-select form-control " wire:model="category_id">
                                            <option value="">{{ __('نوع العقار') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="number" placeholder="{{ __('مساحة العقار') }}"
                                            class="form-control" wire:model="area">

                                        @error('area')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form arrow-select">
                                        <select class="form-select form-control " wire:model="rooms">
                                            <option value="0">{{ __('عدد الغرف') }}</option>
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>

                                        @error('rooms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form arrow-select">
                                        <select class="form-select form-control " wire:model="baths">
                                            <option value="0">{{ __('عدد الحمامات') }}</option>
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>

                                        @error('baths')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form arrow-select">
                                        <select class="form-select form-control " wire:model="finishing">
                                            <option value="">{{ __('نوع التشطيب') }}</option>
                                            <option value="deluxe">{{ __('deluxe') }}</option>
                                            <option value="super_lux">{{ __('super_lux') }}</option>
                                            <option value="lux">{{ __('lux') }}</option>
                                            <option value="medium">{{ __('medium') }}</option>
                                            <option value="simple">{{ __('simple') }}</option>
                                        </select>

                                        @error('finishing')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form arrow-select">
                                        <select class="form-select form-control " wire:model="type">
                                            <option value="">{{ __('فئة العقار') }}</option>
                                            <option value="sale">{{ __('للبيع') }}</option>
                                            <option value="rent">{{ __('للايجار') }}</option>
                                        </select>

                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="{{ __('اسم العقار') }}"
                                            class="form-control" wire:model="title">

                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input type="number" placeholder="{{ __('سعر العقار') }}"
                                            class="form-control" wire:model="price">

                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <textarea placeholder="{{ __('وصف العقار') }}" class="form-control" id="" wire:model="desc"></textarea>
                                        @error('desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" wire:loading.remove
                                            wire:click="secondStepSubmit">{{ __('التالي') }}</button>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" disabled wire:loading wire:target="secondStepSubmit">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            {{ __('جاري التحميل.') }}
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @elseif ($step == 3)
                        <div class="form-property mt-5">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="input-form arrow-select">
                                        <select name="city_id" id="type" class="form-select form-control "
                                            wire:model="city_id">
                                            <option value="">{{ __('اختر المدينة') }}</option>

                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('city_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('city_id') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-form">
                                        <label class="form-label " for="address">{{ __('العنوان') }}</label>
                                        <input type="address" style="margin: 12px 0 0;" wire:model="address"
                                            id="address" class="form-control image" aria-label="Name"
                                            aria-describedby="basic-addon-name" />

                                        <div id="map" style="height: 500px;" wire:ignore></div>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                        @if ($errors->has('lat'))
                                            <span class="text-danger">
                                                <strong>{{__('العنوان علي الخريطة مطلوب') }}</strong>
                                            </span>

                                    @endif
                                    </div>
                                </div>
                                <input type="hidden" id="lat" wire:model="lat">
                                <input type="hidden" id="lng" wire:model="lng">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" wire:loading.remove
                                            wire:click="thirdStepSubmit">{{ __('التالي') }}</button>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button class="ctm-btn" disabled wire:loading wire:target="thirdStepSubmit">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            {{ __('جاري التحميل.') }}
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @elseif ($step == 4)
                        <div class="form-property mt-5">

                            <div class="title-start">
                                <h2>{{ __('اختر صور العقار') }} </h2>
                                <p>
                                    {{ __('يرجى التأكد من تحميل صور عالية الجودة لعقارك، حيث تساعد الصور الواضحة والجذابة في جذب المزيد من المستأجرين المحتملين') }}

                                </p>
                            </div>
                            <div class="image-grid" id="imageGrid">
                                @if ($images)

                                    @foreach ($images as $key => $image)
                                        <div class="image-box">
                                            <img src="{{ $image->temporaryUrl() }}" alt="">
                                            <button class="delete-btn"
                                                wire:click="removePhoto('{{ $key }}')">X</button>
                                        </div>
                                    @endforeach
                                @endif

                                @if (count($images) == 0)
                                    <label for="images">
                                        <img src="{{ asset('site/images/gallery-add.png') }}" alt="">
                                        <div class="">
                                            <input type="file" wire:model="images" multiple id="images"
                                                style="display: none" accept="image/*">
                                        </div>
                                    </label>
                                    {{-- <input type="file" wire:model="images" multiple> --}}
                                @else
                                    <label for="imageUpload">
                                        <img src="{{ asset('site/images/gallery-add.png') }}" alt="">
                                        <div class="">

                                            <input type="file" wire:model="photo" id="imageUpload"
                                                accept="image/*" style="display: none">

                                        </div>
                                    </label>
                                @endif
                            </div>


                            <div class="col-lg-12">
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('images.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="text-center mt-5">
                                    <button class="ctm-btn" wire:loading.remove wire:target="images, photo , submitForm, removePhoto"
                                        wire:click="submitForm">
                                        {{ __('ارسال') }}
                                    </button>
                                </div>

                                <div class="text-center mt-5">
                                    <button class="ctm-btn" disabled wire:loading wire:target="submitForm">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        {{ __('جاري التحميل.') }}
                                    </button>
                                </div>
                                <div class="text-center mt-5">
                                    <button class="ctm-btn" disabled wire:loading wire:target="images,photo">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        {{ __('جاري رفع الصور') }}
                                    </button>
                                </div>
                                <div class="text-center mt-5">
                                    <button class="ctm-btn" disabled wire:loading wire:target="removePhoto">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        {{ __('جاري حذف الصوره') }}
                                    </button>
                                </div>



                            </div>
                    @endif





                </div>
            </section>

        </main>
    @endif




    @if ($step == 5)
        <main id="app">

            <section class="contactus-page mr-section">
                <div class="info-contactus-page">
                    <div class="main-container text-center">
                        <img src="{{ asset('site/images/submit.png') }}" alt="">
                        <h2 class="fw-bold">{{ __('شكرا لك لقد تم ارسال الاعلان بنجاح') }}</h2>
                        <p>{{ __('نقوم الان بمراجعة الاعلان وسنقوم بالتواصل معك فى أقرب وقت') }}</p>
                        <a href="{{ route('site.home') }}" class="ctm-btn">{{ __('العودة للرئيسية') }}</a>

                    </div>
                </div>

            </section>

        </main>
    @endif




</div>


