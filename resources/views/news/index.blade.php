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
              @forelse($news as $id=>$n)
                <x-card :news="$n" :id="$id"/>
                @empty
                  <p>Oops, seems like there's no news in there...</p>
                @endforelse
            </div>

            {{-- LOAD MORE button --}}
              @if($news)
                  @include('includes.load-more-button')
              @endif


          </div>
        </div>
        {{-- blog column --}}

        {{-- sidebar --}}
        <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">
          <x-aside-categories ></x-aside-categories>
        </div>
        {{-- sidebar --}}

      </div>
    </div>
  </section>

@endsection
