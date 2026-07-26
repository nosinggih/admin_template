@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card" data-at-datatable data-page-size="5">
  <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
    <h5 class="card-title m-0">Manajemen Pengguna</h5>
    <div class="d-flex align-items-center gap-2">
      <div style="max-width: 220px;">
        <input type="search" class="form-control form-control-sm at-table-search" placeholder="Cari user...">
      </div>
      <a href="{{ url('/users/create') }}" class="btn btn-sm btn-primary">
        <x-icon name="plus" /> Tambah User
      </a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover card-table m-0">
      <thead>
        <tr>
          <th data-sort>Pengguna <x-icon name="arrows-sort" /></th>
          <th data-sort>Peran <x-icon name="arrows-sort" /></th>
          <th data-sort>Email <x-icon name="arrows-sort" /></th>
          <th>Status</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <span class="at-avatar bg-primary-subtle text-primary me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">JD</span>
              <span class="fw-semibold">John Doe</span>
            </div>
          </td>
          <td>Administrator</td>
          <td>john.doe@example.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td class="text-end">
            <a href="{{ url('/users/1') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Detail"><x-icon name="eye" /></a>
            <a href="{{ url('/users/create') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Edit"><x-icon name="pencil" /></a>
            <button class="btn btn-sm btn-icon btn-ghost-danger" title="Hapus"><x-icon name="trash" /></button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <span class="at-avatar bg-success-subtle text-success me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">JS</span>
              <span class="fw-semibold">Jane Smith</span>
            </div>
          </td>
          <td>Editor</td>
          <td>jane.smith@example.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td class="text-end">
            <a href="{{ url('/users/1') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Detail"><x-icon name="eye" /></a>
            <a href="{{ url('/users/create') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Edit"><x-icon name="pencil" /></a>
            <button class="btn btn-sm btn-icon btn-ghost-danger" title="Hapus"><x-icon name="trash" /></button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <span class="at-avatar bg-warning-subtle text-warning me-2" style="width: 2rem; height: 2rem; font-size: 0.75rem;">BW</span>
              <span class="fw-semibold">Bruce Wayne</span>
            </div>
          </td>
          <td>User</td>
          <td>bruce@wayne.com</td>
          <td><span class="badge bg-warning text-dark">Pending</span></td>
          <td class="text-end">
            <a href="{{ url('/users/1') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Detail"><x-icon name="eye" /></a>
            <a href="{{ url('/users/create') }}" class="btn btn-sm btn-icon btn-ghost-secondary" title="Edit"><x-icon name="pencil" /></a>
            <button class="btn btn-sm btn-icon btn-ghost-danger" title="Hapus"><x-icon name="trash" /></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer d-flex align-items-center justify-content-between flex-wrap gap-2">
    <span class="small text-muted">Menampilkan daftar pengguna terdaftar</span>
    <div class="at-table-pagination"></div>
  </div>
</div>
@endsection