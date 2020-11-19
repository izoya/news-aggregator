@extends('layouts.admin')

@section('content')
    <section class="row">
        <div class="col"><h1 class="h1 pb-4">All news</h1></div>


        <div class="row">
            {{-- blog column --}}
            <div class=" col-lg-9 col-xs-12">
                <div class="row">

                    <div class="col no-padding">
                        @forelse($news as $n)
                            @include('admin.includes.news-card')
                        @empty
                            <p>{{ __('pages.news.emptyNewsList') }}</p>
                        @endforelse
                    </div>

                </div>
            </div>
            {{-- blog column --}}

            {{-- sidebar --}}
            <div class="col-md-12 col-3 mb-5">

                <a href="{{ route('admin.news.create' ) }}" class="btn btn-primary w-100">
                    {{ __('elements.button.addNews') }}</a>
            </div>
            {{-- sidebar --}}

        </div>

        {{-- Pages --}}
        <div class="row">
            {{ $news->links() }}
        </div>
    </section>
@endsection
