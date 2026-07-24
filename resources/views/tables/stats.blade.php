@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3 mb-4">
  <!-- Stat Card 1 -->
  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Total Pendapatan</span>
        <span class="badge bg-success-subtle text-success"><x-icon name="arrow-up-right" /> +14%</span>
      </div>
      <div class="h3 fw-bold mb-2">Rp 128.450.000</div>
      <div data-at-sparkline data-type="area" data-color="#206bc4" data-values="30,45,35,55,60,75,90"></div>
    </div>
  </div>

  <!-- Stat Card 2 -->
  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Pesanan Baru</span>
        <span class="badge bg-success-subtle text-success"><x-icon name="arrow-up-right" /> +8%</span>
      </div>
      <div class="h3 fw-bold mb-2">1,420</div>
      <div data-at-sparkline data-type="bar" data-color="#2fb344" data-values="12,18,14,22,25,30,28"></div>
    </div>
  </div>

  <!-- Stat Card 3 -->
  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Tingkat Konversi</span>
        <span class="badge bg-danger-subtle text-danger"><x-icon name="arrow-down-right" /> -2%</span>
      </div>
      <div class="h3 fw-bold mb-2">3.24%</div>
      <div data-at-sparkline data-type="line" data-color="#d63939" data-values="40,38,35,32,34,30,28"></div>
    </div>
  </div>

  <!-- Stat Card 4 -->
  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Pengguna Aktif</span>
        <span class="badge bg-info-subtle text-info">Stabil</span>
      </div>
      <div class="h3 fw-bold mb-2">9,850</div>
      <div data-at-sparkline data-type="area" data-color="#4299e1" data-values="50,52,51,53,52,54,55"></div>
    </div>
  </div>
</div>
@endsection