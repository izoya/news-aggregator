<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
  <link rel="stylesheet" type="text/css" property="stylesheet"
        href="/css/app.css">
</head>
<body>

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



<div class="container">
  <div class="">
    <h1 class="pt-5">
      @if($category)
        {{ $category }}
      @else
        All news
      @endif</h1>
  </div>


  <div class="pt-3 card-deck">
    @foreach($news as $n)
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="card bg-light mb-3 mx-0" style="max-width: 20rem;">
          <div class="card-header">{{ $n['slug'] }}</div>
          <div class="card-body">
            <h4 class="card-title">{{ $n['title'] }}</h4>
            <p class="card-text">{{ $n['description'] }}</p>
            <a href="{{ route('news.show', ['slug' => $n['slug']]) }}" class="card-link">Read more...</a>
          </div>
          <div class="card-footer text-muted"></div>
        </div>
      </div>
    @endforeach
  </div>
</div>


</body>
</html>
