@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Progress Bars -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Progress Bars</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between small text-muted mb-1">
            <span>Penyimpanan Server</span>
            <span>25%</span>
          </div>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"></div>
          </div>
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-between small text-muted mb-1">
            <span>Progres Proyek</span>
            <span>60%</span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 60%"></div>
          </div>
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-between small text-muted mb-1">
            <span>Proses Download</span>
            <span>85%</span>
          </div>
          <div class="progress" style="height: 10px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 85%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Spinners & Skeletons -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Spinners & Skeleton Placeholders</h5>
      </div>
      <div class="card-body">
        <div class="mb-4">
          <div class="small text-muted mb-2">Spinners:</div>
          <div class="d-flex align-items-center gap-3">
            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
            <div class="spinner-border text-success spinner-border-sm" role="status"></div>
            <div class="spinner-grow text-danger" role="status"></div>
            <div class="spinner-grow text-warning spinner-grow-sm" role="status"></div>
          </div>
        </div>
        <div>
          <div class="small text-muted mb-2">Skeleton Placeholder:</div>
          <div class="placeholder-glow">
            <span class="placeholder col-7 bg-secondary"></span>
            <span class="placeholder col-4 bg-secondary"></span>
            <span class="placeholder col-4 bg-secondary"></span>
            <span class="placeholder col-6 bg-secondary"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection