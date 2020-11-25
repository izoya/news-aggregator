@if(session('success'))
<div class="row">
    <div class="alert alert-success alert-dismissible w-100 fade show" role="alert">
        {{ session('success') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible w-100 fade show" role="alert">
        {{ session('error') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
