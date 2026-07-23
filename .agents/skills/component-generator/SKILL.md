---
name: component-generator
description: >
  Generate halaman showcase komponen Nunjucks (.njk) dari template standar untuk
  admin template. Gunakan skill ini saat mengerjakan task Fase 2 (2.1-2.10) dan Fase 4 (4.1-4.5).
  Input: nama komponen + daftar varian. Output: file .njk lengkap dengan layout dashboard.
---

# Component Generator — Admin Template

## Kapan Digunakan
Trigger skill ini ketika user meminta:
- "buat halaman showcase [nama komponen]"
- "kerjakan task 2.x" atau "kerjakan task 4.x"
- "buat demo page untuk buttons/cards/forms/dll"

## Template Standar Halaman Komponen

Setiap halaman showcase HARUS mengikuti pola ini persis:

`
jk
---
layout: layouts/dashboard.njk
title: [Nama Komponen]
breadcrumb:
  - label: "Home"
    url: "/"
  - label: "Components"
    url: "/components/"
  - label: "[Nama Komponen]"
---
<div class="container-xl">
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">[Nama Komponen]</h2>
      </div>
    </div>
  </div>

  <div class="page-body">
    {# === SECTION TIAP VARIAN === #}
    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">[Nama Varian]</h3>
      </div>
      <div class="card-body">
        {# Demo komponen di sini #}
      </div>
    </div>
  </div>
</div>
`

## Checklist per Halaman Komponen
- [ ] Extend layout dashboard.njk
- [ ] Ada breadcrumb yang benar
- [ ] Tiap varian dikelompokkan dalam card terpisah
- [ ] Komponen bekerja di light DAN dark mode
- [ ] Tidak ada hardcode warna (gunakan kelas Bootstrap)
- [ ] Ikon menggunakan shortcode: {% icon "nama-ikon" %}

## Mapping Task ke File Output

| Task | File Output | Komponen |
|---|---|---|
| 2.1 | pages/components/buttons.njk | btn-*, group, dropdown |
| 2.2 | pages/components/alerts.njk | alert, toast, badge |
| 2.3 | pages/components/cards.njk | card variants, stat card |
| 2.4 | pages/components/avatars.njk | avatar sizes, group |
| 2.5 | pages/components/modals.njk | modal, offcanvas |
| 2.6 | pages/components/navigation.njk | tabs, accordion, pagination |
| 2.7 | pages/components/progress.njk | progress, spinner, skeleton |
| 2.8 | pages/components/overlays.njk | tooltip, popover |
| 2.9 | pages/components/lists.njk | list-group, timeline, stepper |
| 2.10 | pages/components/empty.njk | empty state |
| 4.1 | pages/forms/inputs.njk | input, textarea, select |
| 4.2 | pages/forms/controls.njk | checkbox, radio, switch |
| 4.3 | pages/forms/validation.njk | valid/invalid states |
| 4.4 | pages/forms/upload.njk | file upload, dropzone |
| 4.5 | pages/forms/layout.njk | form horizontal, wizard |
