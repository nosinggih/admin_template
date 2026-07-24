@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <div class="text-primary mb-2 display-6"><x-icon name="key" /></div>
  <h4 class="fw-bold">Lupa Kata Sandi?</h4>
  <p class="text-muted small">Masukkan email Anda dan kami akan mengirimkan tautan untuk menyetel ulang kata sandi.</p>
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

<form action="{{ route('password.email') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Alamat Email Terdaftar</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="nama@domain.com" value="{{ old('email') }}" required autofocus autocomplete="username">
  </div>
  <button type="submit" class="btn btn-primary w-100 py-2">Kirim Link Reset</button>
</form>

<div class="text-center mt-4">
  <a href="{{ route('login') }}" class="small text-decoration-none"><x-icon name="arrow-left" /> Kembali ke Login</a>
</div>
@endsection