@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <h4 class="fw-bold">Setel Ulang Kata Sandi</h4>
  <p class="text-muted small">Silakan buat kata sandi baru untuk akun Anda.</p>
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

<form action="{{ route('password.store') }}" method="POST">
  @csrf

  <!-- Password Reset Token -->
  <input type="hidden" name="token" value="{{ $request->route('token') }}">

  <div class="mb-3">
    <label for="email" class="form-label">Alamat Email</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required autocomplete="username" readonly>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Kata Sandi Baru</label>
    <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password" autofocus>
  </div>

  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
  </div>

  <button type="submit" class="btn btn-primary w-100 py-2">Simpan Password Baru</button>
</form>
@endsection