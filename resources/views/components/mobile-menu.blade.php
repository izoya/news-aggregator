<ul class="wpb-mobile-menu">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('news') }}">News</a></li>
    <li><a href="{{ route('category') }}">Categories</a></li>
    <li><a href="{{ route('admin.news.create') }}">Create news</a></li>
    <li><a href="{{ route('order') }}">Extract data</a></li>
    {{--Authentication Links--}}
    @include('includes.auth-links')
</ul>

