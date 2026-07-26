@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="card-title m-0">Informasi Pengguna #USR-101</h5>
    <div>
      <a href="{{ url('/users/create') }}" class="btn btn-sm btn-outline-primary me-1"><x-icon name="pencil" /> Edit User</a>
      <a href="{{ url('/users') }}" class="btn btn-sm btn-outline-secondary"><x-icon name="arrow-left" /> Kembali</a>
    </div>
  </div>
  <div class="card-body">
    <div class="d-flex align-items-center mb-4">
      <span class="at-avatar bg-primary text-white me-3" style="width: 4rem; height: 4rem; font-size: 1.5rem;">JD</span>
      <div>
        <h4 class="fw-bold mb-1">John Doe</h4>
        <span class="badge bg-success">Aktif</span>
        <span class="badge bg-primary-subtle text-primary ms-1">Administrator</span>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-md-6 border-bottom pb-2">
        <span class="text-muted small d-block">Alamat Email</span>
        <span class="fw-semibold">john.doe@example.com</span>
      </div>
      <div class="col-md-6 border-bottom pb-2">
        <span class="text-muted small d-block">Nomor Telepon</span>
        <span class="fw-semibold">+62 812-3456-7890</span>
      </div>
      <div class="col-md-6 border-bottom pb-2">
        <span class="text-muted small d-block">Tanggal Pendaftaran</span>
        <span class="fw-semibold">12 Januari 2026, 09:30</span>
      </div>
      <div class="col-md-6 border-bottom pb-2">
        <span class="text-muted small d-block">Login Terakhir</span>
        <span class="fw-semibold">23 Juli 2026, 14:15</span>
      </div>
    </div>
  </div>
</div>
@endsection