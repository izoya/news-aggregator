<ul class="navbar-nav mr-auto w-100 justify-content-end">
    <li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item {{ request()->routeIs('news')?'active':'' }}">
        <a class="nav-link" href="{{ route('news') }}">News</a>
    </li>
    <li class="nav-item {{ request()->routeIs('category')?'active':'' }}">
        <a class="nav-link" href="{{ route('category') }}">Categories</a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.news.create')?'active':'' }}">
        <a class="nav-link" href="{{ route('admin.news.create') }}">Create news</a>
    </li>
    <li class="nav-item {{ request()->routeIs('order')?'active':'' }}">
        <a class="nav-link" href="{{ route('order') }}">Extract data</a>
    </li>
</ul>
