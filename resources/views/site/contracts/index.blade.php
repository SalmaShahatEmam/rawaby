@extends('site.layouts.app')
@section('title', __('منصة العقود'))

@include('site.layouts.seo')

@section('background-image')
    style="background-image: url({{ asset('site/images/landing-bg.png') }})"
@endsection
@section('header-hero')
    <div class="owl-carousel">

        <div class="item">
            <div class="landing custom__landing">
                <div class="main-container">
                    <div class="row">
                        <div class="col-lg-7 col-md-5 col-5">
                            <div class="landing__text">
                                <div class="landing__header">{{ __('منصة العقود') }}</div>
                                <div class="landing__links">
                                    {{ __('العقود') }}<a href="/"> / {{ __('الرئيسية') }} </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 mask-img-intro col-7">
                            <div class="landing-img mask1">
                                <img src="{{ asset('site/images/image.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <section class="contracts__section">
        <form action="" method="POST">
            @csrf
            <div class="change__user__img">
                <div class="img-user"> <img id="imagePreview" src="{{ asset('site/images/user-img.png') }}" alt="">
                </div>
                <div class="pen-img"> <img src="{{ asset('site/images/pen.png') }}" alt=""> </div>
                <input id="imageInput" type="file" name="image">
                <label for="imageInput"> user </label>
            </div>
            <div class="input">
                <input type="email" placeholder="{{ __('البريد الالكتروني') }}" name="email">
                <div class="img"> <img src="{{ asset('site/images/mail-form.png') }}" alt=""> </div>
            </div>
            <div class="input">
                <input type="password" placeholder="{{ __('كلمة المرور') }}" name="password">
                <div class="img show_password"> <img src="{{ asset('site/images/eye-closed.png') }}" alt=""> </div>
            </div>
            <input type="submit" value="{{ __('تسجيل الدخول') }}">
        </form>
    </section>
@endsection
@push('js')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });

        document.querySelector('.show_password').addEventListener('click', function() {
            const input = document.querySelector('input[name="password"]');
            const img = document.querySelector('.show_password img');

            if (input.type === 'password') {
                input.type = 'text';
                img.src = '{{ asset('site/images/open.png') }}';
            } else {
                input.type = 'password';
                img.src = '{{ asset('site/images/eye-closed.png') }}';
            }
        });
    </script>
@endpush
