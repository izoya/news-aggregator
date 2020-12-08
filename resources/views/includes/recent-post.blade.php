<div class="row mb-3">
    <div class="col-3">
        <figure class="overlay">
            @if(Str::contains($news->image, 'http'))
                <img src="{{ $news->image }}" class="img-fluid" alt="">
            @elseif($news->image)
                <img src="{{ Storage::disk('uploads')->url($news->image) }}"
                     class="img-fluid" alt="{{ $news->title }}">
            @else <img src="{{ asset('images/news.jpg') }}" class="img-fluid" alt="">
            @endif
            <figcaption>
                @if ($news->link && empty($news->content))
                    <a href="{{ $news->link }}" target="_blank">
                @else <a href="{{ route('news.show', ['news' => $news]) }}">
                @endif
                <i class="mdi mdi-link-variant from-top icon-xs"></i></a>
            </figcaption>
        </figure>
    </div>
    <div class="col-9">
        <h6 class="recent-post__title">
            @if ($news->link && empty($news->content))
                <a href="{{ $news->link }}" target="_blank">
            @else <a href="{{ route('news.show', ['news' => $news]) }}">
            @endif
            {{ Str::words($news->title, 7) }}</a>
        </h6>
        <div class="recent-post__meta">
            <span class="date">{{ optional($news->created_at)->format('M d Y') }}</span>
        </div>
    </div>
</div>
