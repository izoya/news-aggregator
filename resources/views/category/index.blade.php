@extends('layouts.main')

@section('content')
    <div class="">
        <x-title title="Categories"></x-title>
    </div>

    <div class="pt-3 row">
        @foreach($categories as $cat)
            @include('includes.category-card')
        @endforeach
    </div>

@endsection
