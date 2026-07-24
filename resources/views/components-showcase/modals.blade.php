@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Modal Triggers -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Modal Dialog</h5>
      </div>
      <div class="card-body">
        <p class="text-muted small">Modal dialog interaktif untuk konfirmasi, form pop-up, atau pesan penting.</p>
        <div class="d-flex flex-wrap gap-2">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#demoModal">
            Buka Modal Standard
          </button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Modal Konfirmasi Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Offcanvas Triggers -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Offcanvas Drawer</h5>
      </div>
      <div class="card-body">
        <p class="text-muted small">Panel samping yang meluncur dari tepi layar untuk filter atau detail tambahan.</p>
        <div class="d-flex flex-wrap gap-2">
          <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
            Offcanvas Kanan
          </button>
          <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom">
            Offcanvas Bawah
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Standard Demo -->
<div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="demoModalLabel">Judul Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Ini adalah konten di dalam modal dialog standard Bootstrap 5. Anda dapat menempatkan form, teks, atau tabel di sini.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confirm Demo -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="text-danger mb-2"><x-icon name="alert-circle" /></div>
        <h5 class="fw-bold">Konfirmasi Hapus?</h5>
        <p class="small text-muted mb-0">Tindakan ini tidak dapat dibatalkan.</p>
      </div>
      <div class="d-flex justify-content-center gap-2 mt-2">
        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- Offcanvas Right Demo -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Panel Filter</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p class="small text-muted">Gunakan panel ini untuk memfilter data tabel atau grafik.</p>
    <div class="mb-3">
      <label class="form-label small font-semibold">Rentang Tanggal</label>
      <input type="date" class="form-control form-control-sm">
    </div>
    <button class="btn btn-primary btn-sm w-100">Terapkan Filter</button>
  </div>
</div>

<!-- Offcanvas Bottom Demo -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" style="height: 30vh;">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">Detail Catatan</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p class="small text-muted">Panel dari bawah sangat cocok untuk aksi cepat atau log status ringkas.</p>
  </div>
</div>
@endsection