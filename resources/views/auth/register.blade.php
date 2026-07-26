@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <h3 class="fw-bold">Buat Akun Baru</h3>
  <p class="text-muted small">Dapatkan akses penuh ke dashboard admin template</p>
</div>

<!-- Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger small mb-3">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nama Lengkap</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required autofocus autocomplete="name">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Alamat Email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="nama@domain.com" value="{{ old('email') }}" required autocomplete="username">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Kata Sandi</label>
    <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
  </div>

  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
  </div>

  <button type="submit" class="btn btn-primary w-100 py-2">Daftar Akun Baru</button>
</form>

<div class="text-center mt-4">
  <span class="small text-muted">Sudah punya akun?</span>
  <a href="{{ route('login') }}" class="small fw-bold text-decoration-none ms-1">Masuk</a>
</div>
@endsection