<aside class="col-md-12 single-sidebar-widget no-padding wow animated fadeInUp"
       data-wow-delay=".4s" style="visibility: visible;-webkit-animation-delay: .4s;
                 -moz-animation-delay: .4s; animation-delay: .4s;">
  <div class="sidebar-widget-title">
    <h2>{{ __('components.asideCategoryTitle') }}</h2>
  </div>
  <div class="pt-2 pb-1">
    <ul class="categories-list">
      @foreach($categories as $cat)
        <li>
          <a href="{{ route('category.show',  ['category' => $cat]) }}">{{$cat->title}}</a>
            <span class="badge badge-warning">{{ $cat->news_count }}</span>
        </li>
      @endforeach
    </ul>
  </div>
</aside>
