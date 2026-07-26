@extends('layouts.dashboard')

@section('dashboard_content')
<div class="row row-cards g-3">
  <!-- Basic Table -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title m-0">Tabel Standard dengan Avatar & Badge</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-vcenter card-table">
          <thead>
            <tr>
              <th>Pengguna</th>
              <th>Peran</th>
              <th>Tanggal Gabung</th>
              <th>Status</th>
              <th class="text-end">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-primary-subtle text-primary me-2">JD</span>
                  <div>
                    <div class="fw-semibold">John Doe</div>
                    <div class="small text-muted">john.doe@example.com</div>
                  </div>
                </div>
              </td>
              <td>Administrator</td>
              <td>12 Jan 2026</td>
              <td><span class="badge bg-success">Aktif</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="pencil" /></button>
                <button class="btn btn-sm btn-icon btn-ghost-danger"><x-icon name="trash" /></button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-success-subtle text-success me-2">JS</span>
                  <div>
                    <div class="fw-semibold">Jane Smith</div>
                    <div class="small text-muted">jane.smith@example.com</div>
                  </div>
                </div>
              </td>
              <td>Editor</td>
              <td>15 Feb 2026</td>
              <td><span class="badge bg-success">Aktif</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="pencil" /></button>
                <button class="btn btn-sm btn-icon btn-ghost-danger"><x-icon name="trash" /></button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <span class="at-avatar bg-danger-subtle text-danger me-2">BW</span>
                  <div>
                    <div class="fw-semibold">Bruce Wayne</div>
                    <div class="small text-muted">bruce@wayne.com</div>
                  </div>
                </div>
              </td>
              <td>User</td>
              <td>01 Mar 2026</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-icon btn-ghost-secondary"><x-icon name="pencil" /></button>
                <button class="btn btn-sm btn-icon btn-ghost-danger"><x-icon name="trash" /></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Striped & Bordered Table -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title m-0">Tabel Striped & Bordered</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered card-table">
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>Pelanggan</th>
              <th>Total</th>
              <th>Metode Pembayaran</th>
              <th>Status Transaksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#TRX-9901</td>
              <td>Ahmad Dahlan</td>
              <td>Rp 250.000</td>
              <td>Transfer Bank</td>
              <td><span class="badge bg-success">Selesai</span></td>
            </tr>
            <tr>
              <td>#TRX-9902</td>
              <td>Budi Santoso</td>
              <td>Rp 1.200.000</td>
              <td>E-Wallet</td>
              <td><span class="badge bg-success">Selesai</span></td>
            </tr>
            <tr>
              <td>#TRX-9903</td>
              <td>Citra Dewi</td>
              <td>Rp 450.000</td>
              <td>Kartu Kredit</td>
              <td><span class="badge bg-danger">Gagal</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection