@include('site.layouts.header')
    <!-- BEGIN: Content-->

        @include('site.layouts.navbar')

        @yield('content')

        <!-- END: Content-->
        @stack('js')
@include('site.layouts.footer')
