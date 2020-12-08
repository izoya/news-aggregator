@extends('layouts.admin')

@section('content')
{{-- TITLE --}}
<div class="row">
    <div class="col">
        <h1 class="h1 pb-4">
            @if(empty($category)) {{ __('pages.admin.addCategory') }}
            @else {{ __('pages.admin.editCategory') }}
            @endif
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        {{-- FORM --}}
        <form method="post" enctype="multipart/form-data"
              action="@if(empty($category)) {{ route('admin.category.store') }}">
                      @else {{ route('admin.category.update', $category) }} "> @method('PUT')
                      @endif
              @csrf
            {{-- title --}}
            <div class="form-group mt-3">
                <label for="title">{{ __('pages.forms.title') }}</label>
                <input type="text" class="form-control" name="title" id="title"
                       value="{{ old('title', optional($category)->title) }}">
                @error('title') <small class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            {{-- description --}}
            <div class="form-group">
                <label for="description">{{ __('pages.forms.description') }}</label>
                <textarea class="form-control" name="description" id="description"
                          rows="3">{{ old('description', optional($category)->description) }}</textarea>
                @error('description') <small class="form-text text-danger">{{ $message }}</small>@enderror
            </div>

            {{-- submit --}}
            <button type="submit" class="btn btn-primary">
                @if(empty($category)) {{ __('elements.button.create') }}
                @else {{ __('elements.button.save') }}
                @endif</button>
        </form>
    </div>
</div>
@endsection
