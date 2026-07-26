@extends('layouts.base')

@section('content')
<div class="at-layout">
  @include('partials.sidebar')
  <div class="at-content">
    @include('partials.navbar')
    <main class="container-fluid py-3">
      @include('partials.page-header')
      @yield('dashboard_content')
    </main>
    @include('partials.footer')
  </div>
</div>
@endsection
