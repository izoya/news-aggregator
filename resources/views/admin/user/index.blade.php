@extends('layouts.admin')
{{-- admin.user.index --}}
@section('content')
    <section class="row">
        <div class="col">

            <div class="row"><div class="col"><h1 class="h1 pb-4">All news</h1></div></div>

            <div class="row">
                {{-- blog column --}}
                <div class=" col-lg-9 col-xs-12">
                    <div class="row">

                        <div class="col no-padding">
                            @forelse($users as $user)
                                <div class="row mb-n2">
                                    {{-- status --}} {{-- name --}}
                                    <div class="col-4 text-wrap">
                                        <i class="mdi
                                            @if($user->is_admin) mdi-account-key  text-danger
                                            @else mdi-account text-warning
                                            @endif text-secondary"></i>
                                        <a href="{{ route('admin.user.show', $user) }}"
                                           class="text-reset text-bold pl-3">{{ $user->name }}</a>
                                    </div>
                                    {{-- e-mail --}}
                                    <div class="col-4 text-wrap">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    {{-- buttons --}}
                                    <div class="col-4 text-right text-secondary mb-3">
                                        <form method="post" action="{{ route('admin.user.status', $user ) }}"
                                              class="d-inline mb-5">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="is_admin" value="{{ (int)$user->is_admin }}">
                                            <button class="btn btn-warning mr-2">
                                              {{ __('elements.button.toggleStatus') }}</button>
                                        </form>

                                        <a class="text-reset hover-info" href="{{ route('admin.user.edit', $user) }}">
                                            <i class="mdi mdi-pencil"></i></a>

                                        <form method="post" action="{{ route('admin.user.destroy', $user ) }}"
                                              class="d-inline" onsubmit="getConfirm()">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-link text-secondary hover-danger p-0 pb-1">
                                                <i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>{{ __('pages.admin.emptyUsersList') }}</p>
                            @endforelse
                        </div>

                    </div>
                </div>
                {{-- blog column --}}

                {{-- sidebar --}}
                <div class="col-md-12 col-lg-3 col-xs-12 blog-sidebar-column">

                </div>
                {{-- sidebar --}}

            </div>

            {{-- Pages --}}
            <div class="row">
                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection
