@extends('site.layouts.app')
@section('title', __('خدماتنا'))

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
                                <div class="landing__header"> {{ __('طلب الخدمة') }} </div>
                                <div class="landing__links">
                                    {{-- {{ $service->name }}/ --}}
                                    <a href="{{ route('site.services') }}"> {{ __('خدماتنا') }} </a> /
                                    <a href="/"> {{ __('الرئيسية') }} </a>
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

    <section class="form__order">
        <div class="main-container">
            <form action="{{ route('site.services.order.request') }}" method="POST" id="services_order">
                <input type="hidden" name="service_name_ar" value="{{ $service->name_ar }}">
                <input type="hidden" name="service_name_en" value="{{ $service->name_en }}">
                @csrf
                <h3> {{ __('نموذج طلب الخدمة') }} </h3>
                <div class="input-container">
                    <div class="input">
                        <input type="text" placeholder="{{ __('الاسم') }}" name="name" id="name">
                        <div class="img"> <img src="{{ asset('site/images/user.png') }}" alt=""> </div>
                    </div>
                    <div class="input">
                        <input type="text" name="email" placeholder="{{ __('البريد الإلكتروني') }}" id="email">
                        <div class="img"> <img src="{{ asset('site/images/mail-form.png') }}" alt=""> </div>
                    </div>
                </div>
                <div class="input-container">
                    <div class="input">
                        <input type="text" name="phone" placeholder="{{ __('رقم الجوال') }}" id="phone">
                        <div class="img"> <img src="{{ asset('site/images/phone.png') }}" alt=""> </div>
                    </div>
                    <div class="input">
                        <input type="text" name="title_message" placeholder="{{ __('عنوان الرسالة') }}"
                            id="title_message">
                        <div class="img"> <img src="{{ asset('site/images/message.png') }}" alt=""> </div>
                    </div>
                </div>
                <div class="input">
                    <textarea name="message" placeholder="{{ __('الاستفسارات') }}" id="message"></textarea>
                    <div class="img"> <img src="{{ asset('site/images/message-square-lines.png') }}" alt="">
                    </div>
                </div>
                <div class="input-container">
                    <div class="input bg-chiper"
                        style="background-image: url('{{ asset('site/images/bg-chiper.png') }}');">
                        <input type="text" name="code_virfy" readonly value="3207" id="code_virfy"
                            oncopy="return false;">
                    </div>
                    {{-- <div class="input bg-chiper"
                        style="background-image: url('{{ asset('site/images/bg-chiper.png') }}');">

                        <input type="text" name="code_virfy" disabled value="3207" id="code_virfy">
                    </div> --}}
                    <div class="input">
                        <input type="text" name="code" placeholder="{{ __('كود التحقق') }}" id="code">
                        <div class="img"><img src="{{ asset('site/images/verify.png') }}" alt=""></div>
                    </div>
                </div>
                <div class="refresh_btn" id="new_code">
                    <div class="img"> <img src="{{ asset('site/images/refresh.png') }}" alt=""> </div>
                    <p> {{ __('كود جديد ') }}</p>
                </div>

                <input class="ctm-btn-services" type="submit" value="{{ __('ارسال') }}">
            </form>
        </div>
    </section>

@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var codeInput = document.getElementById('code_virfy');
            codeInput.addEventListener('copy', function(e) {
                e.preventDefault();

            });
        });
        $(document).ready(function() {
            var code = Math.floor(1000 + Math.random() * 9000);
            $('#code_virfy').val(code);
            $.validator.addMethod("noSpecialChars", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9\u0600-\u06FF ]*$/.test(value);
            }, window.noSpecialChars);
            $.validator.addMethod("domain", function(value, element) {
                // Allow emails from gmail.com, yahoo.com, hotmail.com, and outlook.com
                return this.optional(element) ||
                    /^[\w.-]+@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com)$/.test(value);
            }, window.emailmessage);

            $.validator.addMethod("phone_type", function(value, element) {
                return this.optional(element) || /^[0-9+]+$/.test(value);
            }, window.phoneMessage);
            $.validator.addMethod('string', function(value, element) {
                return this.optional(element) || /^[\u0600-\u06FFa-zA-Z\s]+$/i.test(value);
            }, window.stringMessage);



            $.validator.addMethod("fullname", function(value, element) {
                var words = value.split(' ');
                return this.optional(element) || /^[\u0600-\u06FFa-zA-Z-' ]+$/.test(value) && words
                    .length >= 4;
            }, window.fullname);

            $("#services_order").validate({


                rules: {
                    // Define validation rules for your form fields here
                    name: {
                        required: true,
                        minlength: 2,
                        noSpecialChars: true,
                        string: true
                    },

                    email: {
                        required: true,
                        minlength: 3,
                        domain: true
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                    },
                    title_message: {
                        required: true,
                        minlength: 3,

                    },
                    message: {
                        required: true,
                        minlength: 3,

                    },

                    code_virfy: {
                        required: true,
                    },
                    code: {
                        required: true,
                        equalTo: "#code_virfy"
                    },


                    // Add more fields as needed
                },

                messages: {

                    phone: {
                        minlength: window.phoneMinLengthMessage,
                        maxlength: window.phoneMaxLengthMessage,
                    },
                    code: {
                        equalTo: "{{ __('الرجاء ادخال نفس الكود الموجود في الصوره') }}"
                    }



                },



                errorElement: "span",
                errorLabelContainer: ".errorTxt",


                submitHandler: function(form) {
                    $('.ctm-btn-services').prop('disabled', true);
                    // Hide the button
                    $('.ctm-btn-services').hide();


                    // Add a spinner
                    $('.ctm-btn-services').parent().append(
                        `<div class="spinner-border"  style="width: 3rem;height: 3rem;margin-right: 50%;"   role="status">
                        <span class="sr-only">Loading...</span>
                        </div>
                        `
                    );


                    var formData = new FormData(form);
                    let url = form.action;
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {

                            form.reset();
                            Swal.fire({
                                icon: 'success',
                                title: `<h5> ${data.success}</h5> `,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('.ctm-btn-services').prop('disabled', false);


                            // Show the button
                            $('.ctm-btn-services').show();

                            // Remove the spinner
                            $('.ctm-btn-services').next('.spinner-border').remove();

                        },
                        error: function(data) {
                            $('.ctm-btn-services').prop('disabled', false);

                            // Show the button
                            $('.ctm-btn-services').show();

                            // Remove the spinner
                            $('.ctm-btn-services').next('.spinner-border').remove();
                            $('.error-message').text('');
                            var errors = data.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                var errorMessage = messages.join(', ');
                                $('#' + field + '_error').text(
                                    errorMessage);
                            });
                        },
                    });

                },
            });


        });


        $(document).on('click', '#new_code', function() {
            var code = Math.floor(1000 + Math.random() * 9000);
            $('#code_virfy').val(code);
        });
    </script>
@endpush
