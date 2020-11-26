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
                        @forelse($users as $user)
                            <div class="row mb-n2">
                                {{-- status --}}{{-- name --}}
                                <div class="col-5 pl-0 text-truncate">
                                    <i class="mdi
                                    @if($user->is_admin) mdi-account-key  text-danger
                                    @else mdi-account text-warning
                                    @endif text-secondary pr-2"></i>

                                    <a href="{{ route('admin.user.show', $user) }}" class="text-reset text-bold">
                                        {{ $user->name }}</a>
                                </div>
                                {{-- e-mail --}}
                                <div class="col-5 text-truncate">
                                    <p>{{ $user->email }}</p>
                                </div>
                                {{-- buttons --}}
                                <div class="col-2 text-right text-secondary">
                                    <a class="text-reset hover-info" href="{{ route('admin.user.edit', $user) }}">
                                        <i class="mdi mdi-pencil"></i></a>

                                    <form method="post" action="{{ route('admin.user.destroy', $user ) }}"
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
                            <p>{{ __('pages.admin.emptyUsersList') }}</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.user.index') }}">See all <i class="mdi-arrow"></i></a>
                </div>
            </div>
        </div>

        {{-- RSS FEEDS --}}
        <div class="col mb-4">
            <div class="card">
                <div class="card-header text-uppercase">Feeds
                    <a href="{{ route('admin.resource.create' ) }}" class="d-inline btn btn-info btn-sm float-right">
                        {{ __('elements.button.addFeed') }}</a>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        @forelse($resources as $resource)
                            <div class="row">
                                {{-- title --}}
                                <div class="col-5 pl-0 text-truncate">
                                    <i class="mdi mdi-rss-box text-secondary pr-2"></i>
                                    <a href="{{ route('admin.resource.show', $resource) }}"
                                       class="text-reset text-bold">{{ $resource->title }}</a>
                                </div>
                                {{-- link --}}
                                <div class="col-5 text-truncate">
                                    <a href="{{ $resource->link }}">{{ $resource->link }}</a>
                                </div>
                                {{-- buttons --}}
                                <div class="col-2 text-right text-secondary">
                                    <a class="text-reset hover-info"
                                       href="{{ route('admin.resource.edit', $resource) }}">
                                        <i class="mdi mdi-pencil"></i></a>

                                    <form method="post" action="{{ route('admin.resource.destroy', $resource ) }}"
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
                            <p>{{ __('pages.admin.emptyFeedList') }}</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.resource.index') }}">See all <i class="mdi-arrow"></i></a>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="card">
                <div class="card-header  text-uppercase">CATEGORIES</div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to content.</p>
                </div>
                <div class="card-footer">Footer</div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="card">
                <div class="card-header  text-uppercase">ORDERS</div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to content.</p>
                </div>
                <div class="card-footer">Footer</div>
            </div>
        </div>


    </div>




@endsection




