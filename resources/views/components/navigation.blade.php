    <nav class="navbar navbar-expand-md fixed-top scrolling-navbar nav-bg">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="mdi mdi-menu"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
            @include('includes.menu')
            {{-- Search Box here --}}

                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @include('includes.auth-links')
                </ul>

            </div>
        </div>
        <!-- Mobile Menu Start -->
        <x-mobile-menu></x-mobile-menu>
        <!-- Mobile Menu End -->
    </nav>
