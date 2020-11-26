@extends('layouts.admin')

@section('content')
<section class="row">
    <div class="col">
        {{-- Title --}}
        <div class="row">
            <div class="col"><h1 class="h1 pb-4">All news</h1></div>
        </div>

        <div class="row">
            {{-- sidebar --}}
            <div class="col-lg-3 order-lg-2 mb-3"> {{--  mb-md-2--}}
                <div class="col">
                    <a href="{{ route('admin.news.create' ) }}" class="btn btn-primary w-100"> {{-- mb-3--}}
                        {{ __('elements.button.addNews') }}</a>
                </div>
            </div>

            {{-- blog column --}}
            <div class="col-lg-9 order-lg-1">
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
        </div>

        {{-- Pages --}}
        <div class="row">
            <div class="col m-3">
                {{ $news->links() }}
            </div>

        </div>
    </div>
</section>
@endsection
