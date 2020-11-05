<header id="header">
  <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar nav-bg">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="mdi mdi-menu"></span>
          <span class="mdi mdi-menu"></span>
          <span class="mdi mdi-menu"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
      </div>
      <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('news') }}">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="{{ route('admin.news.create') }}">Create news</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="{{ route('order') }}">Extract data</a>
          </li>
        </ul>
        <!-- Search Box here -->

        <!-- Sign up -->
        <a href="{{ route('login') }}" class="btn btn-common ml-5" type="button">Sign up</a>

      </div>
    </div>
    <!-- Mobile Menu Start -->
    <x-mobileMenu></x-mobileMenu>
    <!-- Mobile Menu End -->
  </nav>
</header>
