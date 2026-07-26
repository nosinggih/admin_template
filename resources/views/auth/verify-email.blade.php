@extends('layouts.auth')

@section('auth_content')
<div class="text-center mb-4">
  <div class="text-primary mb-2 display-6"><x-icon name="mail" /></div>
  <h4 class="fw-bold">Verifikasi Email</h4>
  <p class="text-muted small">Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerimanya, kami akan dengan senang hati mengirimkan kembali.</p>
</div>

@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success small mb-3">
        Tautan verifikasi baru telah dikirimkan ke alamat email yang Anda berikan saat registrasi.
    </div>
@endif

<div class="d-flex flex-column gap-2">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary w-100 py-2">
            Kirim Ulang Email Verifikasi
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100 py-2">
            Keluar (Log Out)
        </button>
    </form>
</div>
@endsection
