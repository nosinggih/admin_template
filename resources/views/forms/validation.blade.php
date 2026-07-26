@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title m-0">Contoh State Validasi Valid & Invalid</h5>
  </div>
  <div class="card-body">
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-6">
        <label for="validationServer01" class="form-label">Nama Depan (Valid State)</label>
        <input type="text" class="form-control is-valid" id="validationServer01" value="Ahmad" required>
        <div class="valid-feedback">
          Terlihat bagus! Nama telah sesuai.
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationServer02" class="form-label">Username (Invalid State)</label>
        <input type="text" class="form-control is-invalid" id="validationServer02" value="admin@#$" required>
        <div class="invalid-feedback">
          Username hanya boleh berisi huruf, angka, dan underscore.
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationServer03" class="form-label">Kota</label>
        <input type="text" class="form-control is-invalid" id="validationServer03" required>
        <div class="invalid-feedback">
          Silakan masukkan nama kota asal Anda.
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationServer04" class="form-label">Provinsi</label>
        <select class="form-select is-valid" id="validationServer04" required>
          <option selected value="1">DKI Jakarta</option>
          <option value="2">Jawa Barat</option>
        </select>
        <div class="valid-feedback">
          Provinsi terpilih.
        </div>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
          <label class="form-check-label text-danger" for="invalidCheck3">
            Saya menyetujui syarat dan ketentuan layanan
          </label>
          <div class="invalid-feedback">
            Anda harus menyetujui syarat sebelum mendaftar.
          </div>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Kirim Form</button>
      </div>
    </form>
  </div>
</div>
@endsection