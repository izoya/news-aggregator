<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'News') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}">
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
<script src="{{ asset('js/script.js') }}"></script>
@stack('js')
</body>
</html>
