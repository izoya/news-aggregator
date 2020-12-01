@extends('layouts.main')

@section('content')
    <section class="Material-blog-post-page section-padding">
        <div class="container">
            <div class="row">

                {{-- article --}}
                <div class="single-blog-page col-md-12 col-lg-8 col-xs-12">
                    <x-article :news="$news"></x-article>
                    {{-- comment section here --}}
                </div>

                {{-- sidebar --}}
                <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">
                    @if($news)
                    <x-aside-source :source="$news->source"></x-aside-source>
                    @endif
                    <x-aside-categories></x-aside-categories>
                </div>

            </div>
        </div>
    </section>

@endsection
