# Rencana Migrasi: Eleventy + Nunjucks → Laravel 12 (Blade)

> **Tujuan:** Memigrasikan admin template yang sudah ada ke proyek Laravel 12 dengan tetap
> mempertahankan **100% tampilan visual** yang ada. Tidak ada perubahan warna, layout, komponen,
> maupun perilaku JavaScript. Hanya arsitektur server dan templating yang berubah.

---

## Prinsip Migrasi

1. **Zero Visual Regression** — Semua CSS/SCSS dan JS tidak diubah strukturnya, hanya dipindah lokasi.
2. **Blade = Nunjucks** — Setiap `{% include %}` dan `{{ }}` dipetakan 1:1 ke direktif Blade.
3. **Laravel Best Practice** — Pakai service provider, helper, View Composer, dan Route group yang idiomatik.
4. **Asset Pipeline via Vite** — Ganti esbuild + Sass langsung ke Laravel Vite Plugin (official).
5. **Nav via PHP Service** — Data menu sidebar yang sebelumnya dari `nav.js` dipindah ke PHP class/config.
6. **Auth bawaan Laravel** — Gunakan Laravel Breeze (Blade stack) untuk halaman login/register/reset.
7. **Self-hosted font & vendor** — Tetap dilarang CDN; semua aset dipasang via npm dan di-publish ke `public/`.
8. **Satu task satu waktu** — Selesaikan sampai build bersih sebelum lanjut.

---

## Keputusan Stack Laravel

| Aspek | Keputusan | Versi |
|---|---|---|
| Framework | Laravel | `^12.0` |
| Templating | Blade (bawaan Laravel) | — |
| Asset Bundler | Vite + Laravel Vite Plugin | `^5.0` / `^1.0` |
| CSS Preprocessor | Sass (`sass`) | `^1.77` |
| CSS Framework | Bootstrap | `5.3.3` |
| Ikon | `@tabler/icons` (self-hosted, inline SVG via Blade directive) | `^3` |
| Chart | ApexCharts | `^3` |
| Font | `@fontsource/inter` (self-hosted) | `^5` |
| Auth Starter | Laravel Breeze (Blade stack) | `^2` |
| Bahasa JS | Vanilla JS (ES Modules) — tetap tanpa React/Vue/jQuery | — |
| PHP | >= 8.3 | — |
| Package Manager | npm + Composer | — |

---

## Pemetaan Struktur Folder: Eleventy → Laravel

### Sumber Asli (Eleventy)
```
src/
├── _data/nav.js               ← menu config
├── _includes/
│   ├── layouts/
│   │   ├── base.njk
│   │   ├── dashboard.njk
│   │   └── auth.njk
│   └── partials/
│       ├── sidebar.njk
│       ├── navbar.njk
│       ├── footer.njk
│       └── page-header.njk
├── scss/
│   ├── app.scss
│   ├── _variables.scss
│   ├── _theme.scss
│   ├── _components.scss
│   └── _landing.scss
├── js/
│   ├── app.js
│   └── modules/
│       ├── theme.js
│       ├── sidebar.js
│       ├── charts.js
│       ├── datatable.js
│       └── advanced-form.js
└── pages/**/*.njk             ← semua halaman
```

### Target Laravel
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── DashboardController.php
│   │   ├── ComponentController.php
│   │   ├── FormController.php
│   │   ├── TableController.php
│   │   ├── ChartController.php
│   │   └── PageController.php
│   └── ViewComposers/
│       └── NavigationComposer.php  ← pengganti nav.js
├── Services/
│   └── NavigationService.php
config/
└── navigation.php                  ← data menu sidebar (pengganti nav.js)
resources/
├── views/
│   ├── layouts/
│   │   ├── base.blade.php          ← dari base.njk
│   │   ├── dashboard.blade.php     ← dari dashboard.njk
│   │   ├── auth.blade.php          ← dari auth.njk
│   │   └── landing.blade.php       ← layout landing page
│   ├── partials/
│   │   ├── sidebar.blade.php       ← dari sidebar.njk
│   │   ├── navbar.blade.php        ← dari navbar.njk
│   │   ├── footer.blade.php        ← dari footer.njk
│   │   └── page-header.blade.php   ← dari page-header.njk
│   ├── components/                 ← Blade anonymous components
│   │   └── icon.blade.php          ← pengganti shortcode {% icon %}
│   ├── dashboard/
│   │   ├── index.blade.php
│   │   └── analytics.blade.php
│   ├── components-showcase/
│   │   ├── buttons.blade.php
│   │   ├── alerts.blade.php
│   │   ├── cards.blade.php
│   │   ├── avatars.blade.php
│   │   ├── modals.blade.php
│   │   ├── navigation.blade.php
│   │   ├── progress.blade.php
│   │   ├── overlays.blade.php
│   │   ├── lists.blade.php
│   │   ├── empty.blade.php
│   │   └── datatables.blade.php
│   ├── forms/
│   │   ├── inputs.blade.php
│   │   ├── controls.blade.php
│   │   ├── validation.blade.php
│   │   ├── upload.blade.php
│   │   ├── layout.blade.php
│   │   └── advanced.blade.php
│   ├── tables/
│   │   ├── basic.blade.php
│   │   ├── interactive.blade.php
│   │   └── stats.blade.php
│   ├── charts/
│   │   └── index.blade.php
│   ├── users/
│   │   ├── list.blade.php
│   │   ├── detail.blade.php
│   │   └── form.blade.php
│   ├── pages/
│   │   ├── profile.blade.php
│   │   ├── settings.blade.php
│   │   ├── icons.blade.php
│   │   ├── blank.blade.php
│   │   └── landing.blade.php
│   └── auth/               ← di-generate Laravel Breeze
│       ├── login.blade.php
│       ├── register.blade.php
│       └── ...
├── css/
│   └── app.scss                    ← entry point (dipindah ke sini untuk Vite)
└── js/
    ├── app.js                      ← entry point Vite
    └── modules/
        ├── theme.js
        ├── sidebar.js
        ├── charts.js
        ├── datatable.js
        └── advanced-form.js
public/
├── vendor/
│   ├── flatpickr.min.js
│   ├── flatpickr.min.css
│   ├── tom-select.complete.min.js
│   └── tom-select.bootstrap5.min.css
└── fonts/
    └── inter/                      ← dari @fontsource/inter
routes/
└── web.php                         ← semua route yang sebelumnya URL Eleventy
```

---

## Pemetaan Sintaks: Nunjucks → Blade

| Konsep | Nunjucks (lama) | Blade (baru) |
|---|---|---|
| Extend layout | `layout: layouts/dashboard.njk` (frontmatter) | `@extends('layouts.dashboard')` |
| Yield block | `{{ content \| safe }}` | `@yield('content')` |
| Definisi block | *(konten halaman langsung)* | `@section('content') ... @endsection` |
| Include partial | `{% include "partials/sidebar.njk" %}` | `@include('partials.sidebar')` |
| Loop | `{% for item in nav %}` | `@foreach($nav as $item)` |
| Conditional | `{% if item.children %}` | `@if(isset($item['children']))` |
| Escape output | `{{ item.label }}` | `{{ $item['label'] }}` |
| Ikon shortcode | `{% icon "home" %}` | `<x-icon name="home" />` |
| Ikon dengan class | `{% icon "home", { class: "me-2" } %}` | `<x-icon name="home" class="me-2" />` |
| Variabel global | `{{ site.name }}` | `{{ config('app.name') }}` |
| URL aktif | `page.url == sub.url` | `request()->is(trim($sub['url'], '/'))` |
| CSRF token | *(tidak ada)* | `@csrf` (di setiap form POST) |
| Auth check | *(tidak ada)* | `@auth` / `@guest` |
| User saat ini | *(hardcoded "John Doe")* | `auth()->user()->name` |
| Asset URL | `/css/app.css` | `@vite(['resources/css/app.scss', 'resources/js/app.js'])` |
| Vendor asset | `/assets/vendor/...` | `asset('vendor/...')` |

---

## Pemetaan Route: URL Eleventy → Laravel Route

| URL Eleventy | Laravel Route | Controller@method |
|---|---|---|
| `/` | `GET /dashboard` | `DashboardController@index` |
| `/dashboard-analytics/` | `GET /dashboard/analytics` | `DashboardController@analytics` |
| `/components/buttons/` | `GET /components/buttons` | `ComponentController@buttons` |
| `/components/alerts/` | `GET /components/alerts` | `ComponentController@alerts` |
| `/components/cards/` | `GET /components/cards` | `ComponentController@cards` |
| `/components/avatars/` | `GET /components/avatars` | `ComponentController@avatars` |
| `/components/modals/` | `GET /components/modals` | `ComponentController@modals` |
| `/components/navigation/` | `GET /components/navigation` | `ComponentController@navigation` |
| `/components/progress/` | `GET /components/progress` | `ComponentController@progress` |
| `/components/overlays/` | `GET /components/overlays` | `ComponentController@overlays` |
| `/components/lists/` | `GET /components/lists` | `ComponentController@lists` |
| `/components/empty/` | `GET /components/empty` | `ComponentController@empty` |
| `/components/datatables/` | `GET /components/datatables` | `ComponentController@datatables` |
| `/tables/basic/` | `GET /tables/basic` | `TableController@basic` |
| `/tables/interactive/` | `GET /tables/interactive` | `TableController@interactive` |
| `/tables/stats/` | `GET /tables/stats` | `TableController@stats` |
| `/forms/inputs/` | `GET /forms/inputs` | `FormController@inputs` |
| `/forms/controls/` | `GET /forms/controls` | `FormController@controls` |
| `/forms/validation/` | `GET /forms/validation` | `FormController@validation` |
| `/forms/upload/` | `GET /forms/upload` | `FormController@upload` |
| `/forms/layout/` | `GET /forms/layout` | `FormController@layout` |
| `/forms/advanced/` | `GET /forms/advanced` | `FormController@advanced` |
| `/charts/` | `GET /charts` | `ChartController@index` |
| `/users/list/` | `GET /users` | `UserController@index` |
| `/users/form/` | `GET /users/create` | `UserController@create` |
| `/users/detail/` | `GET /users/{user}` | `UserController@show` |
| `/profile/` | `GET /profile` | `ProfileController@show` |
| `/settings/` | `GET /settings` | `ProfileController@settings` |
| `/icons/` | `GET /icons` | `PageController@icons` |
| `/blank/` | `GET /blank` | `PageController@blank` |
| `/landing/` | `GET /` *(publik, no auth)* | `PageController@landing` |
| `/auth/login/` | `GET /login` | Breeze default |
| `/auth/register/` | `GET /register` | Breeze default |
| `/auth/forgot-password/` | `GET /forgot-password` | Breeze default |
| `/errors/404/` | Handled by Laravel exception handler | — |
| `/errors/500/` | Handled by Laravel exception handler | — |
| `/errors/maintenance/` | Laravel `php artisan down` | — |

---

## Fase Implementasi

### FASE 0 — Inisialisasi Proyek Laravel

**[L0.1] Buat proyek Laravel baru**
- `composer create-project laravel/laravel admin-laravel`
- Verifikasi PHP >= 8.3 dan Composer tersedia
- *Done when:* `php artisan serve` berjalan tanpa error

**[L0.2] Install Laravel Breeze (Blade stack)**
- `composer require laravel/breeze --dev`
- `php artisan breeze:install blade`
- *Done when:* halaman `/login` tersedia dengan layout default Breeze

**[L0.3] Setup Vite + npm dependencies**
- Hapus config Vite default
- Install npm packages: `bootstrap@5.3.3`, `sass@1.77`, `@tabler/icons@^3`, `apexcharts@^3`, `@fontsource/inter@^5`, `tom-select`, `flatpickr`
- Konfigurasi `vite.config.js` untuk bundle `resources/css/app.scss` dan `resources/js/app.js`
- *Done when:* `npm run build` menghasilkan `public/build/` tanpa error

**[L0.4] Copy aset statis**
- Copy file font dari `node_modules/@fontsource/inter/files/` ke `public/fonts/inter/`
- Copy `flatpickr.min.js`, `flatpickr.min.css`, `tom-select.complete.min.js`, `tom-select.bootstrap5.min.css` ke `public/vendor/`
- Copy `favicon.svg` ke `public/`
- *Done when:* file tersedia di `public/` dan bisa diakses via URL

---

### FASE 1 — Design System (Pindah SCSS & JS)

**[L1.1] Copy & sesuaikan SCSS**
- Copy `src/scss/_variables.scss`, `_theme.scss`, `_components.scss`, `_landing.scss` ke `resources/css/`
- Buat `resources/css/app.scss` baru yang mengimpor Bootstrap + semua partial scss di atas
- *Done when:* `npm run build` menghasilkan CSS dengan warna `#206bc4` sebagai primary

**[L1.2] Copy & sesuaikan JS modules**
- Copy semua file dari `src/js/modules/` ke `resources/js/modules/`
- Buat `resources/js/app.js` yang mengimpor semua modul (theme, sidebar, charts, datatable, advanced-form)
- *Done when:* `npm run build` menghasilkan JS tanpa error bundling

**[L1.3] Buat Blade component `<x-icon>`**
- Buat `resources/views/components/icon.blade.php`
- Logika: baca file SVG dari `node_modules/@tabler/icons/icons/outline/{name}.svg` dan render inline
- Daftarkan via `AppServiceProvider` atau gunakan anonymous component
- *Done when:* `<x-icon name="home" />` menghasilkan SVG inline di halaman

---

### FASE 2 — Layout & Shell Dashboard

**[L2.1] Buat `layouts/base.blade.php`**
- Konversi `src/_includes/layouts/base.njk` ke Blade
- Pasang `@vite(...)` untuk CSS dan JS
- Sertakan script deteksi dark mode yang sama dari `base.njk`
- Sertakan `<link rel="icon" ...>` untuk favicon
- *Done when:* halaman kosong ter-render dengan font Inter

**[L2.2] Buat `layouts/auth.blade.php`**
- Wrapper minimal untuk halaman login/register (extends base, tanpa sidebar/navbar)
- Sesuaikan tampilan halaman Breeze agar menggunakan design system kita
- *Done when:* halaman `/login` tampil dengan desain yang sama seperti template lama

**[L2.3] Buat `config/navigation.php`**
- Pindahkan data dari `src/_data/nav.js` ke PHP array
- Format: `[['label' => '...', 'icon' => '...', 'children' => [...]], ...]`
- *Done when:* `config('navigation')` mengembalikan array yang benar

**[L2.4] Buat `NavigationComposer` dan `NavigationService`**
- `NavigationService::getItems()` membaca `config/navigation.php` dan mendeteksi menu aktif berdasarkan `request()->url()`
- Daftarkan `NavigationComposer` di `AppServiceProvider::boot()` agar variabel `$nav` tersedia di **semua** view
- *Done when:* variabel `$nav` tersedia di semua view tanpa perlu `compact()` di controller

**[L2.5] Buat `partials/sidebar.blade.php`**
- Konversi `sidebar.njk` ke Blade
- Loop: `@foreach($nav as $item)` → `@if(isset($item['children']))` → `@foreach($item['children'] as $sub)`
- Deteksi aktif: `request()->is(ltrim($sub['url'], '/'))` → tambah class `active`
- Ikon: ganti `{% icon item.icon %}` ke `<x-icon :name="$item['icon']" />`
- *Done when:* sidebar tampil dengan semua menu, submenu bisa collapse, item aktif ter-highlight

**[L2.6] Buat `partials/navbar.blade.php`**
- Konversi `navbar.njk` ke Blade
- Ganti username hardcode `John Doe` dengan `{{ auth()->user()->name ?? 'Guest' }}`
- Ganti link profil/keluar menggunakan route Laravel Breeze: `route('profile.edit')`, `route('logout')`
- *Done when:* navbar tampil dengan info user yang benar, dropdown berfungsi

**[L2.7] Buat `partials/footer.blade.php` dan `partials/page-header.blade.php`**
- Konversi dari `.njk` ke Blade
- `page-header.blade.php`: terima `$title` dan `$breadcrumb` yang di-pass dari controller atau `@section`
- *Done when:* footer tampil, breadcrumb dinamis berjalan

**[L2.8] Buat `layouts/dashboard.blade.php`**
- Extends `layouts.base`
- Include partials: sidebar, navbar, page-header, footer
- `@yield('content')` untuk konten utama
- `@stack('scripts')` untuk push script opsional per halaman (dipakai Flatpickr, Tom Select)
- *Done when:* layout utuh responsif di 375/768/1440px, mode terang dan gelap benar

---

### FASE 3 — Controller & Route Groups

**[L3.1] Buat `web.php` dengan route groups**
```php
// Publik
Route::get('/', [PageController::class, 'landing']);

// Auth routes (dari Breeze)
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics']);

    Route::prefix('components')->controller(ComponentController::class)->group(function () {
        Route::get('/buttons', 'buttons');
        Route::get('/alerts', 'alerts');
        // ... semua komponen
        Route::get('/datatables', 'datatables');
    });

    Route::prefix('forms')->controller(FormController::class)->group(function () {
        Route::get('/inputs', 'inputs');
        // ... semua forms
        Route::get('/advanced', 'advanced');
    });

    Route::prefix('tables')->controller(TableController::class)->group(function () {
        Route::get('/basic', 'basic');
        Route::get('/interactive', 'interactive');
        Route::get('/stats', 'stats');
    });

    Route::get('/charts', [ChartController::class, 'index']);

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::get('/{user}', 'show')->name('users.show');
    });

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
    Route::get('/settings', [ProfileController::class, 'settings']);
    Route::get('/icons', [PageController::class, 'icons']);
    Route::get('/blank', [PageController::class, 'blank']);
});
```
- *Done when:* semua route terdaftar, `php artisan route:list` bersih

**[L3.2] Buat Controller untuk setiap grup**
- Setiap method controller hanya memanggil `return view('nama.view', compact(...));`
- Pass `$title` dan `$breadcrumb` ke setiap view
- *Done when:* semua URL yang ada sebelumnya di Eleventy bisa dibuka tanpa 404

---

### FASE 4 — Migrasi Blade Views (Halaman per Halaman)

Migrasi konten dari setiap `.njk` ke `.blade.php`. Aturan konversi:

1. Hapus frontmatter YAML (`---`)
2. Ganti `layout: layouts/dashboard.njk` dengan `@extends('layouts.dashboard')`
3. Bungkus konten dengan `@section('content') ... @endsection`
4. Ganti semua `{% icon "..." %}` dengan `<x-icon name="..." />`
5. Ganti sintaks loop/kondisi Nunjucks ke Blade (`{% for %}` → `@foreach`)
6. Tambah `@push('scripts')` untuk halaman yang butuh Flatpickr/TomSelect

| Task | View Target | Sumber |
|---|---|---|
| [L4.1] | `dashboard/index.blade.php` | `pages/index.njk` |
| [L4.2] | `dashboard/analytics.blade.php` | `pages/dashboard-analytics.njk` |
| [L4.3] | `components-showcase/*.blade.php` (10 file) | `pages/components/*.njk` |
| [L4.4] | `components-showcase/datatables.blade.php` | `pages/components/datatables.njk` |
| [L4.5] | `forms/*.blade.php` (6 file) | `pages/forms/*.njk` |
| [L4.6] | `tables/*.blade.php` (3 file) | `pages/tables/*.njk` |
| [L4.7] | `charts/index.blade.php` | `pages/charts/index.njk` |
| [L4.8] | `users/*.blade.php` (3 file) | `pages/users/*.njk` |
| [L4.9] | `pages/profile.blade.php`, `settings.blade.php`, `icons.blade.php`, `blank.blade.php` | `pages/*.njk` |
| [L4.10] | `pages/landing.blade.php` | `pages/landing.njk` |
| [L4.11] | `errors/404.blade.php`, `500.blade.php`, `maintenance.blade.php` | `pages/errors/*.njk` |
| [L4.12] | Sesuaikan view auth Breeze dengan desain template | `pages/auth/*.njk` |

---

### FASE 5 — Autentikasi & Middleware

**[L5.1] Aktifkan proteksi route dengan `auth` middleware**
- Pastikan semua route dashboard terbungkus `middleware(['auth'])`
- Ubah `RouteServiceProvider::HOME` ke `/dashboard`
- *Done when:* akses `/dashboard` tanpa login redirect ke `/login`

**[L5.2] Setup database & migrasi user**
- Setup `.env` dengan koneksi database (SQLite untuk development awal)
- Jalankan `php artisan migrate`
- *Done when:* tabel `users` tersedia, `php artisan tinker` bisa membuat user test

**[L5.3] Integrasi avatar & data user di navbar**
- Tampilkan `auth()->user()->name` di dropdown navbar
- Tampilkan dua inisial nama di avatar: `substr(auth()->user()->name, 0, 2)`
- *Done when:* nama user yang login tampil di navbar

---

### FASE 6 — Vendor & Font Publishing

**[L6.1] Buat npm script untuk copy vendor files**
- Tambah script di `package.json` untuk menyalin aset vendor ke `public/vendor/`
- Tambah script untuk menyalin font Inter ke `public/fonts/`
- Integrasikan dengan Vite lifecycle atau jalankan sebagai langkah terpisah
- *Done when:* `npm run publish-assets` menyalin semua file ke `public/`

**[L6.2] Verifikasi `public/vendor/` dan `public/fonts/` tersedia**
- Pastikan semua URL vendor di blade view menggunakan `asset('vendor/...')`
- Pastikan URL font di SCSS menggunakan path relatif ke `public/fonts/`
- *Done when:* halaman form lanjutan memuat Flatpickr dan Tom Select tanpa error console

---

### FASE 7 — Polish & QA

**[L7.1] Uji dark mode di semua halaman**
- Toggle dark mode, verifikasi tidak ada hardcode warna
- Pastikan semua komponen menggunakan CSS variable Bootstrap

**[L7.2] Uji responsif di 375px, 768px, 1440px**
- Tidak ada overflow atau elemen yang terpotong

**[L7.3] Uji navigasi aktif sidebar**
- Kunjungi setiap halaman, pastikan item menu yang relevan ter-highlight

**[L7.4] Uji autentikasi end-to-end**
- Register → Login → Akses dashboard → Logout → Redirect ke login

**[L7.5] Jalankan `npm run build` dan `php artisan optimize`**
- Pastikan output production bersih
- Jalankan `php artisan config:cache`, `php artisan view:cache`, `php artisan route:cache`

---

### FASE 8 — Deployment Readiness

**[L8.1] Setup `.env.example` yang lengkap**
- Dokumentasikan semua variabel wajib

**[L8.2] Update `README.md`**
- Cara install (Composer + npm)
- `php artisan migrate --seed` untuk data dummy
- `npm run dev` untuk development
- `npm run build && php artisan optimize` untuk production

**[L8.3] Tambah `.gitignore` yang benar untuk Laravel**
- Pastikan `vendor/`, `public/build/`, `.env`, `public/fonts/`, `public/vendor/` masuk ignore yang tepat
- `public/fonts/` dan `public/vendor/` dimasukkan ke ignore tapi didokumentasikan cara generate ulangnya

---

## Catatan Penting

> **PENTING:** Konversi `{% icon %}` ke `<x-icon>` adalah pekerjaan paling berulang.
> Buat dulu component-nya dan pastikan berfungsi di Fase 1 sebelum mulai konversi view,
> agar prosesnya bisa cepat dengan find-and-replace.

> **PERINGATAN:** Jangan gunakan Tailwind atau Livewire. Proyek ini mempertahankan Bootstrap 5.3.3
> dan Vanilla JS tanpa framework reaktif apapun sesuai keputusan awal.

> **CATATAN:** Laravel Breeze view di `resources/views/auth/` perlu diedit secara manual
> untuk mengganti styling default Breeze (Tailwind) dengan Bootstrap 5.3.3 kita.
> Ini adalah satu-satunya file yang butuh penulisan ulang CSS-nya.

> **TIP:** Pertimbangkan menggunakan `php artisan make:controller` dengan flag `--invokable`
> untuk halaman-halaman sederhana yang hanya `return view(...)` tanpa logika bisnis.

---

## Checklist QA Akhir

- [ ] Semua URL Eleventy lama terpetakan ke route Laravel
- [ ] `php artisan route:list` tidak ada duplikat atau missing
- [ ] Login/register/logout berfungsi
- [ ] Sidebar menu aktif sesuai halaman yang dibuka
- [ ] Dark mode berjalan di semua halaman
- [ ] Responsif di 375px, 768px, 1440px tanpa overflow
- [ ] Flatpickr dan Tom Select berfungsi di halaman form lanjutan
- [ ] ApexCharts berfungsi di halaman charts
- [ ] Datatable (search, sort, pagination, CSV export) berfungsi
- [ ] `npm run build` bersih tanpa error
- [ ] `php artisan optimize` berjalan tanpa error
- [ ] Tidak ada request ke CDN eksternal di console browser
- [ ] Favicon tampil di browser tab
