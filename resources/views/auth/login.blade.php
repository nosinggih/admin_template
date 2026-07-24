@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <a href="{{ url('/') }}" class="h3 fw-bold text-decoration-none text-body">
    <span class="text-primary me-2"><x-icon name="layout-dashboard" /></span>
    <span>{{ config('app.name', 'Laravel') }}</span>
  </a>
  <p class="text-muted small mt-2">Masuk untuk mengelola dashboard admin Anda</p>
</div>

<!-- Session Status -->
@if (session('status'))
    <div class="alert alert-success small mb-3">
        {{ session('status') }}
    </div>
@endif

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

<form action="{{ route('login') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Alamat Email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="nama@domain.com" required value="{{ old('email') }}" autofocus autocomplete="username">
  </div>

  <div class="mb-3">
    <div class="d-flex justify-content-between align-items-center">
      <label for="password" class="form-label mb-0">Kata Sandi</label>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="small text-decoration-none">Lupa password?</a>
      @endif
    </div>
    <input type="password" id="password" name="password" class="form-control mt-1" required autocomplete="current-password">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
    <label class="form-check-label small" for="rememberMe">Ingat saya di perangkat ini</label>
  </div>

  <button type="submit" class="btn btn-primary w-100 py-2">Masuk ke Akun</button>
</form>

<div class="text-center mt-4">
  <span class="small text-muted">Belum punya akun?</span>
  <a href="{{ route('register') }}" class="small fw-bold text-decoration-none ms-1">Daftar sekarang</a>
</div>
@endsection