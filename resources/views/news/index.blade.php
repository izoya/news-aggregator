@extends('layouts.main')

@section('content')

  <section class="Material-blog-post-page section-padding">
    {{-- Category Title --}}
    <x-title :title="$category"></x-title>

    <div class="container">
      <div class="row">
        {{-- blog column --}}
        <div class=" col-lg-8 col-xs-12 blog-post-column">
          <div class="row">

            <div class="col-md-12 card-deck no-padding">
              @foreach($news as $n)
                <x-card :news="$n"/>
              @endforeach
            </div>

            {{-- LOAD MORE button --}}
            <div class="col-md-12 text-center mt-3 blog-pagination wow animated fadeInUp animated" data-wow-delay=".4s"
                 style="visibility: visible;-webkit-animation-delay: .4s; -moz-animation-delay: .4s; animation-delay: .4s;">
              <a href="javascript:void(0)" class="btn btn-common"><i class="material-icons mdi mdi mdi-autorenew"></i>
                Load More Stories
                <div class="ripple-container"></div>
              </a>
            </div>

          </div>
        </div>
        {{-- blog column --}}

        {{-- sidebar --}}
        <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">
          <x-aside-categories :categories="$categories"></x-aside-categories>
        </div>
        {{-- sidebar --}}

      </div>
    </div>
  </section>

@endsection
