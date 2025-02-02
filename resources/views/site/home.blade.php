@extends('site.layouts.app')
@section('title', __('Home') . '|' . getSetting('site_name_' . app()->getLocale()))

@section('content')
    <x-offer />

    <x-category :categories="$categories" />
    <x-best-seller :products="$products" />
    <x-about-us />
    <x-banner />
    <x-partner :partners="$partners" />
    <x-customer-review />
    <section class="news-banner" style="background-image: url({{ asset('site') }}/images/banner-bg.png);">
        <div class="main-container">
            <div class="news-banner-content">
                <div class="news-banner-header">
                    <h1>اشترك فى النشرة الاخبارية واحصل على 20% خصم</h1>
                    <form id="blogEmail" action="{{ route('site.blog.user') }}" method="post">
                        @csrf
                        <input type="text" placeholder="ادخل بريدك الالكتروني" name="email">
                        <span class="email-errorq error-text text-danger"></span>

                        <button type="submit">ارسال</button>
                    </form>
                </div>
            </div>
            <div class="news-banner-img sound-cat">
                <img src="{{ asset('site') }}/images/news.png" alt="">
                <audio preload="auto" id="soundCat" src="./mixkit-cartoon-kitty-begging-meow-92.wav" loop></audio>
            </div>
        </div>
    </section>


    <x-news :blogs="$blogs" />


    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('#blogEmail').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Clear previous error messages
                    $('.error-text').text('');

                    $.ajax({
                        url: $(this).attr('action'), // Use the form's action URL
                        method: 'POST',
                        data: $(this).serialize(), // Serialize the form data
                        success: function(response) {
                            // Show a success message or redirect the user
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "{{ __('You have successfully subscribed to the newsletter service') }}",
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Optionally, clear the form
                            $('#contactForm')[0].reset();
                        },
                        error: function(xhr) {
                            // Display validation errors
                            if (xhr.status === 422) { // Laravel validation error status
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('.' + key + '-errorq').text(value[
                                    0]); // Display the first error message
                                });
                            } else {
                                // General error message for other issues
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: session('error'),
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
