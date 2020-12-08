@extends('layouts.admin')

@section('content')
<section class="row">
    <div class="col">
        {{-- Title --}}
        <div class="row">
            <div class="col"><h1 class="h1 pb-4">Feedback List</h1></div>
        </div>

        <div class="row">
            {{-- sidebar --}}
            <div class="col-lg-3 order-lg-2 mb-3 mx-3 mx-lg-0"></div>

            {{-- blog column --}}
            <div class="col-lg-9 order-lg-1">
                        @forelse($feedbackList as $feedback)
                            @include('admin.includes.feedback-card')
                        @empty
                            <p>{{ __('pages.news.emptyFeedbackList') }}</p>
                        @endforelse
            </div>
        </div>

        {{-- Pages --}}
        <div class="row">
            <div class="col m-3">
                {{ $feedbackList->links() }}
            </div>

        </div>
    </div>
</section>
@endsection
