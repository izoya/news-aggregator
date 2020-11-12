@extends('layouts.main')

@section('content')

  <div class="">
  <h1 class="pt-5">Categories</h1>
</div>


  <div class="list-group pt-3 w-50">
    @foreach($categories as $id => $cat)
    <a href="{{ route('news.category', ['id' => $id]) }}"
       class="list-group-item list-group-item-action">{{ $cat }}</a>
    @endforeach
  </div>

@endsection
