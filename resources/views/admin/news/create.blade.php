@extends('layouts.admin')


@section('content')

  <div class="col-6">
    <h1 class="display-4">Create news</h1>
      {{-- TODO: once backend validation will have been tested, add 'required' & JS validation --}}
    <form method="post" action="{{ route('admin.news.store') }}">
      @csrf
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"
                  id="description" rows="2">{{ old('description') }}</textarea>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content"
                  id="content" rows="4">{!! old('content') !!}</textarea>
      </div>
      <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" name="category_id" id="category_id">
            @forelse($categories as $cat)
                <option @if(old('category') == $cat->id) selected @endif
                    value="{{ $cat->id }}">{{ $cat->title }}</option>
            @empty
                <option value="0">No categories</option>
            @endforelse
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>


@endsection
