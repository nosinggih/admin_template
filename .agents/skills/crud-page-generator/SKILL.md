---
name: crud-page-generator
description: >
  Generate trio halaman CRUD (list + detail + form) dari definisi entity untuk
  admin template. Gunakan skill ini saat mengerjakan task [5.6] atau menambah
  entitas baru di proyek yang diturunkan dari template ini.
---

# CRUD Page Generator — Admin Template

## Kapan Digunakan
Trigger skill ini ketika user meminta:
- "buat halaman CRUD untuk [entity]"
- "kerjakan task 5.6"
- "generate user-list, user-detail, user-form"

## Pola 3 Halaman

### List Page (datatable)
File: `pages/[entity]/[entity]-list.njk`
Fitur:
- Tabel responsif dengan datatable.js
- Kolom: checkbox, data entity, badge status, kolom aksi (view/edit/delete)
- Tombol "Tambah [Entity]" di header
- Search input + pagination

### Detail Page (read-only)
File: `pages/[entity]/[entity]-detail.njk`
Fitur:
- Card dengan semua field entity
- Tombol Edit dan Hapus di header
- Breadcrumb: Home → [Entity] List → Detail

### Form Page (add/edit)
File: `pages/[entity]/[entity]-form.njk`
Fitur:
- Form dengan semua field entity
- Validasi HTML5 + feedback Bootstrap
- Tombol Save dan Cancel
- Breadcrumb: Home → [Entity] List → Tambah/Edit

## Template List Page
`
jk
---
layout: layouts/dashboard.njk
title: Daftar [Entity]
breadcrumb:
  - { label: "Home", url: "/" }
  - { label: "[Entity]" }
---
<div class="container-xl">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">Daftar [Entity]</h2>
      </div>
      <div class="col-auto ms-auto">
        <a href="/[entity]/form/" class="btn btn-primary">
          {% icon "plus" %} Tambah [Entity]
        </a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="input-group">
        <input type="text" id="at-search" class="form-control" placeholder="Cari...">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" id="at-datatable">
        {# thead + tbody di sini #}
      </table>
    </div>
  </div>
</div>
`

## Konvensi Penamaan
- File: kebab-case: user-list.njk, user-detail.njk, user-form.njk
- ID elemen: at-search, at-datatable (untuk datatable.js hook)
- URL: /users/list/, /users/detail/, /users/form/
