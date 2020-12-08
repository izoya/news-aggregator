@extends('layouts.admin')

@section('content')
<section class="row">
    <div class="col">
        <div class="row">
            <div class="col"><h1 class="h1 pb-4">All categories</h1></div>
        </div>

        <div class="row">
            {{-- sidebar --}}
            <div class="col-lg-3 order-lg-2 mb-3"> {{--  mb-md-2--}}
                <div class="col">
                    <a href="{{ route('admin.category.create' ) }}"
                       class="btn btn-primary w-100"> {{-- mb-3--}}
                        {{ __('elements.button.addCategory') }}</a>
                </div>
            </div>

            {{-- category list --}}
            <div class="col-lg-9 order-lg-1">
                <div class="row">
                    <div class="col no-padding">
                        @forelse($categories as $category)
                            <div class="row mb-1">
                                {{-- title --}}
                                <div class="col-3 text-truncate">
                                    <span class="badge alert-warning text-small"
                                          style="width: 3rem">{{ $category->news_count }}</span>
                                    <a href="{{ route('category.show', $category) }}" target="_blank"
                                       class="text-reset text-bold pl-3">{{ $category->title }}</a>
                                </div>
                                {{-- description --}}
                                <div class="col-6 text-wrap">
                                    <p class="text-truncate">{!! $category->description ?? '&nbsp;' !!}</p>
                                </div>
                                {{-- buttons --}}
                                <div class="col-1 text-right text-secondary text-nowrap">
                                    {{-- edit --}}
                                    <a class="text-reset hover-info" title="Edit the category"
                                       href="{{ route('admin.category.edit', $category) }}">
                                        <i class="mdi mdi-pencil mdi-18px"></i></a>
                                    {{-- empty --}}
                                    <form method="post" action="{{ route('admin.category.clean', $category) }}"
                                          class="d-inline" onsubmit="getConfirm()">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link text-secondary hover-danger p-0 pb-1"
                                                title="Remove all news from the category">
                                            <i class="mdi mdi-delete-sweep-outline" style="font-size: 21px;"></i></button>
                                    </form>
                                    {{-- destroy --}}
                                    <form method="post" action="{{ route('admin.category.destroy', $category ) }}"
                                          class="d-inline" onsubmit="getConfirm()">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link text-secondary hover-danger p-0 pb-1"
                                                title="Delete the category">
                                            <i class="mdi mdi-delete mdi-18px"></i></button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col ml-3"><p>{{ __('pages.admin.emptyCategoryList') }}</p></div>
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
