<div class="page-header mb-3">
  <div class="row align-items-center justify-content-between">
    <div class="col">
      <h1 class="h3 fw-bold mb-1">{{ $title ?? '' }}</h1>
      @if(isset($breadcrumb) && is_array($breadcrumb))
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 small">
          @foreach($breadcrumb as $crumb)
          <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
            @if(isset($crumb['url']) && !$loop->last)
              <a href="{{ url($crumb['url']) }}" class="text-decoration-none">{{ $crumb['label'] }}</a>
            @else
              <span>{{ $crumb['label'] }}</span>
            @endif
          </li>
          @endforeach
        </ol>
      </nav>
      @endif
    </div>
  </div>
</div>
