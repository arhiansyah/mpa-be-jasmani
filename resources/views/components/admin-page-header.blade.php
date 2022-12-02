<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-dark-red">{{ $title }}</h3>
                <p class="text-subtitle text-muted">{{ $subtitle }}</p>
            </div>
            {{-- {{ $module }} --}}
            @if (isset($module))
                
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ $linkModule }}">{{ $module }}</a></li>
                        @if (isset($method))
                        <li class="breadcrumb-item active" aria-current="page">{{ $method }}</li>
                        @endif
                    </ol>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
