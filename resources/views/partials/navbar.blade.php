<header class="navbar navbar-expand border-bottom px-3 py-2 bg-body d-print-none">
  <div class="container-fluid px-0">
    <button class="btn btn-outline-secondary me-3" data-at-toggle="sidebar" aria-label="Toggle Sidebar">
      <x-icon name="menu-2" />
    </button>

    <div class="d-none d-md-flex me-auto" style="max-width: 280px; width: 100%;">
      <div class="input-group input-group-sm">
        <span class="input-group-text bg-transparent border-end-0">
          <x-icon name="search" />
        </span>
        <input type="search" class="form-control border-start-0" placeholder="Cari fitur atau data..." aria-label="Search">
      </div>
    </div>

    <div class="d-flex align-items-center ms-auto gap-2">
      <!-- Dark Mode Toggle Button -->
      <button class="btn btn-icon btn-ghost-secondary rounded-circle" onclick="toggleTheme()" title="Toggle Dark/Light Mode" aria-label="Toggle Theme">
        <x-icon name="moon" />
      </button>

      <!-- Notification Dropdown -->
      <div class="dropdown">
        <button class="btn btn-icon btn-ghost-secondary rounded-circle position-relative" data-bs-toggle="dropdown" aria-expanded="false" title="Notifikasi">
          <x-icon name="bell" />
          <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
          </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end shadow-sm p-2" style="min-width: 260px;">
          <h6 class="dropdown-header">Notifikasi Terbaru</h6>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action small py-2 px-1 border-0">
              <div class="fw-bold">User Baru Terdaftar</div>
              <div class="text-muted">5 menit yang lalu</div>
            </a>
            <a href="#" class="list-group-item list-group-item-action small py-2 px-1 border-0">
              <div class="fw-bold">Laporan Mingguan Siap</div>
              <div class="text-muted">1 jam yang lalu</div>
            </a>
          </div>
        </div>
      </div>

      <!-- Avatar User Dropdown -->
      <div class="dropdown ms-1">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="at-avatar bg-primary-subtle text-primary">
            @auth
              {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            @else
              GS
            @endauth
          </span>
          <span class="d-none d-md-inline ms-2 fw-semibold small text-body">{{ Auth::user()->name ?? 'Guest' }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
          <li><h6 class="dropdown-header">Pengguna</h6></li>
          <li><a class="dropdown-item small" href="{{ url('/profile') }}"><x-icon name="user" /> Profil Saya</a></li>
          <li><a class="dropdown-item small" href="{{ url('/settings') }}"><x-icon name="settings" /> Pengaturan</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item small text-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); this.closest('form').submit();">
                <x-icon name="logout" /> Keluar
              </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
