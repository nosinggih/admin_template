@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Basic File Upload -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Input File Standard</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Dokumen Single</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Upload Beberapa File (Multiple)</label>
          <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Ukuran Input Kecil (Small)</label>
          <input class="form-control form-control-sm" id="formFileSm" type="file">
        </div>
      </div>
    </div>
  </div>

  <!-- Drag and Dropzone -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Drag & Dropzone Area</h5>
      </div>
      <div class="card-body">
        <div class="border border-2 border-dashed border-primary-subtle rounded p-4 text-center bg-body-tertiary">
          <div class="text-primary mb-2 display-6">
            <x-icon name="cloud-upload" />
          </div>
          <h6 class="fw-bold mb-1">Tarik & Lepaskan File di Sini</h6>
          <p class="small text-muted mb-3">Mendukung format PNG, JPG, PDF hingga ukuran maksimal 10MB.</p>
          <label class="btn btn-sm btn-primary">
            <x-icon name="folder-plus" /> Telusuri File
            <input type="file" class="d-none">
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection