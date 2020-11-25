@php ($link = $n->link ?? route('news.show', ['slug' => $n->slug]) ?? '#')

<div class="col mb-3">
    <div class="media border rounded bg-light p-3 news-card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);">
        @if(Str::contains($n->image, 'http'))
              <img src="{{ $n->image }}" class="mr-3" alt="{{ $n->title }}">
        @elseif($n->image)
              <img src="{{ asset('images/news/' . $n->image) }}" class="mr-3" alt="{{ $n->title }}">
        @else <img src="{{ asset('images/news.jpg') }}" class="mr-3" alt="{{ $n->title }}">
        @endif
        <div class="media-body">
            <h5 class="mt-0">
                <a href="{{ $link }}">{{ $n->title }}</a>
            </h5>
            {{ $n->description }}
            <p><span class="text-bold text-secondary">{{ $n->created_at->format('M d Y') }}</span><br/>
                <a href="#"><i class="mdi mdi-comment-outline"></i> {{ $n->id }} Comments</a></p>
            <a href="{{ route('admin.news.edit', $n ) }}" class="btn bg-warning text-dark">
                {{ __('elements.button.edit') }}</a>
            <form method="post" action="{{ route('admin.news.destroy', $n ) }}"
                  class="d-inline" onsubmit="getConfirm()">
                @csrf @method('DELETE')
                <button class="btn btn-danger pointer">
                    {{ __('elements.button.delete')}}</button>
            </form>
        </div>

    </div>


</div>
