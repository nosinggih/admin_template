# Rencana Pembangunan Admin Template (Bootstrap 5) — Setara Tabler

> Dokumen ini adalah **spesifikasi eksekusi**. Ditujukan untuk dijalankan oleh AI agent
> secara bertahap, satu task pada satu waktu. Semua keputusan sudah dikunci agar agent
> tidak perlu menebak. Jika ada yang ambigu, **berhenti dan tanya**, jangan berimprovisasi.

---

## 0. Tujuan & Prinsip

**Tujuan:** membangun admin dashboard template open-source berbasis Bootstrap 5, dengan
kelengkapan setara Tabler/AdminLTE (banyak komponen + banyak halaman), yang bisa dipakai
ulang untuk berbagai proyek.

**Prinsip kerja (WAJIB dipatuhi agent):**
1. Kerjakan **satu task** dari daftar, selesaikan sampai memenuhi *Definition of Done*, baru lanjut.
2. **Jangan menambah dependency baru** di luar daftar terkunci (Bagian 1). Jika merasa perlu, berhenti dan tanya.
3. **Jangan mengubah keputusan terkunci** (warna, versi, struktur folder, penamaan).
4. Selalu **ikuti pola dari contoh lengkap** di Bagian 7. Konsistensi lebih penting daripada kreativitas.
5. Tulis kode yang **bersih, ter-indentasi rapi, dengan komentar seperlunya**. Tanpa kode mati.
6. Setelah tiap task, jalankan build dan pastikan **tidak ada error**.

---

## 1. Keputusan Terkunci (JANGAN diubah)

| Aspek | Keputusan | Versi |
|---|---|---|
| CSS framework | Bootstrap | `5.3.3` |
| Preprocessor | Dart Sass | `^1.77` |
| Static site generator + templating | Eleventy (11ty) + Nunjucks | `@11ty/eleventy@^3` |
| Bundler JS | esbuild | `^0.21` |
| Ikon | Tabler Icons (SVG, via npm `@tabler/icons`) | `^3` |
| Chart | ApexCharts | `^3` |
| Font | Inter (self-hosted via `@fontsource/inter`) | `^5` |
| Package manager | npm | — |
| Bahasa JS | Vanilla JS (ES Modules). **Tanpa** React/Vue/jQuery. | — |
| Node | LTS (>= 20) | — |

**Kenapa 11ty + Nunjucks:** shell dashboard (sidebar, navbar, footer) ditulis **sekali** sebagai
partial, lalu dipakai ulang di semua halaman. Ini menghilangkan copy-paste antar puluhan file HTML —
sumber error terbesar bagi agent murah.

---

## 2. Struktur Folder (buat persis seperti ini)

```
admin-template/
├── .eleventy.js               # konfigurasi 11ty
├── package.json
├── README.md
├── src/
│   ├── _data/
│   │   ├── site.json          # meta situs (nama, versi)
│   │   └── nav.js             # struktur menu sidebar (satu sumber kebenaran)
│   ├── _includes/
│   │   ├── layouts/
│   │   │   ├── base.njk       # <html> shell, load css/js
│   │   │   └── dashboard.njk  # base + sidebar + navbar + footer
│   │   └── partials/
│   │       ├── sidebar.njk
│   │       ├── navbar.njk
│   │       ├── footer.njk
│   │       └── page-header.njk
│   ├── scss/
│   │   ├── _variables.scss    # override variabel Bootstrap (Bagian 3)
│   │   ├── _theme.scss        # token kustom + dark mode
│   │   ├── _components.scss   # komponen kustom (di luar bawaan Bootstrap)
│   │   └── app.scss           # entry: import variables → bootstrap → theme → components
│   ├── js/
│   │   ├── app.js             # entry esbuild
│   │   └── modules/           # satu file per fitur JS
│   ├── assets/
│   │   └── img/
│   └── pages/                 # tiap .njk = satu halaman HTML
│       ├── index.njk          # dashboard utama
│       ├── auth/
│       ├── errors/
│       ├── components/
│       └── ...
└── dist/                      # OUTPUT build (jangan diedit manual)
```

---

## 3. Design System (nilai konkret — pakai apa adanya)

### Warna (override variabel Bootstrap di `_variables.scss`)
```scss
$primary:   #206bc4;
$secondary: #6c757d;
$success:   #2fb344;
$info:      #4299e1;
$warning:   #f59f00;
$danger:    #d63939;
$light:     #f5f7fb;
$dark:      #182433;

$body-bg:        #f5f7fb;   // background aplikasi (mode terang)
$body-color:     #1e293b;
$border-color:   #e6e7e9;
```

### Tipografi
```scss
$font-family-sans-serif: "Inter", system-ui, -apple-system, sans-serif;
$font-size-base:  0.875rem;  // 14px, khas admin template
$headings-font-weight: 600;
$line-height-base: 1.4285714;
```

### Bentuk & jarak
```scss
$border-radius:    4px;
$border-radius-sm: 3px;
$border-radius-lg: 6px;
$card-border-radius: 4px;
$box-shadow-sm: 0 1px 2px rgba(0,0,0,.05);
```

### Dark mode
Gunakan mekanisme bawaan Bootstrap 5.3: atribut `data-bs-theme="light|dark"` pada `<html>`.
Toggle disimpan di `localStorage` (lihat modul JS `theme.js` di Bagian 6, Fase 6).
**Jangan** membuat sistem dark mode kustom sendiri.

---

## 4. Aturan Kerja untuk AI Agent

### Definition of Done (berlaku untuk SETIAP task)
Sebuah task dianggap selesai HANYA jika **semua** terpenuhi:
- [ ] Semua file yang disebut di task sudah dibuat/diubah dengan benar.
- [ ] `npm run build` berjalan **tanpa error**.
- [ ] Halaman/komponen tampil benar di mode **terang DAN gelap**.
- [ ] Responsif: tidak ada elemen bocor/overflow di lebar 375px, 768px, 1440px.
- [ ] Mengikuti pola & penamaan dari Bagian 7.
- [ ] Tidak menambah dependency di luar Bagian 1.

### Konvensi
- **Penamaan file:** `kebab-case` (mis. `user-list.njk`, `theme-toggle.js`).
- **Kelas CSS kustom:** prefiks `at-` (admin template), mis. `.at-sidebar`, `.at-avatar`.
  Utamakan kelas utilitas Bootstrap dulu; buat kelas kustom hanya bila perlu.
- **Menu sidebar:** hanya diedit lewat `src/_data/nav.js`. Jangan hardcode `<li>` di partial.
- **Ikon:** ambil dari `@tabler/icons`, disisipkan sebagai inline SVG lewat helper/shortcode 11ty.
- **Komentar:** Bahasa Indonesia, singkat, hanya untuk bagian yang tidak jelas.

---

## 5. Format Task (template yang dipakai di Bagian 6)

Setiap task ditulis dalam format ini agar mudah dieksekusi:

```
### [ID] Judul task
- Depends on: [ID lain / -]
- Files: daftar file yang dibuat/diubah
- Steps:
  1. ...
  2. ...
- Done when: kriteria yang bisa dicek mata/terminal
```

---

## 6. Fase & Daftar Task

### FASE 0 — Setup Proyek & Tooling
- **[0.1]** Inisialisasi `package.json`, install semua dependency Bagian 1, buat struktur folder Bagian 2 (folder kosong + file placeholder). *Done when:* `npm install` sukses, struktur folder sesuai.
- **[0.2]** Konfigurasi `.eleventy.js`: input `src`, output `dist`, passthrough `assets`, tambahkan shortcode `icon` (render SVG Tabler inline). *Done when:* `npx eleventy` menghasilkan folder `dist`.
- **[0.3]** Pipeline SCSS: script npm `build:css` = kompilasi `src/scss/app.scss` → `dist/css/app.css`. `app.scss` mengimpor variabel → Bootstrap → theme → components. *Done when:* `app.css` ter-generate, warna primary = `#206bc4`.
- **[0.4]** Pipeline JS: script `build:js` = esbuild `src/js/app.js` → `dist/js/app.js` (bundle Bootstrap JS + modul). *Done when:* `app.js` ter-bundle tanpa error.
- **[0.5]** Script gabungan di `package.json`: `dev` (watch 11ty+scss+js paralel, mis. via `npm-run-all`), `build` (produksi + minify). *Done when:* `npm run dev` menyajikan situs di localhost dengan live-reload.

### FASE 1 — Design System & Shell Layout (fondasi — kerjakan hati-hati)
- **[1.1]** Isi `_variables.scss` & `_theme.scss` dengan semua nilai Bagian 3. *Done when:* build memakai warna/font/radius yang benar.
- **[1.2]** `layouts/base.njk`: shell `<html>`, load font Inter, `app.css`, `app.js`, set `data-bs-theme`. *Done when:* halaman kosong ter-render dengan font Inter.
- **[1.3]** `_data/nav.js`: definisikan struktur menu (array of objek: label, ikon, url, children). Isi minimal 8 grup menu placeholder.
- **[1.4]** `partials/sidebar.njk`: render menu dari `nav.js`, dukung submenu collapse, highlight item aktif. *Done when:* sidebar tampil, submenu bisa buka-tutup, item halaman aktif ter-highlight.
- **[1.5]** `partials/navbar.njk`: top bar — tombol toggle sidebar (mobile), search, notifikasi dropdown, avatar dropdown, toggle dark mode.
- **[1.6]** `partials/footer.njk` + `partials/page-header.njk` (judul halaman + breadcrumb).
- **[1.7]** `layouts/dashboard.njk`: gabungkan sidebar + navbar + `{{ content }}` + footer jadi layout dashboard responsif (sidebar collapse di mobile). *Done when:* layout utuh, responsif di 3 breakpoint. **Ini adalah contoh lengkap di Bagian 7 — ikuti persis.**

### FASE 2 — Komponen UI Dasar (satu halaman showcase per grup di `pages/components/`)
Buat halaman demo untuk tiap kelompok berikut (pakai layout dashboard):
- **[2.1]** Buttons, button group, dropdowns
- **[2.2]** Alerts, toasts, badges, ribbons, status indicators
- **[2.3]** Cards (basic, dengan header/footer, stat card, card dengan aksi)
- **[2.4]** Avatars (ukuran, bentuk, avatar group, dengan status online)
- **[2.5]** Modals & offcanvas
- **[2.6]** Tabs, accordion, breadcrumb, pagination
- **[2.7]** Progress bar, spinner, placeholder/skeleton
- **[2.8]** Tooltip, popover
- **[2.9]** List group, timeline, steps/stepper
- **[2.10]** Empty state

### FASE 3 — Tampilan Data
- **[3.1]** Tabel: basic, striped, hover, bordered, responsive, dengan avatar & badge di sel, kolom aksi.
- **[3.2]** Tabel interaktif (sort + search + pagination) — pakai JS vanilla di modul `datatable.js` (tanpa library berat).
- **[3.3]** Halaman Charts: line, area, bar, donut, sparkline — via ApexCharts (modul `charts.js`).
- **[3.4]** Stat/metric cards untuk dashboard (angka + tren + mini chart).
- **[3.5]** Halaman Datatables Lanjutan: showcase tabel interaktif dengan paging dinamis, search highlighting, dan export CSV.

### FASE 4 — Form & Input
- **[4.1]** Input dasar, textarea, select, input group, label & help text.
- **[4.2]** Checkbox, radio, switch, range, color picker.
- **[4.3]** State validasi (valid/invalid), pesan error.
- **[4.4]** File upload / dropzone (styling; JS opsional).
- **[4.5]** Halaman contoh "Form Layout" (form horizontal, wizard/stepper sederhana).
- **[4.6]** Input Form Lanjutan: Date/Time Picker dan Autocomplete Dropdown (Tom Select).

### FASE 5 — Halaman (Pages)
- **[5.1]** Dashboard utama (`index.njk`): gabungan stat card + chart + tabel aktivitas terbaru.
- **[5.2]** Dashboard varian analitik (grid chart lebih padat).
- **[5.3]** Auth: `login`, `register`, `forgot-password`, `reset-password`, `lock-screen` (pakai layout auth minimal, bukan dashboard).
- **[5.4]** Error: `404`, `500`, `maintenance`.
- **[5.5]** Profil pengguna + Pengaturan akun (tab: profil, keamanan, notifikasi).
- **[5.6]** Contoh CRUD lengkap: `user-list` (datatable), `user-detail`, `user-form` (tambah/edit).
- **[5.7]** Halaman `Icons` (galeri Tabler Icons) & halaman `blank` (starter kosong).
- **[5.8]** Landing Page Pemasaran: Halaman pemasaran interaktif, responsif dengan menu, hero, features grid, pricing, dan testimonials.

### FASE 6 — Interaktivitas (modul JS di `src/js/modules/`)
- **[6.1]** `theme.js`: toggle dark/light + simpan ke `localStorage` + baca saat load.
- **[6.2]** `sidebar.js`: collapse/expand, state di localStorage, auto-collapse di mobile.
- **[6.3]** `datatable.js`, `charts.js` (dipakai Fase 3).
- **[6.4]** `app.js`: inisialisasi tooltip/popover Bootstrap + import semua modul.
- **[6.5]** `advanced-form.js`: inisialisasi input lanjutan (Flatpickr dan Tom Select).

### FASE 7 — Polish & Dokumentasi
- **[7.1]** Uji dark mode di SEMUA halaman, perbaiki kontras.
- **[7.2]** Uji responsif semua halaman di 375/768/1440px.
- **[7.3]** `README.md`: cara install, `npm run dev`, `npm run build`, struktur folder, cara menambah halaman baru.

### FASE 8 — Build & Paket
- **[8.1]** `npm run build` produksi: minify CSS/JS, output final di `dist/`.
- **[8.2]** Verifikasi `dist/` bisa dibuka langsung (semua path relatif benar).
- **[8.3]** Tambah lisensi MIT + bersihkan file sampah.

---

## 7. Contoh Task Lengkap (POLA untuk ditiru di semua task lain)

> Ini menunjukkan tingkat detail & gaya yang diharapkan. Agent harus meniru pola ini.

### [1.7] Layout dashboard responsif
- **Depends on:** 1.2, 1.4, 1.5, 1.6
- **Files:** `src/_includes/layouts/dashboard.njk`
- **Steps:**
  1. Extend `base.njk`.
  2. Susun grid: sidebar kiri (lebar 250px, fixed di desktop) + area konten kanan.
  3. Area kanan berisi: `navbar` (atas) → `page-header` → `{{ content }}` (dibungkus `.container-fluid`) → `footer`.
  4. Di layar `< lg`, sidebar jadi offcanvas (tersembunyi, dibuka tombol di navbar).

**Kerangka `dashboard.njk` yang diharapkan:**
```njk
---
layout: layouts/base.njk
---
<div class="at-layout">
  {% include "partials/sidebar.njk" %}
  <div class="at-content">
    {% include "partials/navbar.njk" %}
    <main class="container-fluid py-3">
      {% include "partials/page-header.njk" %}
      {{ content | safe }}
    </main>
    {% include "partials/footer.njk" %}
  </div>
</div>
```

**SCSS pendukung (di `_components.scss`):**
```scss
.at-layout { display: flex; min-height: 100vh; }
.at-content { flex: 1 1 auto; min-width: 0; }
@include media-breakpoint-up(lg) {
  .at-sidebar { width: 250px; flex: 0 0 250px; }
}
```

**Contoh pemakaian di sebuah halaman (`pages/index.njk`):**
```njk
---
layout: layouts/dashboard.njk
title: Dashboard
breadcrumb: [{ label: "Home", url: "/" }, { label: "Dashboard" }]
---
<div class="row row-cards">
  <div class="col-md-3">{# stat card di sini #}</div>
</div>
```

- **Done when:**
  - Sidebar tampil fixed di desktop, jadi offcanvas di mobile.
  - Konten tidak overflow di 375px.
  - Layout benar di mode terang & gelap.
  - `npm run build` tanpa error.

---

## 8. Urutan Eksekusi

Kerjakan **berurutan**: Fase 0 → 1 → 2 → 3 → 4 → 5 → 6 → 7 → 8.
Dalam satu fase, kerjakan task sesuai nomor. Fase 1 adalah fondasi — **jangan lanjut ke Fase 2
sebelum Fase 1 benar-benar solid** (shell layout salah = semua halaman ikut salah).

Diagram dependency inti:
```
Fase 0 (tooling) → Fase 1 (shell) → { Fase 2, 3, 4 komponen } → Fase 5 (halaman merakit komponen)
Fase 6 (JS) menempel di komponen/halaman terkait → Fase 7 (polish) → Fase 8 (build)
```

---

## 9. Checklist QA Akhir (verifikasi sebelum menyatakan selesai)

- [ ] Semua halaman di Fase 5 ada dan bisa dibuka.
- [ ] Semua komponen Fase 2–4 punya halaman showcase.
- [ ] Dark mode berfungsi & konsisten di semua halaman.
- [ ] Responsif di 375 / 768 / 1440 px tanpa overflow.
- [ ] Menu sidebar hanya bersumber dari `nav.js`.
- [ ] `npm run build` bersih, `dist/` bisa dibuka langsung.
- [ ] Tidak ada dependency di luar Bagian 1.
- [ ] README menjelaskan cara pakai & cara menambah halaman.
- [ ] Lisensi MIT terpasang.

---

## Catatan untuk yang menugaskan (kamu)
- Total task ± 45 unit kecil. Kalau pakai agent murah, **suapkan per-task atau per-fase**, jangan
  seluruh dokumen sekaligus — hasilnya lebih terkendali.
- Kalau nanti mau menurunkan template ini untuk kebutuhan aset/BMN, tinggal salin `pages/blank.njk`
  sebagai starter dan tambahkan menu di `nav.js`.
