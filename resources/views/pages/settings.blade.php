@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card">
  <div class="card-header border-bottom-0 pb-0">
    <ul class="nav nav-tabs card-header-tabs" id="settingsTab" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button">Umum</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">Keamanan</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button">Notifikasi</button>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="settingsTabContent">
      <!-- General Tab -->
      <div class="tab-pane fade show active" id="general" role="tabpanel">
        <h6 class="fw-bold mb-3">Pengaturan Umum</h6>
        <div class="mb-3">
          <label class="form-label">Bahasa Antarmuka</label>
          <select class="form-select" style="max-width: 300px;">
            <option value="id" selected>Bahasa Indonesia</option>
            <option value="en">English (US)</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Zona Waktu</label>
          <select class="form-select" style="max-width: 300px;">
            <option value="Asia/Jakarta" selected>(UTC+07:00) Jakarta, Bangkok</option>
            <option value="UTC">UTC (Coordinated Universal Time)</option>
          </select>
        </div>
      </div>

      <!-- Security Tab -->
      <div class="tab-pane fade" id="security" role="tabpanel">
        <h6 class="fw-bold mb-3">Keamanan Akun</h6>
        <div class="mb-3" style="max-width: 400px;">
          <label class="form-label">Kata Sandi Saat Ini</label>
          <input type="password" class="form-control mb-2">
          <label class="form-label">Kata Sandi Baru</label>
          <input type="password" class="form-control mb-2">
          <label class="form-label">Konfirmasi Kata Sandi Baru</label>
          <input type="password" class="form-control mb-3">
          <button class="btn btn-primary btn-sm">Perbarui Password</button>
        </div>
      </div>

      <!-- Notifications Tab -->
      <div class="tab-pane fade" id="notifications" role="tabpanel">
        <h6 class="fw-bold mb-3">Preferensi Notifikasi</h6>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="notif1" checked>
          <label class="form-check-label" for="notif1">Email notifikasi setiap ada transaksi baru</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="notif2" checked>
          <label class="form-check-label" for="notif2">Laporan ringkasan mingguan via email</label>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection