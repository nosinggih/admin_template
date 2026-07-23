# Admin Template (Bootstrap 5)

> Admin Dashboard Template open-source modern, responsif, dan kaya komponen berbasis **Bootstrap 5.3**, **Eleventy (11ty)**, **Dart Sass**, **esbuild**, **Tabler Icons**, dan **ApexCharts**.

---

## ✨ Fitur Utama

- 🎨 **Design System Modern:** Berbasis Bootstrap 5.3 dengan override token warna disesuaikan (Primary `#206bc4`).
- 🌙 **Dark Mode Bawaan:** Integrasi native atribut `data-bs-theme="light|dark"` dengan persistensi `localStorage` tanpa FOUT (*Flash of Unstyled Theme*).
- 🧩 **Modular Templating:** Shell dashboard (sidebar, navbar, footer) dibuat sekali menggunakan partials Nunjucks.
- 📊 **Tampilan Data & Charts:** ApexCharts terintegrasi dengan penyesuaian otomatis saat toggle mode gelap.
- ⚡ **Bundler Cepat:** SCSS dikompilasi via Dart Sass & JS via esbuild tanpa React/Vue/jQuery dependencies berat.
- 📱 **100% Responsif:** Diuji rapi pada breakpoint 375px (Mobile), 768px (Tablet), dan 1440px (Desktop).

---

## 📁 Struktur Direktori

```
admin-template/
├── .eleventy.js               # Konfigurasi Eleventy 11ty
├── package.json               # Dependensi & NPM scripts
├── README.md                  # Dokumentasi proyek
├── LICENSE                    # Lisensi MIT
├── src/
│   ├── _data/
│   │   ├── site.json          # Metadata situs (nama, versi)
│   │   └── nav.js             # Single source of truth menu sidebar
│   ├── _includes/
│   │   ├── layouts/
│   │   │   ├── base.njk       # HTML base shell
│   │   │   ├── dashboard.njk  # Layout dashboard utama
│   │   │   └── auth.njk       # Layout auth minimal
│   │   └── partials/
│   │       ├── sidebar.njk    # Render menu dinamis
│   │       ├── navbar.njk     # Header & toggle mode
│   │       ├── footer.njk     # Footer halaman
│   │       └── page-header.njk # Judul & breadcrumb
│   ├── scss/
│   │   ├── _variables.scss    # Override variabel Bootstrap
│   │   ├── _theme.scss        # Dark mode & token custom
│   │   ├── _components.scss   # Komponen kustom (prefiks at-)
│   │   └── app.scss           # SCSS entry point
│   ├── js/
│   │   ├── app.js             # JS entry point bundle
│   │   └── modules/           # Modul JS (theme, sidebar, charts, datatable)
│   └── pages/                 # Halaman Nunjucks (.njk)
│       ├── index.njk          # Dashboard utama
│       ├── dashboard-analytics.njk
│       ├── auth/              # Halaman Login, Register, Lupa Password
│       ├── errors/            # Halaman 404, 500, Maintenance
│       ├── components/        # Showcase komponen UI dasar
│       ├── forms/             # Showcase form & input
│       ├── tables/            # Showcase tabel & stat cards
│       ├── users/             # Trio CRUD Pengguna (list, detail, form)
│       └── charts/            # ApexCharts showcase
└── dist/                      # Output build siap rilis (auto-generated)
```

---

## 🚀 Panduan Penggunaan

### 1. Prasyarat
- Node.js versi LTS (>= 20.0)
- npm (Node Package Manager)

### 2. Instalasi
```bash
# Clone repository
git clone https://github.com/nosinggih/admin_template.git
cd admin_template

# Install dependensi
npm install
```

### 3. Mode Pengembang (Development)
Menjalankan watch SCSS, JS, dan Eleventy dev server dengan live-reload:
```bash
npm run dev
# atau
npm run serve
```
Buka browser Anda di `http://localhost:8080/`.

### 4. Build Produksi
Kompilasi dan minifikasi file untuk produksi:
```bash
npm run build
```
Hasil build produksi akan tersimpan di folder `dist/` dan dapat didistribusikan ke server mana pun.

---

## 📝 Cara Menambah Halaman Baru

1. Buat file `.njk` baru di dalam folder `src/pages/` (misalnya `src/pages/laporan.njk`).
2. Tentukan layout dan metadata di bagian front matter:
   ```njk
   ---
   layout: layouts/dashboard.njk
   title: Laporan Bulanan
   breadcrumb:
     - { label: "Home", url: "/" }
     - { label: "Laporan" }
   ---
   <div class="card">
     <div class="card-body">
       <!-- Konten Anda di sini -->
     </div>
   </div>
   ```
3. Tambahkan tautan menu baru ke dalam `src/_data/nav.js` jika ingin ditampilkan pada sidebar.

---

## 📜 Lisensi

Lisensi under [MIT License](LICENSE).
