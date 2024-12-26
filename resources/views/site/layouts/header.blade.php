<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <!-- Bootstrap -->
         <link rel="stylesheet" href="{{ asset('site') }}/css/bootstrap.css">
         <link rel="icon" type="image/png" href="{{ asset('storage')."/".getSetting('favicon') }}" />

         <!-- Font Awesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">

         <!-- Animate CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />

         <!-- AOS CSS -->
         <link rel="stylesheet" href="{{ asset('site') }}/css/aos.css" />

         <link rel="stylesheet" href="{{ asset('site') }}/css/swiper.css" />
         <link rel="stylesheet" href="{{ asset('site') }}/css/videos.css" />


         <!-- owl -->
         <link href="
         https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css
         " rel="stylesheet">


        @if(app()->getLocale() == 'en')
            <link rel="stylesheet" href="{{ asset('site') }}/css/en.css">
        @endif




@include('site.layouts.style')
  </head>
  <body>
