@extends('layouts.dashboard')

@section('dashboard_content')
<!-- Stat Cards Row -->
<div class="row row-cards g-3 mb-4">
  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Total Pengguna</span>
        <span class="badge bg-primary-subtle text-primary"><x-icon name="users" /></span>
      </div>
      <div class="h3 fw-bold mb-1">12,450</div>
      <div class="small text-success"><x-icon name="arrow-up-right" /> +15% dari bulan lalu</div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Total Pendapatan</span>
        <span class="badge bg-success-subtle text-success"><x-icon name="currency-dollar" /></span>
      </div>
      <div class="h3 fw-bold mb-1">Rp 142.800.000</div>
      <div class="small text-success"><x-icon name="arrow-up-right" /> +8.4% dari bulan lalu</div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Pesanan Selesai</span>
        <span class="badge bg-info-subtle text-info"><x-icon name="shopping-cart" /></span>
      </div>
      <div class="h3 fw-bold mb-1">3,890</div>
      <div class="small text-info"><x-icon name="check" /> 99.2% tepat waktu</div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted small">Tiket Ditolak</span>
        <span class="badge bg-danger-subtle text-danger"><x-icon name="alert-circle" /></span>
      </div>
      <div class="h3 fw-bold mb-1">14</div>
      <div class="small text-danger"><x-icon name="arrow-down-right" /> -4% minggu ini</div>
    </div>
  </div>
</div>

<!-- Main Chart & Summary Section -->
<div class="row row-cards g-3 mb-4">
  <div class="col-lg-8">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0">Ringkasan Tren Pendapatan 2026</h5>
        <div class="btn-group btn-group-sm">
          <button type="button" class="btn btn-outline-secondary active">Bulanan</button>
          <button type="button" class="btn btn-outline-secondary">Mingguan</button>
        </div>
      </div>
      <div class="card-body">
        <div id="chart-line-demo"></div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Distribusi Perangkat</h5>
      </div>
      <div class="card-body d-flex align-items-center justify-content-center">
        <div id="chart-donut-demo" class="w-100"></div>
      </div>
    </div>
  </div>
</div>

<!-- Recent Activity Table -->
<div class="row row-cards g-3">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0">Aktivitas Transaksi Terbaru</h5>
        <a href="{{ url('/tables/basic') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table m-0">
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>Pelanggan</th>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Status</th>
              <th class="text-end">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-semibold">#TRX-8801</td>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-primary-subtle text-primary me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">AD</span>
                  <span>Ahmad Dahlan</span>
                </div>
              </td>
              <td>23 Jul 2026</td>
              <td>Rp 750.000</td>
              <td><span class="badge bg-success">Selesai</span></td>
              <td class="text-end"><button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="eye" /></button></td>
            </tr>
            <tr>
              <td class="fw-semibold">#TRX-8802</td>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-success-subtle text-success me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">BS</span>
                  <span>Budi Santoso</span>
                </div>
              </td>
              <td>23 Jul 2026</td>
              <td>Rp 1.400.000</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td class="text-end"><button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="eye" /></button></td>
            </tr>
            <tr>
              <td class="fw-semibold">#TRX-8803</td>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-danger-subtle text-danger me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">CD</span>
                  <span>Citra Dewi</span>
                </div>
              </td>
              <td>22 Jul 2026</td>
              <td>Rp 320.000</td>
              <td><span class="badge bg-danger">Gagal</span></td>
              <td class="text-end"><button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="eye" /></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
