<ul class="navbar-nav mr-auto w-100 justify-content-end" id="nav">
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Site</a></li>
    <li class="nav-item dropdown {{ request()->routeIs('admin.news.index')?'active':'' }}">
        <a class="nav-link dropdown-toggle" id="newsDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
           href="#">News</a>
        {{-- dropdown--}}
        <div class="dropdown-menu" aria-labelledby="newsDropdown">
                <a class="dropdown-item" href="{{ route('admin.news.index') }}">See all</a>
            <a class="dropdown-item" href="{{ route('admin.news.create') }}">Add news</a>
        </div>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.user.index')?'active':'' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">Users</a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.category.index')?'active':'' }}">
        <a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.order.index')?'active':'' }}">
        <a class="nav-link" href="{{ route('admin.order.index') }}">Orders</a>
    </li>
    <li class="nav-item dropdown {{ request()->routeIs('admin.resource.index')?'active':'' }}">
        <a class="nav-link dropdown-toggle" id="rssDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
           href="#">Rss Feeds</a>
        {{-- dropdown--}}
        <div class="dropdown-menu" aria-labelledby="rssDropdown">
            <a class="dropdown-item" href="{{ route('admin.resource.index') }}">See all</a>
            <a class="dropdown-item" href="{{ route('admin.resource.create') }}">Add feed</a>
        </div>
    </li>
    <li class="">
        <a class="nav-link bg-primary text-light ml-lg-5 px-2" style="border-radius: .25rem;"
           href="{{ route('admin.parser') }}">{{ __('elements.button.parser') }}</a>
    </li>
</ul>
