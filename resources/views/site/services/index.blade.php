@extends('site.layouts.app')
@section('title', __('خدماتنا').'|'.getSetting('site_name_'.app()->getLocale()))




@section('content')
<x-services  :services="$services"/>
{{-- <x-request-service :services="$services"/> --}}

@endsection
@push('js')
    <!-- Include jQuery and List.js -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('ready');

            function initializeListJS() {
                var options = {
                    valueNames: ['text-head'],
                    page: 6,
                    pagination: true
                };
                var addressList = new List('order_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
{{--
<script>
$(document).ready(function() {
    $('#service_request').on('submit', function(event) {
     //   alert("Fre");
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
                    title: "{{ __('services request sended successfully') }}",
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
                        $('.' + key + '-error').text(value[0]); // Display the first error message
                    });
                } else {
                    // General error message for other issues
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "حدث خطأ. حاول مرة أخرى.",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    });
});
</script> --}}
@endpush
