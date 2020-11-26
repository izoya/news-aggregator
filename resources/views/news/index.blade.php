@extends('layouts.main')

@section('content')
<section class="Material-blog-post-page section-padding">
    {{-- Category Title --}}
    <x-title :title="$title"></x-title>

        <div class="row">
            {{-- blog column --}}
            <div class=" col-lg-8 col-xs-12 blog-post-column">
                <div class="row">
                        @forelse($news as $n)
                            <x-card :news="$n"/>
                        @empty
                            <div class="col"><p>{{ __('pages.news.emptyNewsList') }}</p></div>
                        @endforelse

                </div>
            </div>

            {{-- sidebar --}}
            <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">
                <x-aside-categories></x-aside-categories>
            </div>
        </div>

        {{-- Pages --}}
        <div class="row">
            {{ $news->links() }}
        </div>
</section>
@endsection
