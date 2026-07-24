@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Default Buttons -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title m-0">Solid Buttons</h5>
      </div>
      <div class="card-body">
        <div class="d-flex flex-wrap gap-2">
          <button type="button" class="btn btn-primary">Primary</button>
          <button type="button" class="btn btn-secondary">Secondary</button>
          <button type="button" class="btn btn-success">Success</button>
          <button type="button" class="btn btn-info text-white">Info</button>
          <button type="button" class="btn btn-warning text-white">Warning</button>
          <button type="button" class="btn btn-danger">Danger</button>
          <button type="button" class="btn btn-light">Light</button>
          <button type="button" class="btn btn-dark">Dark</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Outline Buttons -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title m-0">Outline Buttons</h5>
      </div>
      <div class="card-body">
        <div class="d-flex flex-wrap gap-2">
          <button type="button" class="btn btn-outline-primary">Primary</button>
          <button type="button" class="btn btn-outline-secondary">Secondary</button>
          <button type="button" class="btn btn-outline-success">Success</button>
          <button type="button" class="btn btn-outline-info">Info</button>
          <button type="button" class="btn btn-outline-warning">Warning</button>
          <button type="button" class="btn btn-outline-danger">Danger</button>
          <button type="button" class="btn btn-outline-dark">Dark</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Icon & Size Buttons -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Icon Buttons & Ukuran</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="small text-muted mb-2">Ukuran Button:</div>
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-primary btn-lg">Large</button>
            <button type="button" class="btn btn-primary">Normal</button>
            <button type="button" class="btn btn-primary btn-sm">Small</button>
          </div>
        </div>
        <div>
          <div class="small text-muted mb-2">Icon Buttons:</div>
          <div class="d-flex flex-wrap gap-2">
            <button type="button" class="btn btn-primary">
              <x-icon name="plus" /> Tambah Data
            </button>
            <button type="button" class="btn btn-outline-danger">
              <x-icon name="trash" /> Hapus
            </button>
            <button type="button" class="btn btn-icon btn-secondary" title="Setting">
              <x-icon name="settings" />
            </button>
            <button type="button" class="btn btn-icon btn-outline-primary" title="Download">
              <x-icon name="download" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Button Groups & Dropdowns -->
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0">Button Groups & Dropdowns</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="small text-muted mb-2">Button Group:</div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-primary">Kiri</button>
            <button type="button" class="btn btn-outline-primary">Tengah</button>
            <button type="button" class="btn btn-outline-primary">Kanan</button>
          </div>
        </div>
        <div>
          <div class="small text-muted mb-2">Dropdown Buttons:</div>
          <div class="d-flex flex-wrap gap-2">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Aksi Utama
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Edit</a></li>
                <li><a class="dropdown-item" href="#">Duplikat</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-secondary">Split Button</button>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Opsi 1</a></li>
                <li><a class="dropdown-item" href="#">Opsi 2</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection