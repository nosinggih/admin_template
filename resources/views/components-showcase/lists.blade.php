@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- List Group -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">List Group Interaktif</h5>
      </div>
      <div class="card-body">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center" aria-current="true">
            <div>
              <div class="fw-bold">Pemberitahuan Sistem</div>
              <small>Server utama diperbarui ke v2.4.0</small>
            </div>
            <span class="badge bg-light text-dark rounded-pill">Baru</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">Pesan Pengguna</div>
              <small>Tiket bantuan #402 telah ditutup</small>
            </div>
            <span class="badge bg-primary rounded-pill">3</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">Tagihan Bulanan</div>
              <small>Faktur bulan Juli telah dikirim</small>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Timeline & Steps -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Timeline Aktivitas</h5>
      </div>
      <div class="card-body">
        <div class="border-start border-2 border-primary ps-3 my-2 ms-2">
          <div class="mb-3 position-relative">
            <div class="fw-bold small">Proyek Dibuat</div>
            <div class="text-muted extra-small">23 Juli 2026, 10:00</div>
            <p class="small text-muted mb-0">Inisialisasi repo dan tooling dasar diselesaikan.</p>
          </div>
          <div class="mb-3 position-relative">
            <div class="fw-bold small text-primary">Shell Layout Diselesaikan</div>
            <div class="text-muted extra-small">23 Juli 2026, 14:00</div>
            <p class="small text-muted mb-0">Sidebar, navbar, dan layout responsif selesai.</p>
          </div>
          <div class="position-relative">
            <div class="fw-bold small">Showcase Komponen UI</div>
            <div class="text-muted extra-small">Sedang Berlangsung</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection