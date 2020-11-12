<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'News') }}</title>

    <title>Awesome News on Laravel</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Meterial Icon CSS -->
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{ asset('css/material.min.css') }}">
    <!-- Ripples CSS -->
    <link rel="stylesheet" href="{{ asset('css/ripples.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- Slicknav CSS -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}{{ '?t=' }}@php echo microtime(true) @endphp">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}{{ '?t=' }}@php echo microtime(true) @endphp">
    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors/blue.css') }}" media="screen"/>

</head>
<body>

{{-- Navigation --}}
<x-navigation></x-navigation>

{{-- Header --}}
<x-header></x-header>

<main id="app" class="container my-5">

    {{-- Alert --}}
    @include('includes.alert')

    {{-- Content --}}
    @yield('content')

</main>

{{-- Footer --}}
<x-footer></x-footer>
<script src="{{ asset('js/jquery-min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('js/jquery.inview.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/scroll-top.js') }}"></script>

<script src="{{ asset('js/material.min.js') }}"></script>
<script src="{{ asset('js/ripples.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/form-validator.min.js') }}"></script>
<script src="{{ asset('js/contact-form-script.min.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/jquery.vide.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('js')
</body>
</html>
