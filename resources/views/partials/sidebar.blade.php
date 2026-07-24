<aside class="at-sidebar" id="at-sidebar">
  <a href="{{ url('/') }}" class="at-sidebar-brand">
    <span class="at-nav-icon text-primary me-2"><x-icon name="layout-dashboard" /></span>
    <span>{{ config('app.name', 'Laravel') }}</span>
  </a>
  <div class="at-sidebar-menu">
    <ul class="nav flex-column">
      @foreach($nav as $item)
        @if(isset($item['children']))
          @php $collapseId = "menu-collapse-" . $loop->iteration; @endphp
          <li class="nav-item mb-1">
            <a class="at-nav-link text-decoration-none d-flex align-items-center justify-content-between {{ $item['active'] ? '' : 'collapsed' }}" 
               data-bs-toggle="collapse" 
               href="#{{ $collapseId }}" 
               role="button" 
               aria-expanded="{{ $item['active'] ? 'true' : 'false' }}" 
               aria-controls="{{ $collapseId }}">
              <div class="d-flex align-items-center">
                <span class="at-nav-icon"><x-icon :name="$item['icon']" /></span>
                <span>{{ $item['label'] }}</span>
              </div>
              <span class="ms-auto small"><x-icon name="chevron-down" /></span>
            </a>
            <div class="collapse {{ $item['active'] ? 'show' : '' }}" id="{{ $collapseId }}">
              <ul class="at-submenu">
                @foreach($item['children'] as $sub)
                  <li>
                    <a href="{{ url($sub['url']) }}" class="at-submenu-link {{ $sub['active'] ? 'active' : '' }}">
                      {{ $sub['label'] }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </li>
        @else
          <li class="nav-item mb-1">
            <a href="{{ url($item['url']) }}" class="at-nav-link {{ $item['active'] ? 'active' : '' }}">
              <span class="at-nav-icon"><x-icon :name="$item['icon']" /></span>
              <span>{{ $item['label'] }}</span>
            </a>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
</aside>
