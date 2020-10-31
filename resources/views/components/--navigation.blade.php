<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Awesome news</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#topNavbar" aria-controls="topNavbar"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="topNavbar">
      <ul class="navbar-nav mr-auto">
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
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      <a href="{{ route('auth') }}" class="btn btn-outline-light ml-5" type="button">Sign up</a>
    </div>
  </div>
</nav>
