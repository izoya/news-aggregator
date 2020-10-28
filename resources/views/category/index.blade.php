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
  <h1 class="pt-5">Categories</h1>
</div>


  <div class="list-group pt-3 w-50">
    @foreach($categories as $id => $cat)
    <a href="{{ route('news.cat', ['id' => $id]) }}"
       class="list-group-item list-group-item-action">{{ $cat }}</a>
    @endforeach
  </div>
</div>

</body>
</html>
