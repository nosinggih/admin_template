@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <div class="text-primary mb-2 display-6"><x-icon name="lock" /></div>
  <h4 class="fw-bold">Konfirmasi Sandi</h4>
  <p class="text-muted small">Ini adalah area aplikasi yang aman. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.</p>
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

<form method="POST" action="{{ route('password.confirm') }}">
  @csrf

  <div class="mb-3">
    <label for="password" class="form-label">Kata Sandi</label>
    <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password" autofocus>
  </div>

  <button type="submit" class="btn btn-primary w-100 py-2">Konfirmasi</button>
</form>
@endsection
