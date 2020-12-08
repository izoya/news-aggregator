<div class="row mb-3 mx-0 border rounded bg-light p-3 news-card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);">
    <div class="col-sm-4 col-md-3 p-0 text-truncate">
        {{-- Image --}}
        @if(Str::contains($n->image, 'http'))
        <img src="{{ $n->image }}" alt="{{ $n->title }}">
        @elseif($n->image)
        <img src="{{ Storage::disk('uploads')->url($n->image) }}" alt="{{ $n->title }}">
        @else <img src="{{ asset('images/news.jpg') }}" alt="">
        @endif
        {{-- Date, comments --}}
        <p class="text-bold text-secondary pt-3">{{ optional($n->created_at)->format('M d Y') }}</p>
        <p><a href="#"><i class="mdi mdi-comment-outline"></i> {{ $n->id }} Comments</a></p>
    </div>
    <div class="col-sm-8 col-md-9 p-0 pl-3 d-flex flex-column justify-content-between">
        {{-- Title & description --}}
        <div>
            <h5 class="mt-0">
                {{-- External link --}}
                @if ($n->link && empty($n->content))
                    <a href="{{ $n->link }}" target="_blank">{{ $n->title }}</a>
                    {{-- Internal link --}}
                @else <a href="{{ route('news.show', ['news' => $n]) }}">{{ $n->title }}</a>
                @endif
            </h5>
            <div>{!! $n->description !!}</div>
        </div>
        {{-- Buttons --}}
        <div class="d-flex justify-content-end mt-2">
            <a href="{{ route('admin.news.edit', $n ) }}" class="btn btn-sm bg-warning text-dark">
                {{ __('elements.button.edit') }}</a>
            <form method="post" action="{{ route('admin.news.destroy', $n ) }}"
                  class="d-inline" onsubmit="getConfirm()">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm pointer ml-2">
                    {{ __('elements.button.delete')}}</button>
            </form>
        </div>
    </div>
</div>
