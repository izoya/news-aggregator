@php ($link = ($news->link) ? $news->link :  route('news.show', ['slug' => $news->slug]))

<div class="col-12 mb-3 wow animated fadeInUp animated" data-wow-delay=".2s"
     style="visibility: visible; -webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
    <article class="border rounded bg-light p-3 news-card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);">
        <div class="row">
            <div class="col-3">
                @if(Str::contains($news->image, 'http'))
                    <img src="{{ $news->image }}" class="mr-3" alt="{{ $news->title }}">
                @elseif($news->image)
                    <img src="{{ Storage::disk('uploads')->url($news->image) }}" class="mr-3" alt="{{ $news->title }}">
                @else <img src="{{ asset('images/news.jpg') }}" class="mr-3" alt="{{ $news->title }}">
                @endif
            </div>
            <div class="col-9">
                <a href="{{ $link }}"><h2 class="post-title subtitle">{{ $news->title }}</h2></a>
                <div class="post-date"><span><b>{{ optional($news->created_at)->format('M d Y') }}</b></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-9">
                <p>{{ $news->description }}</p>
            </div>
        </div>
        <div class="row">
            <div class="w-100 post-meta">
                <span class="comments">
                    <a href="#"><i class="mdi mdi-comment-outline"></i> {{ $news->id }} Comments</a>
                </span>
                <a class="btn btn-round btn-fab float-right" href="{{ $link }}"><i
                        class="material-icons mdi mdi-arrow-right"></i>
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
    </article>
</div>
