<div class="col-12 mb-3 wow animated fadeInUp animated" data-wow-delay=".2s"
     style="visibility: visible; -webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
    <article class="border rounded bg-light p-3 news-card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);">
        <div class="row pb-2">
            {{-- image --}}
            <div class="col-3 img-container">
                @if(Str::contains($news->image, 'http'))
                    <img src="{{ $news->image }}" class="mr-3" alt="{{ $news->title }}">
                @elseif($news->image)
                    <img src="{{ Storage::disk('uploads')->url($news->image) }}"
                         class="mr-3" alt="{{ $news->title }}">
                @else <img src="{{ asset('images/news.jpg') }}" class="mr-3" alt="{{ $news->title }}">
                @endif
            </div>
            {{-- title, date, description --}}
            <div class="col-9">
                <h2 class="post-title subtitle">
                {{-- External link --}}
                @if ($news->link && empty($news->content))
                        <a href="{{ $news->link }}" target="_blank">{{ $news->title }}</a>
                {{-- Internal link --}}
                @else <a href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a>
                @endif
                </h2>
                <div class="post-date"><span><b>{{ optional($news->created_at)->format('M d Y') }}</b></span></div>
                <p>{{ $news->description }}</p>
            </div>
        </div>

        {{-- comments, link arrow --}}
        <div class="row">
            <div class="w-100 post-meta">
                <span class="comments">
                    <a href="#"><i class="mdi mdi-comment-outline"></i> {{ $news->id }} Comments</a>
                </span>
                <a class="btn btn-round btn-fab float-right"
                {{-- External link --}}
                @if ($news->link && empty($news->content)) href="{{ $news->link }}" target="_blank">
                {{-- Internal link --}}
                @else href="{{ route('news.show', ['news' => $news]) }}">
                @endif
                <i class="material-icons mdi mdi-arrow-right"></i>
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
    </article>
</div>
