---
name: scaffold-project
description: >
  Buat struktur folder dan file placeholder untuk admin template project sesuai
  spesifikasi di RENCANA_ADMIN_TEMPLATE.md Bagian 2. Gunakan skill ini saat
  mengerjakan task [0.1] — inisialisasi struktur proyek.
---

# Scaffold Project — Admin Template

## Kapan Digunakan
Trigger skill ini ketika user meminta:
- "buat struktur folder project"
- "inisialisasi admin template"
- "kerjakan task 0.1"
- "setup proyek baru admin template"

## Langkah Eksekusi

### 1. Buat package.json
Gunakan `npm init -y` lalu update fields berikut:
- name: admin-template
- version: 0.1.0
- private: true

### 2. Install Dependencies (sesuai versi terkunci)
`npm install bootstrap@5.3.3 @tabler/icons@^3 apexcharts@^3 @fontsource/inter@^5`
`npm install -D @11ty/eleventy@^3 sass@^1.77 esbuild@^0.21 npm-run-all@^4`

### 3. Buat Struktur Folder
Buat semua direktori berikut (kosong, dengan .gitkeep):
- src/_data/
- src/_includes/layouts/
- src/_includes/partials/
- src/scss/
- src/js/modules/
- src/assets/img/
- src/pages/auth/
- src/pages/errors/
- src/pages/components/
- src/pages/forms/
- src/pages/tables/
- src/pages/charts/
- src/pages/users/
- dist/

### 4. Buat File Placeholder
File-file ini harus ADA (boleh kosong/minimal) setelah task ini:
- .eleventy.js
- src/_data/site.json
- src/_data/nav.js
- src/_includes/layouts/base.njk
- src/_includes/layouts/dashboard.njk
- src/_includes/layouts/auth.njk
- src/_includes/partials/sidebar.njk
- src/_includes/partials/navbar.njk
- src/_includes/partials/footer.njk
- src/_includes/partials/page-header.njk
- src/scss/_variables.scss
- src/scss/_theme.scss
- src/scss/_components.scss
- src/scss/app.scss
- src/js/app.js
- src/js/modules/theme.js
- src/js/modules/sidebar.js
- src/js/modules/charts.js
- src/js/modules/datatable.js
- src/pages/index.njk
- .gitignore
- README.md (minimal)

### 5. Isi .gitignore
`node_modules/`, `dist/`, `.cache/`, `*.DS_Store`

## Validasi (Done When)
- `npm install` sukses (node_modules ada)
- Semua file dan folder di atas ada
- `npx eleventy --dryrun` tidak error fatal
