<div class="feedback-card row border rounded bg-light mb-3 mx-0 p-3 shadow">
    <div class="col-1 p-0 text-truncate border-right mr-3">
        <div class="w-100"><span class="text-secondary">Status</span></div>
        <form method="post" action="{{ route('admin.feedback.status', $feedback ) }}"
              class="d-inline mb-5">
            @csrf @method('PUT')
            <button class="mr-2 bg-transparent border-0" title='Toggle status'>
                <i class="mdi
                @if($feedback->is_resolved) mdi-checkbox-marked-outline text-success
                @else mdi-checkbox-blank-outline text-secondary
                @endif mdi-24px"></i>
            </button>
        </form>
    </div>
    <div class="col-11 mr-n3">
        <div class="row">
            {{-- Date --}}
            <div class="col-sm-6 col-md-2">
                <p class="text-secondary">
                    {{ optional($feedback->created_at)->format('M d Y') }}</p>
            </div>
            {{-- Name --}}
            <div class="col-sm-6 col-md-3 text-truncate">
                <p><span class="text-secondary">Name:</span>
                    <span class="text-bold"> {{ $feedback->name }}</span></p>
            </div>
            {{-- Email --}}
            <div class="col-sm-6 col-md-3 text-truncate">
                <p><span class="text-secondary">E-mail:</span>
                    <span class="text-bold"> {{ $feedback->email }}</span></p>
            </div>
            {{-- Status --}}
            <div class="col-sm-6 col-md-4">
                <p><span class="text-secondary">Status:</span>
                @if($feedback->is_resolved)
                    <span class="text-bold text-success"> {{ __('pages.admin.resolved') }}</span>
                @else
                    <span class="text-bold text-danger"> {{ __('pages.admin.unresolved') }}</span>
                @endif
                </p>
            </div>

        </div>

        <h6 class="mt-0">{{ $feedback->subject }}</a></h6>
        <div>{!! $feedback->message !!}</div>
    </div>
</div>
