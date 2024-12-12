<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}">
    <meta name="description"
        content="Providing service excellence in project management and professional business support to help you succeed.">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- reey font -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.cs')}}s">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.cs')}}s">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/hiredots-icons/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.theme.default.min.css')}}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/hiredots.css') }}">
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('components.top-header')

        @include('components.header')

        {{ $slot }}

        @include('components.footer')

    </div><!-- /.page-wrapper -->

    @include('components.toggle-mobile')

    @include('components.scroll-to-top')

    <script src="{{ asset('assets/vendors/jquery/jquery-3.7.0.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js')}}"></script>
    <script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js')}}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-circleType/jquery.circleType.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery-lettering/jquery.lettering.min.js')}}"></script>
    <!-- template js -->
    <script src="{{ asset('assets/js/hiredots.js') }}"></script>
</body>

</html>
