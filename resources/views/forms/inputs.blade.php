@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Basic Inputs -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Input Teks & Password</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
          <div class="form-text">Masukkan nama sesuai kartu identitas resmi.</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat Email</label>
          <input type="email" class="form-control" placeholder="nama@domain.com">
        </div>
        <div class="mb-3">
          <label class="form-label">Kata Sandi</label>
          <input type="password" class="form-control" value="secret123">
        </div>
        <div class="mb-3">
          <label class="form-label">Input Disabled & Readonly</label>
          <input type="text" class="form-control mb-2" value="Field tidak dapat diubah" disabled>
          <input type="text" class="form-control" value="Field readonly (hanya baca)" readonly>
        </div>
      </div>
    </div>
  </div>

  <!-- Input Groups & Select -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Input Groups & Select Dropdown</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Input Group dengan Prefix Ikon</label>
          <div class="input-group">
            <span class="input-group-text"><x-icon name="user" /></span>
            <input type="text" class="form-control" placeholder="Username">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Input Group dengan Suffix Currency</label>
          <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control" placeholder="100.000">
            <span class="input-group-text">,00</span>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Select Dropdown</label>
          <select class="form-select">
            <option selected>Pilih Peran Pengguna...</option>
            <option value="1">Administrator</option>
            <option value="2">Editor / Penulis</option>
            <option value="3">Pengguna Biasa</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Textarea Catatan</label>
          <textarea class="form-control" rows="3" placeholder="Tuliskan catatan tambahan di sini..."></textarea>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection