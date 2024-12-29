<footer style="background-image: url('{{ asset('site') }}/images/footer-img.png')">
    <div class="main-container">
        <div class="footer-head">
            <a href="/"> <img src="{{ asset('site') }}/images/footer-logo.png" alt="" /> </a>

            <h4>
                {{ __("Innovative metal casting solutions catering to the needs of various industrial sectors. We continuously strive to achieve customer satisfaction through strong partnerships and advanced infrastructure. We are here to offer products that exceed our customers' expectations, paying attention to the smallest details to ensure high quality at every stage of manufacturing.") }}
            </h4>
        </div>

        <div class="footer-middel">
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="footer-links">

                        <div class="links-footer-item">
                            <h4>{{ __('Contact') }}</h4>
                            <a href="/#contactUs"> {{ __('Contact Us') }} </a>
                            <a href="{{ route('site.jobs') }}"> {{ __('Jobs') }} </a>
                        </div>

                        <div class="links-footer-item">
                            <h4>{{ __('Key Links') }}</h4>
                            <a href="/"> {{ __('Home') }} </a>
                            <a href="{{ route('site.services') }}"> {{ __('Services') }} </a>
                            <a href="{{ route('site.products') }}"> {{ __('Products') }} </a>
                            <a href="{{ route('site.projects') }}"> {{ __('Projects') }} </a>
                            <a href="{{ route('site.sector') }}"> {{ __('Target Sectors') }} </a>
                        </div>

                        <div class="links-footer-item">
                            <h4>{{ __('Additional Info') }}</h4>
                            <a href="{{ route('site.questions') }}"> {{ __('FAQ') }} </a>
                            <a href="{{ route('site.partners') }}"> {{ __('Our Partners') }} </a>
                            <a href="{{ route('site.blogs') }}"> {{ __('News') }} </a>
                            <a href="{{ route('site.liberary') }}"> {{ __('Media Library') }} </a>
                        </div>


                        <div class="links-footer-item">
                            <h4>{{ __('Follow Us') }}</h4>
                            <a href="{{ getSetting('facebook') }}"> {{ __('Facebook') }} </a>
                            <a href="{{ getSetting('linkedin') }}"> {{ __('LinkedIn') }} </a>
                            <a href="{{ getSetting('instagram') }}"> {{ __('Instagram') }} </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h2>{{ __('Newsletter') }}</h2>
                    <p class="desc">
                        {{ __('Subscribe to the newsletter to receive the latest news and offers from Metal Casting Limited.') }}
                    </p>

                    <form id="blogEmail" action="{{ route('site.blog.user') }}" method="post">
                        @csrf
                        <div>

                            <input type="text" placeholder="{{ __('Enter your email') }}" name="email" />
                            <span class="email-errorq error-text text-danger"></span>
                        </div>
                        <button type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="copy-write">
            <h4>© 2024 {{ __('Metal Casting Limited') }} - {{ __('All rights reserved.') }}</h4>
            <h4>{{ __('Made with love') }} <span><i class="fa fa-heart"></i></span> {{ __('at Jadara Laboratories') }}</h4>
        </div>
    </div>
</footer>

<!-- start menu responsive =========== -->
<div class="bg_menu "></div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <div class="element">
            <ul class="main-menu">
                <li class="menu-logo">
                    <a href="/" >
                        <img src="{{ asset('site') }}/images/logo 1.svg">
                    </a>
                </li>
                <li class="active-menu"><a href="/" @if( request()->is('/')) class="active" @endif >{{ __('Home') }}</a></li>
                <li class="about-company">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('About Us') }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  href="{{ route('site.about') }}"> {{ __('Who We Are') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.products') }}"> {{ __('Our Products') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.services') }}"> {{ __('Our Services') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.projects') }}"> {{ __('Our Projects') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.sector') }}"> {{ __('Target Sectors') }} </a></li>
                            <li><a class="dropdown-item" href="{{ route('site.liberary') }}"> {{ __('Media Library') }} </a></li>
                            <li><a class="dropdown-item" href="{{ route('site.blogs') }}"> {{ __('Blog') }} </a></li>
                            <li><a class="dropdown-item" href="{{ route('site.partners') }}"> {{ __('Our Partners') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ route('site.productlines') }}" @if( request()->is('productlines')) class="active" @endif>{{ __('Production Lines') }}</a></li>
                <li><a href="/#contactUs">{{ __('Contact Us') }}</a></li>
                <li> <a href="{{  route('site.jobs')}}" @if( request()->is('jobs')) class="active" @endif>{{ __('Apply for a Job') }}</a> </li>
                <li class="about-company language">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            AR
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"  @if(app()->getLocale() != "en") class=" dropdown-item active-lang" @endif href="/toggle-language/ar">AR</a></li>
                            <li><a class="dropdown-item"  @if(app()->getLocale() != "en") class="dropdown-item active-lang" @endif href="/toggle-language/en">EN</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>
</main>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&loading=async&callback=initAutocomplete"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="{{ asset('site') }}/js/jquery.js"></script>
<script src="{{ asset('site') }}/js/videos.js"></script>

<script>
  AOS.init(
    {
      once: true,
    }
  );
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('site') }}/js/custome.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- owl -->

<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
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
                        title: "{{ __('message sended successfully') }}",
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
                            $('.' + key + '-error').text(value[
                            0]); // Display the first error message
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

        $("#requestType").on('change',function(event){

            const selected_value = $(this).val();
            const lang = "{{ app()->getLocale() }}";
            $.ajax({
                url: '{{ route("site.request.type") }}', // Use the form's action URL
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "type" : selected_value
                },
                success: function(response) {
                 //   console.log(response.result)
                    $('#service-offers').empty();
                    $('#service-offers').append(

                        `<option value="">اختر</option>`
);
                    $.each(response.result, function(key, element) {
                            $('#service-offers').append(

                                `<option value="${element.id}">${lang == "ar" ? element.name_ar : element.name_en }</option>`
                            );
                        });


                },
                error: function(xhr) {

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('.' + key + '-error').text(value[
                            0]);
                        });
                    }
                }
            });
        })

        $('#requestService').on('submit', function(event) {
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
                        title: "{{ __('Application sended successfully') }}",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Optionally, clear the form
                    $('#requestService')[0].reset();
                },
                error: function(xhr) {
                    // Display validation errors
                    if (xhr.status === 422) { // Laravel validation error status
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('.' + key + '-error').text(value[
                            0]); // Display the first error message
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
                            title:"{{ __('You have successfully subscribed to the newsletter service') }}",
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
                                $('.' + key + '-errorq').text(value[0]); // Display the first error message
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

        $('#applyJobs').on('submit', function(event) {
            event.preventDefault();

            $('.error-text').text('');

            let formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                   // alert("You clicked the button!");

                     Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "{{ __('application sended successfully') }}",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#applyJobs')[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('.' + key + '-error').text(value[
                            0]);
                        });
                    } else {
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
</script>
<script>
    function initAutocomplete() {
      let lat = parseFloat($("input[name='lat']").val());
      let lng = parseFloat($("input[name='lng']").val());
      let address = document.getElementById("map").getAttribute("data-address");

      const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: lat, lng: lng },
          zoom: 12,
          mapTypeId: "roadmap",
      });

      let markers = [];

      // Assuming you have a valid place object with name and geometry properties
      let place = {
          name: address,
          geometry: {
              location: { lat: lat, lng: lng }
          }
      };

      let marker = new google.maps.Marker({
          map: map,
          title: place.name,
          position: place.geometry.location,
      });

      markers.push(marker);
  }
</script>

</body>

</html>
