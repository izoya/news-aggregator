@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            {{-- article --}}
            <div class="col-md-12 col-lg-8 col-xs-12">
                <div class="card">
                    <img src="{{ asset('images/users/' . $user->image) ||
                                 asset('images/blog/author.jpg') }}" class="mr-3" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="mdi
                                @if($user->is_admin) mdi-account-key text-danger
                                @else mdi-account text-warning
                                @endif pr-2"></i>
                            {{ $user->name }}
                        </h5>
                        <p>Email: <span class="text-secondary">{{ $user->created_at->format('M d Y') }}</span></p>
                        <p>Created at: <span class="text-secondary">{{ $user->created_at->format('M d Y') }}</span></p>
                        <p>Updated at: <span class="text-secondary">{{ $user->updated_at->format('M d Y') }}</span></p>
                        <p>Last login at: <span class="text-secondary">
                            @if($user->last_login_at) {{ $user->last_login_at->format('M d Y') }}
                            @endif</span></p>

                        <form method="post" action="{{ route('admin.user.status', $user ) }}" class="d-inline">
                            @csrf @method('PUT')
                            <input type="hidden" name="is_admin" value="{{ (int)$user->is_admin }}">
                            <button class="btn btn-warning">
                                {{ __('pages.admin.changeStatus') }}</button>
                        </form>
                        <a href="{{ route('admin.user.edit', $user ) }}" class="btn bg-success text-light">
                            {{ __('elements.button.edit') }}</a>
                        <form method="post" action="{{ route('admin.user.destroy', $user ) }}"
                              class="d-inline" onsubmit="getConfirm()">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">
                                {{ __('elements.button.delete')}}</button>
                        </form>
                    </div>

                </div>
            </div>
            {{-- article --}}

            {{-- sidebar --}}
            <div class="col-md-12 col-lg-4 col-xs-12">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary w-100">
                    {{ __('elements.button.showAllUsers')}}</a>
            </div>
            {{-- sidebar --}}

        </div>
    </div>

@endsection
