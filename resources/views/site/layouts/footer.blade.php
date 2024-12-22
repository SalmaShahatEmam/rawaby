<footer style="background-image: url('images/footer-img.png')">
    <div class="main-container">
        <div class="footer-head">
            <a href="/"> <img src="{{ asset('site') }}/images/footer-logo.png" alt="" /> </a>

            <h4>
                رواد في تقديم حلول سبك معدني مبتكرة، تلبي احتياجات مختلف القطاعات
                الصناعية، ونسعى باستمرار لتحقيق رضا عملائنا من خلال شراكات قوية
                وبنية تحتية متقدمة. نحن هنا لنقدّم لعملائنا منتجات تفوق توقعاتهم،
                ونهتم بأدق التفاصيل لضمان الجودة العالية في كل مرحلة من مراحل
                التصنيع.
            </h4>
        </div>

        <div class="footer-middel">
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="footer-links">

                        <div class="links-footer-item">
                            <h4>تواصل</h4>
                            <a href="/#contactUs"> تواصل معنا </a>
                            <a href="{{ route('site.jobs') }}"> وظائف </a>
                        </div>

                        <div class="links-footer-item">
                            <h4>روابط أساسية</h4>
                            <a href="/"> الرئيسية </a>
                            <a href="{{ route('site.services') }}"> الخدمات </a>
                            <a href="{{ route('site.products') }}"> المنتجات </a>
                            <a href="{{ route('site.projects') }}"> المشاريع </a>
                            <a href="{{ route('site.sector') }}"> القطاعات المستهدفة </a>
                        </div>

                        <div class="links-footer-item">
                            <h4>معلومات إضافية</h4>
                            <a href="{{ route('site.questions') }}"> الأسئلة الشائعة </a>
                            <a href="{{ route('site.partners') }}"> شركاؤنا </a>
                            <a href="{{ route('site.blogs') }}"> الأخبار </a>
                            <a href="{{ route('site.liberary') }}"> المكتبة المرئية </a>
                        </div>

                        <div class="links-footer-item">
                            <h4>تابعنا عبر</h4>
                            <a href="/"> فيسبوك </a>
                            <a href="/"> لينكد إن </a>
                            <a href="/"> انستجرام </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h2>النشرة الاخبارية</h2>
                    <p class="desc">
                        اشترك في النشرة البريدية لتصلك آخر الأخبار والعروض من شركة
                        السبك المعدني المحدودة
                    </p>

                  <!--   <form action="">
                        <input type="text" placeholder="ادخل بريدك  الالكتروني " />

                        <button type="submit">إرسال</button>
                    </form> -->

                    <form id="blogEmail" action="{{ route('site.blog.user') }}" method="post">
                        @csrf
                        <input type="text" placeholder="{{ __('Enter your email') }}" name="email" />
                        <span class="email-errorq error-text text-danger"></span>
                        <button type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="copy-write">
            © 2024 السبك المعدني المحدودة - جميع الحقوق محفوظة.
        </div>
    </div>
</footer>






<!-- start menu responsive =========== -->
<div class="bg_menu "></div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <!-- <a href="/" class="logo-container">
            <img src="images/logo.png">
        </a> -->
        <div class="element">
            <ul class="main-menu">
                <li class="active-menu"><a href="">الرئيسية</a></li>
                <li class="about-company">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            عن الشركة
                        </button>
                        <ul class="dropdown-menu">


                            <li><a class="dropdown-item" href="{{ route('site.about') }}">من نحن</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.products') }}">منتجاتنا</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.services') }}">خدماتنا</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.projects') }}">مشاريعنا</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.sector') }}">القطاعات المستهدفة </a></li>
                            <li><a class="dropdown-item" href="{{ route('site.liberary') }}">المكتبة المرئية </a></li>
                            <li><a class="dropdown-item" href="{{ route('site.blogs') }}">المدونة</a></li>
                            <li><a class="dropdown-item" href="{{ route('site.partners') }}">شركائنا</a></li>



                        </ul>
                    </div>




                </li>
                <li><a href="{{ route('site.productlines') }}">خطوط الانتاج</a></li>
                <li><a href="/#contactUs">تواصل معنا</a></li>
                <li> <a href="{{  route('site.jobs')}}" >قدم على وظيفة</a> </li>
                <li class="about-company language">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            AR
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">AR</a></li>
                            <li><a class="dropdown-item" href="#">EN</a></li>




                        </ul>
                    </div>




                </li>
            </ul>
        </div>

    </div>




    <div class="remove-mune">
        <span></span>
    </div>




</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="{{ asset('site') }}/js/jquery.js"></script>
<script src="{{ asset('site') }}/js/videos.js"></script>

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

                    $.each(response.result, function(key, element) {
                     //   console.log(element)
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

</body>

</html>
