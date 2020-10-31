<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blog on Laravel</title>
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
  <link rel="stylesheet" href="{{ asset('css/style.css') }}{{ '?t=' }}@php echo microtime(true); @endphp">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Color CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/colors/blue.css') }}" media="screen" />

</head>
<body>

  {{-- Navigation --}}
  <x-navigation></x-navigation>

  {{-- Header --}}
  <x-header></x-header>

  {{-- Content --}}
  <div class="container my-5">


  @yield('content')

  </div>

  {{-- Footer --}}
  <x-footer></x-footer>

</body>
</html>
