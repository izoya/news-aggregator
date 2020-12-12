@extends('layouts.admin')

@section('content')
<section class="row">
    <div class="col">
        <div class="row">
            <div class="col"><h1 class="h1 pb-4">{{ __('pages.admin.allSources') }}</h1></div>
        </div>

        <div class="row">
            {{-- sidebar --}}
            <div class="col-lg-3 order-lg-2 mb-3">
                <div class="col">
                    <a href="{{ route('admin.source.create' ) }}"
                       class="btn btn-primary w-100">
                        {{ __('elements.button.addSource') }}</a>
                </div>
            </div>

            {{-- source list --}}
            <div class="col-lg-9 order-lg-1">
                <div class="row">
                    <div class="col no-padding">
                        @forelse($sources as $source)
                            <div class="row mb-1">
                                {{-- title --}}
                                <div class="col-4 text-truncate text-bold">
                                    <span class="badge alert-warning text-small"
                                          style="width: 3rem">{{ $source->news_count }}</span>
                                    @if($source->link)<a href="{{ $source->link }}" target="_blank">
                                        <span class="pl-3">{{ $source->name }}</span></a>
                                    @else<span class="pl-3">{{ $source->name }}</span>
                                    @endif

                                </div>
                                {{-- description --}}
                                <div class="col-6 text-wrap">
                                    <p class="text-truncate">{!! $source->description ?? '&nbsp;' !!}</p>
                                </div>
                                {{-- buttons --}}
                                <div class="col-1 text-right text-secondary text-nowrap">
                                    {{-- edit --}}
                                    <a class="text-reset hover-info" title="Edit the source"
                                       href="{{ route('admin.source.edit', $source) }}">
                                        <i class="mdi mdi-pencil mdi-18px"></i></a>
                                    {{-- empty --}}
                                    <form method="post" action="{{ route('admin.source.clean', $source) }}"
                                          class="d-inline" onsubmit="getConfirm()">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link text-secondary hover-danger p-0 pb-1"
                                                title="Remove all news with the source">
                                            <i class="mdi mdi-delete-sweep-outline" style="font-size: 21px;"></i></button>
                                    </form>
                                    {{-- destroy --}}
                                    <form method="post" action="{{ route('admin.source.destroy', $source ) }}"
                                          class="d-inline" onsubmit="getConfirm()">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link text-secondary hover-danger p-0 pb-1"
                                                title="Delete the source">
                                            <i class="mdi mdi-delete mdi-18px"></i></button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col ml-3"><p>{{ __('pages.admin.emptySourceList') }}</p></div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Pages --}}
        <div class="row">
        </div>
    </div>
</section>
@endsection
