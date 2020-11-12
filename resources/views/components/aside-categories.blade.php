<aside class="col-md-12 single-sidebar-widget flickr-widget no-padding wow animated fadeInUp
                 animated" data-wow-delay=".4s" style="visibility: visible;-webkit-animation-delay: .4s;
                 -moz-animation-delay: .4s; animation-delay: .4s;">
  <div class="sidebar-widget-title">
    <h2>Categories</h2>
  </div>
  <div class="pt-2 pb-1">
    <ul class="categories-list">
      @foreach($categories as $id=>$cat)
        <li><a href="{{ route('news.category', ['id' => $id]) }}">{{$cat}}</a></li>
      @endforeach
    </ul>
  </div>
</aside>
