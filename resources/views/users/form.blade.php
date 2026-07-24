@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title m-0">Formulir Data Pengguna</h5>
  </div>
  <div class="card-body">
    <form action="/users/list/" method="get">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" class="form-control" placeholder="Masukkan nama lengkap" required value="John Doe">
        </div>
        <div class="col-md-6">
          <label class="form-label">Alamat Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" placeholder="nama@domain.com" required value="john.doe@example.com">
        </div>
        <div class="col-md-6">
          <label class="form-label">Peran Akses <span class="text-danger">*</span></label>
          <select class="form-select" required>
            <option value="1" selected>Administrator</option>
            <option value="2">Editor</option>
            <option value="3">User</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Status Akun <span class="text-danger">*</span></label>
          <select class="form-select" required>
            <option value="active" selected>Aktif</option>
            <option value="pending">Pending</option>
            <option value="inactive">Nonaktif</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Kata Sandi</label>
          <input type="password" class="form-control" placeholder="Biarkan kosong jika tidak diubah">
        </div>
        <div class="col-md-6">
          <label class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control" value="+62 812-3456-7890">
        </div>
      </div>
      <div class="mt-4 border-top pt-3 text-end">
        <a href="{{ url('/users') }}" class="btn btn-outline-secondary me-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan User</button>
      </div>
    </form>
  </div>
</div>
@endsection