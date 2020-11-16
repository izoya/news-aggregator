@extends('layouts.admin')


@section('content')

  <div class="col-6">
    <h1 class="display-4">
        @if(empty($news)) {{ __('pages.admin.createNews') }}
        @else {{ __('pages.admin.editNews', ['id' => $news->id]) }}
        @endif
    </h1>
      {{-- TODO: once backend validation will have been tested, add 'required' & JS validation --}}
    <form method="post" enctype="multipart/form-data"
          action="@if(empty($news)) {{ route('admin.news.store') }}">
                  @else {{ route('admin.news.update', $news) }} "> @method('PUT')
                  @endif
      @csrf
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title"
               value="{{ old('title') ?? $news->title ?? '' }}">
        @error('title') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"
                  id="description" rows="2">{{ old('description') ?? $news->description ?? ''}}</textarea>
        @error('description') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content"
                  id="content" rows="4">{!! old('content') ?? $news->content ?? '' !!}</textarea>
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
                {{-- TODO множество категорий --}}
                <option @if(old('category') == $cat->id) selected @endif
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
                     @if((old() && old('source_id') == $source->id) ||
                        (($news) && $news->source_id == $source->id)) selected
                     @endif>{{ $source->name }}</option>
              @empty
                  <option value="0">No sources</option>
              @endforelse
          </select>
          @error('source_id') <small class="form-text text-danger">{{ $message }}</small>@enderror
      </div>

      <button type="submit" class="btn btn-primary">
          @if(empty($news)) {{ __('pages.admin.addButton') }}
          @else {{ __('pages.admin.editButton') }}
          @endif</button>
    </form>
  </div>


@endsection
