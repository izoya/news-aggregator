@extends('layouts.admin')

@section('content')
    <div class="row row-cols-1 row-cols-md-2">
        {{-- NEWS --}}
        <div class="col mb-4">
            <div class="card">
                <div class="card-header  text-uppercase">News
                    <a href="{{ route('admin.news.create' ) }}" class="d-inline btn btn-info btn-sm float-right">
                        {{ __('elements.button.addNews') }}</a>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        @forelse($news as $n)
                            <div class="row">
                                <div class="col-9 pl-0 text-truncate">
                                    <span class="badge alert-info text-small" >
                                        {{$n->updated_at->format('d.m') }}</span>
                                    <a href="{{ route('news.show', $n->slug) }}" class="text-reset text-bold">
                                        {{ $n->title }}</a>
                                </div>
                                <div class="col-3 text-right text-secondary">
                                    <a class="text-reset hover-info" href="{{ route('admin.news.edit', $n ) }}">
                                        <i class="mdi mdi-pencil"></i></a>

                                    <form method="post" action="{{ route('admin.news.destroy', $n ) }}"
                                          class="d-inline" onsubmit="getConfirm()">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link text-secondary hover-danger p-0 pb-1">
                                            <i class="mdi mdi-delete"></i></button>
                                    </form>

                                    <a class="" href="#">
                                        </a>
                                </div>
                            </div>
                        @empty
                            <p>{{ __('pages.news.emptyNewsList') }}</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.news.index') }}">See all <i class="mdi-arrow"></i></a>
                </div>
            </div>
        </div>

        {{-- USERS --}}
        <div class="col mb-4">
            <div class="card">
                <div class="card-header text-uppercase">Users</div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-2">Status</div>
                            <div class="col-4">Name</div>
                            <div class="col-3">E-mail</div>
                        </div>



                    </div>
                </div>
                <div class="card-footer">Footer</div>
            </div>
        </div>


    </div>




@endsection




