@extends('layouts.base')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-body-tertiary">
  <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
    @yield('auth_content')
  </div>
</div>
@endsection
