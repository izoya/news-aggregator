@extends('layouts.admin')


@section('content')
{{-- TITLE --}}
<div class="row">
    <div class="col">
        <h1 class="h1 pb-4">
            @if(empty($news)) {{ __('pages.admin.createNews') }}
            @else {{ __('pages.admin.editNews', ['id' => $news->id]) }}
            @endif
        </h1>
    </div>
</div>

<div class="row">
    {{-- FORM --}}
    <div class="col-6">

      {{-- TODO: once backend validation will have been tested, add 'required' & JS validation --}}
    <form method="post" enctype="multipart/form-data"
          action="@if(empty($news)) {{ route('admin.news.store') }}">
                  @else {{ route('admin.news.update', $news) }} "> @method('PUT')
                  @endif
      @csrf
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title"
               value="{{ old('title', optional($news)->title) }}">
        @error('title') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"
                  id="description" rows="2">{{ old('description', optional($news)->description) }}</textarea>
        @error('description') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content"
                  id="content" rows="4">{!! old('content', optional($news)->content) !!}</textarea>
          @error('content') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
          <label for="title">Image</label>
          <input type="file" class="form-control" name="image" id="image">
          @error('image') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id" id="category_id">
            @forelse($categories as $cat)
                {{-- TODO several categories --}}
                <option @if(old('category_id') == $cat->id) selected @endif
                    value="{{ $cat->id }}">{{ $cat->title }}</option>
            @empty
                <option value="0">No categories</option>
            @endforelse
        </select>
        @error('category_id') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
          <label for="source_id">Source</label>
          <select class="form-control" name="source_id" id="source_id">
              @forelse($sources as $source)
                  <option value="{{ $source->id }}"
                     @if(old('source_id', optional($news)->source_id) == $source->id) selected
                     @endif>{{ $source->name }}</option>
              @empty
                  <option value="0">No sources</option>
              @endforelse
          </select>
          @error('source_id') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>

      <button type="submit" class="btn btn-primary">
          @if(empty($news)) {{ __('elements.button.create') }}
          @else {{ __('elements.button.save') }}
          @endif</button>
    </form>
  </div>

    {{-- IMAGE --}}
    <div class="col-6">
        @if($news)
{{--        <img src="{{ Storage::disk('temporary')->url($news->image) }}" alt="">--}}
        <img src="{{ asset('uploads/' . $news->image ) }}" alt="" class="img-100">

        @endif
    </div>
</div>
@endsection
