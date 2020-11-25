<aside class="col-md-12 single-sidebar-widget no-padding wow animated fadeInUp animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
    <div class="sidebar-widget-title">
        <h2>{{ __('components.asideSourceTitle') }}</h2>
    </div>
    <div class="author-info p-3">
        <div class="author-name">
            <div class="author-intro">
                <h3>{{ $source->name }}</h3>
                <p>
                    @if ($source->link) <a href="{{ $source->link }}">{{ $source->link }}</a>
                    @else {{ $source->name }}
                    @endif
                </p>
            </div>
        </div>
        <div class="author-bio">
            <p>{{ $source->description }}</p>
        </div>
    </div>
</aside>
