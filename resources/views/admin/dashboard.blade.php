@extends('layouts.admin')

@section('content')
<div class="row row-cols-1 row-cols-lg-2">
    {{-- NEWS --}}
    <div class="col mb-4">
        <div class="card">
            <div class="card-header  text-uppercase">News
                <a href="{{ route('admin.news.create' ) }}" class="d-inline btn btn-primary btn-sm float-right">
                    {{ __('elements.button.addNews') }}</a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    @forelse($news as $n)
                        <div class="row">
                            <div class="col-10 text-truncate">
                                <span class="badge alert-info text-small mr-2" >
                                    {{$n->updated_at->format('d.m') }}</span>
                                <a href="{{ route('news.show', $n->slug) }}" class="text-reset text-bold">
                                    {{ $n->title }}</a>
                            </div>
                            <div class="col-2 text-right text-secondary">
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
                <a href="{{ route('admin.news.index') }}">See all <i class="mdi mdi-arrow-right"></i></a>
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
                            <div class="col-5 text-truncate">
                                <i class="mdi
                                @if($user->is_admin) mdi-account-key  text-danger
                                @else mdi-account text-warning
                                @endif text-secondary pr-2"></i>

                                <a href="{{ route('admin.user.show', $user) }}" class="text-reset text-bold">
                                    {{ $user->name }}</a>
                            </div>
                            {{-- e-mail --}}
                            <div class="col-5 pl-0 text-truncate">
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
                <a href="{{ route('admin.user.index') }}">See all <i class="mdi mdi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- CATEGORIES --}}
    <div class="col mb-4">
        <div class="card">
            <div class="card-header text-uppercase">CATEGORIES
                <a href="{{ route('admin.category.create' ) }}" class="d-inline btn btn-primary btn-sm float-right">
                    {{ __('elements.button.addCategory') }}</a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    @forelse($categories as $category)
                        <div class="row">
                            {{-- title --}}
                            <div class="col-4 text-truncate">
                                <i class="mdi mdi-folder-open text-warning pr-2"></i>
                                <a href="{{ route('category.show', $category) }}"
                                   class="text-reset text-bold">{{ $category->title }}</a>
                            </div>
                            {{-- description --}}
                            <div class="col-6 text-truncate pl-0">{{ $category->description }}</div>
                            {{-- buttons --}}
                            <div class="col-2 text-right text-secondary">
                                <a class="text-reset hover-info"
                                   href="{{ route('admin.category.edit', $category) }}">
                                    <i class="mdi mdi-pencil"></i></a>

                                <form method="post" action="{{ route('admin.category.destroy', $category ) }}"
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
                        <p>{{ __('pages.admin.emptyCategoryList') }}</p>
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.category.index') }}">See all <i class="mdi mdi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- RSS FEEDS --}}
    <div class="col mb-4">
        <div class="card">
            <div class="card-header text-uppercase">Rss Feeds
                <a href="{{ route('admin.feed.create' ) }}" class="d-inline btn btn-primary btn-sm float-right">
                    {{ __('elements.button.addFeed') }}</a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    @forelse($feeds as $feed)
                        <div class="row">
                            {{-- title --}}
                            <div class="col-5 text-truncate">
                                <i class="mdi mdi-rss-box text-secondary pr-2"></i>
                                <a href="{{ route('admin.feed.show', $feed) }}"
                                   class="text-reset text-bold">{{ $feed->title }}</a>
                            </div>
                            {{-- link --}}
                            <div class="col-5 text-truncate pl-0">
                                <a href="{{ $feed->link }}">{{ $feed->link }}</a>
                            </div>
                            {{-- buttons --}}
                            <div class="col-2 text-right text-secondary">
                                <a class="text-reset hover-info"
                                   href="{{ route('admin.feed.edit', $feed) }}">
                                    <i class="mdi mdi-pencil"></i></a>

                                <form method="post" action="{{ route('admin.feed.destroy', $feed ) }}"
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
                <a href="{{ route('admin.feed.index') }}">See all <i class="mdi mdi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    {{-- FEEDBACK --}}
    <div class="col mb-4">
        <div class="card">
            <div class="card-header text-uppercase">FEEDBACK</div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    @forelse($feedbackList as $feedback)
                        <div class="row mb-n2">
                            {{-- status --}}{{-- email --}}
                            <div class="col-3 text-truncate">
                                <p><i class="mdi
                                @if($feedback->is_resolved) mdi-checkbox-marked-outline text-success
                                @else mdi-checkbox-blank-outline text-secondary
                                @endif pr-2"></i>{{ $feedback->email }}</p>
                            </div>
                            {{-- subject --}}
                            <div class="col-9">
                                <p class="text-bold text-truncate">{{ $feedback->subject }}</p>
                            </div>
                        </div>
                    @empty
                        <p>{{ __('pages.admin.emptyFeedbackList') }}</p>
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.feedback.index') }}">See all <i class="mdi mdi-arrow-right"></i></a>
            </div>
        </div>
    </div>

</div>




@endsection




