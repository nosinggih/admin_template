@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Avatar Sizes -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Ukuran Avatar</h5>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 flex-wrap">
          <div class="text-center">
            <span class="at-avatar bg-primary text-white" style="width: 1.75rem; height: 1.75rem; font-size: 0.75rem;">SM</span>
            <div class="small text-muted mt-1">Small</div>
          </div>
          <div class="text-center">
            <span class="at-avatar bg-primary text-white">MD</span>
            <div class="small text-muted mt-1">Medium</div>
          </div>
          <div class="text-center">
            <span class="at-avatar bg-primary text-white" style="width: 3.25rem; height: 3.25rem; font-size: 1.2rem;">LG</span>
            <div class="small text-muted mt-1">Large</div>
          </div>
          <div class="text-center">
            <span class="at-avatar bg-primary text-white" style="width: 4.5rem; height: 4.5rem; font-size: 1.75rem;">XL</span>
            <div class="small text-muted mt-1">X-Large</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Avatar Shapes & Groups -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Bentuk & Avatar Group</h5>
      </div>
      <div class="card-body">
        <div class="mb-4">
          <div class="small text-muted mb-2">Bentuk Avatar:</div>
          <div class="d-flex align-items-center gap-3">
            <span class="at-avatar bg-secondary text-white rounded">Rounded</span>
            <span class="at-avatar bg-success text-white rounded-circle">Circle</span>
            <span class="at-avatar bg-danger text-white rounded-0">Square</span>
          </div>
        </div>
        <div>
          <div class="small text-muted mb-2">Avatar Group:</div>
          <div class="d-flex align-items-center">
            <span class="at-avatar bg-primary text-white border border-2 border-white rounded-circle me-n2">AB</span>
            <span class="at-avatar bg-success text-white border border-2 border-white rounded-circle me-n2">CD</span>
            <span class="at-avatar bg-warning text-white border border-2 border-white rounded-circle me-n2">EF</span>
            <span class="at-avatar bg-info text-white border border-2 border-white rounded-circle">+5</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection