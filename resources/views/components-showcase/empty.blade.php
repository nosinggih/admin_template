@extends('layouts.dashboard')

@section('dashboard_content')
<div class="card p-5 text-center my-3">
  <div class="card-body py-5">
    <div class="text-muted mb-3 display-4">
      <x-icon name="folder-off" />
    </div>
    <h3 class="fw-bold mb-2">Belum Ada Data Tersedia</h3>
    <p class="text-muted max-w-md mx-auto mb-4" style="max-width: 450px;">
      Tidak ada data yang dapat ditampilkan saat ini. Mulai tambahkan entitas baru atau sesuaikan kata kunci pencarian Anda.
    </p>
    <div class="d-flex justify-content-center gap-2">
      <a href="/" class="btn btn-outline-secondary">
        <x-icon name="arrow-left" /> Kembali ke Dashboard
      </a>
      <button class="btn btn-primary">
        <x-icon name="plus" /> Tambah Data Baru
      </button>
    </div>
  </div>
</div>
@endsection