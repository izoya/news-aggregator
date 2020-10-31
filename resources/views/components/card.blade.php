<div class="col-md-6 wow animated fadeInUp animated" data-wow-delay=".2s" style="visibility: visible;
-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
  <article class="single-blog-post">

    <div class="featured-image">
      <a href="#">
        <img src="{{ asset('images/blog/featured' . $news['id'] . '.jpg') }}" alt="">
      </a>
    </div>

    <div class="post-meta">
      <div class="post-date"><span><b>Jan 25 2020</b></span></div>

      <a href="{{ route('news.show', ['slug' => $news['slug']]) }}">
        <h2 class="subtitle">{{ $news['title'] }}</h2>
      </a>
      <p>{{ $news['description'] }}</p>
    </div>

    <div class="meta-tags">
      <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>
      <a class="btn btn-round btn-fab" href="{{ route('news.show', ['slug' => $news['slug']]) }}"><i
          class="material-icons mdi mdi-arrow-right"></i>
        <div class="ripple-container"></div>
      </a>
    </div>
  </article>
</div>


