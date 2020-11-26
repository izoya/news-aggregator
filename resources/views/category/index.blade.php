@extends('layouts.main')

@section('content')

  <div class="">
      <x-title title="Categories"></x-title>
</div>

  <div class="list-group pt-3 w-50">
    @foreach($categories as $cat)
    <a href="{{ route('news.category', ['id' => $cat->id]) }}"
       class="list-group-item list-group-item-action">{{ $cat->title }}</a>
    @endforeach
  </div>

@endsection
