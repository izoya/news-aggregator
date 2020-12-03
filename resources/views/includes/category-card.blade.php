<div class="col-md-4 col-lg-3 mb-3">
    <div class="card shadow-sm category-card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">
                <a href="{{ route('category.show', ['category' => $cat]) }}">{{ $cat->title }}</a>
                <span class="badge badge-warning">{{ $cat->news_count }}</span>
            </h5>
            <a href="{{ route('category.show', ['category' => $cat]) }}"
               class="btn btn-round">
                <i class="mdi mdi-arrow-right"></i>
            </a>
        </div>
        <div class="card-body">

            <p class="card-text">{{ $cat->description }}</p>

        </div>
    </div>
</div>
