@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3 mb-4">
  <div class="col-md-6 col-lg-3">
    <div class="card p-3">
      <div class="text-muted small">Total Sesi Pengunjung</div>
      <div class="h3 fw-bold my-1">45,820</div>
      <div data-at-sparkline data-type="line" data-color="#206bc4" data-values="20,25,22,30,35,40,45"></div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card p-3">
      <div class="text-muted small">Pageviews Per Sesi</div>
      <div class="h3 fw-bold my-1">4.28</div>
      <div data-at-sparkline data-type="area" data-color="#4299e1" data-values="3,4,3,5,4,6,5"></div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card p-3">
      <div class="text-muted small">Bounce Rate</div>
      <div class="h3 fw-bold my-1">28.4%</div>
      <div data-at-sparkline data-type="bar" data-color="#2fb344" data-values="35,32,30,28,29,27,28"></div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card p-3">
      <div class="text-muted small">Waktu Rata-rata Sesi</div>
      <div class="h3 fw-bold my-1">03m 42s</div>
      <div data-at-sparkline data-type="line" data-color="#f59f00" data-values="180,210,195,220,240,215,222"></div>
    </div>
  </div>
</div>

<div class="row row-cards g-3">
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Trafik Pengunjung (Area Chart)</h5>
      </div>
      <div class="card-body">
        <div id="chart-area-demo"></div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Volume Penjualan (Bar Chart)</h5>
      </div>
      <div class="card-body">
        <div id="chart-bar-demo"></div>
      </div>
    </div>
  </div>
</div>
@endsection