@extends('layouts.admin')

@section('content')
    {{-- TITLE --}}
    <div class="row">
        <div class="col">
            <h1 class="h1 pb-4">
                @if(empty($source)) {{ __('pages.admin.addSource') }}
                @else {{ __('pages.admin.editSource', ['id' => $source->id]) }}
                @endif
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            {{-- FORM --}}
            <form method="post" enctype="multipart/form-data"
                  action="@if(empty($source)) {{ route('admin.source.store') }}">
                @else {{ route('admin.source.update', $source) }} "> @method('PUT')
                @endif
                @csrf
                {{-- name --}}
                <div class="form-group mt-3">
                    <label for="name">{{ __('pages.forms.title') }}</label>
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{ old('name', optional($source)->name) }}">
                    @error('name') <small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
                {{-- link --}}
                <div class="form-group mt-3">
                    <label for="link">{{ __('pages.forms.sourceLink') }}</label>
                    <input type="text" class="form-control" name="link" id="link"
                           value="{{ old('link', optional($source)->link) }}">
                    @error('link') <small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
                {{-- image link --}}
                <div class="form-group mt-3">
                    <label for="image">{{ __('pages.forms.imageLink') }}</label>
                    <input type="text" class="form-control" name="image" id="image"
                           value="{{ old('image', optional($source)->image) }}">
                    @error('image') <small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
                {{-- description --}}
                <div class="form-group">
                    <label for="description">{{ __('pages.forms.description') }}</label>
                    <textarea class="form-control" name="description" id="description"
                              rows="3">{{ old('description', optional($source)->description) }}</textarea>
                    @error('description') <small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>

                {{-- submit --}}
                <button type="submit" class="btn btn-primary">
                    @if(empty($source)) {{ __('elements.button.create') }}
                    @else {{ __('elements.button.save') }}
                    @endif</button>
            </form>
        </div>
    </div>
@endsection
