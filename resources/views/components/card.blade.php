@php ($link = ($news->link) ? $news->link :  route('news.show', ['slug' => $news->slug]))

<div class="col-md-6 wow animated fadeInUp animated" data-wow-delay=".2s" style="visibility: visible;
-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
  <article class="single-blog-post">

    <div class="featured-image">
        <img src="@if(Str::contains($news->image, 'http')) {{ $news->image }}
          @else {{ asset('images/news/' . $news->image) }}
          @endif" alt="">
    </div>

    <div class="post-meta">
      <div class="post-date"><span><b>{{ $news->created_at->format('M d Y') }}</b></span></div>

      <a href="{{ $link }}">
        <h2 class="subtitle">{{ $news->title }}</h2>
      </a>
      <p>{{ $news->description }}</p>
    </div>

    <div class="meta-tags">
      <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>
      <a class="btn btn-round btn-fab" href="{{ $link }}"><i
          class="material-icons mdi mdi-arrow-right"></i>
        <div class="ripple-container"></div>
      </a>
    </div>
  </article>
</div>


