@extends('layouts.main')

@section('content')
  <section class="Material-blog-post-page section-padding">
    <div class="container">
      <div class="row">

        {{-- article --}}
        <div class="single-blog-page col-md-12 col-lg-8 col-xs-12">
          <article class="single-post wow fadeInUp animated animated" data-wow-delay=".2s"
                   style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s;
                   animation-delay: .2s;">
            <div class="post-image">
              <img src="{{ asset('images/blog/post-image.jpg') }}" class="img-fluid" alt="">
            </div>
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['description'] }}</p>
            <div class="single-post-meta">
              <div class="post-tag">
                <a href="#"><i class="material-icons mdi mdi-bookmark-outline"></i>Photography, Image</a>
              </div>
              <div class="share-post text-dark">
                <a href="#"><i class="mdi mdi-facebook"></i></a>
                <a href="#"><i class="mdi mdi-twitter"></i></a>
                <a href="#"><i class="mdi mdi-google-plus"></i></a>
                <a href="#"><i class="mdi mdi-pinterest"></i></a>
              </div>
            </div>
          </article>
          {{-- comment section here --}}
          {{-- comment-form section here --}}
        </div>
        {{-- article --}}

        {{-- sidebar --}}
        <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">
            <x-aside-categories :categories="$categories"></x-aside-categories>
        </div>
        {{-- sidebar --}}

      </div>
    </div>
  </section>

@endsection
