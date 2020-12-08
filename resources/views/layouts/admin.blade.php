<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .admin-login-text {
            color:#f8f9fa!important
        }
    </style>
</head>
<body>
    <div id="app" style="min-height: 90vh;">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin •</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- Menu --}}
                        @include('admin.includes.menu')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @include('includes.auth-links')
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container my-5">

        {{-- Alert --}}
        @include('includes.alert')

        {{-- Content --}}
        @yield('content')

        </main>

    </div>
    <footer class="py-3 bg-dark text-light text-center" style="height: 10vh;" >
        <p>Developed by <a href="mailto:ivanova.zoya.r@gmail.com">Ivanova Zoya</a>, 2020.</p>
    </footer>
    <script src="{{ asset('js/jquery-min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/form-validator.min.js') }}"></script>
    <script src="{{ asset('js/form-handler.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
@stack('js')
</body>
</html>
