@extends('layouts.app')


@section('content')

  <div class="col-6">
    <h1 class="display-4">Create news</h1>
    <form method="post" action="{{ route('news.store') }}">
      @csrf
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" input="{{ old('title') }}">
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
        <label for="category">Category</label>
        <select class="form-control" name="category" id="category">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>


@endsection
