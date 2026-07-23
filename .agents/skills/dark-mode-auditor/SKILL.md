---
name: dark-mode-auditor
description: >
  Audit dark mode pada semua halaman .njk — deteksi hardcode warna, elemen yang
  tidak menggunakan CSS variable Bootstrap, dan komponen yang kontrasnya rusak saat
  dark mode aktif. Gunakan skill ini saat mengerjakan task [7.1].
---

# Dark Mode Auditor — Admin Template

## Kapan Digunakan
Trigger skill ini ketika user meminta:
- "audit dark mode"
- "kerjakan task 7.1"
- "cek kontras dark mode"
- "temukan hardcode color di template"

## Checklist Audit

### 1. Hardcode Color (Bahaya Tinggi)
Scan semua file .njk, .scss untuk pattern ini — LAPORKAN jika ditemukan:
- style="color: #..." atau style="background: #..."
- Warna hex langsung di SCSS di luar _variables.scss
- Penggunaan warna Bootstrap lama (mis. -800) tanpa CSS variable

### 2. Elemen Wajib Dark Mode Compatible
Cek elemen-elemen ini di setiap halaman:
- [ ] Card background menggunakan var(--bs-card-bg)
- [ ] Tabel menggunakan var(--bs-table-bg)
- [ ] Input menggunakan var(--bs-body-bg) dan var(--bs-body-color)
- [ ] Sidebar menggunakan var(--bs-dark) atau custom CSS var
- [ ] Teks menggunakan var(--bs-body-color), bukan hardcode
- [ ] Border menggunakan var(--bs-border-color)

### 3. ApexCharts Dark Mode Sync
Pastikan charts.js punya MutationObserver untuk sync theme:
`js
const observer = new MutationObserver(() => {
  const dark = document.documentElement.dataset.bsTheme === "dark";
  allCharts.forEach(c => c.updateOptions({ theme: { mode: dark ? "dark" : "light" } }));
});
observer.observe(document.documentElement, { attributes: true, attributeFilter: ["data-bs-theme"] });
`

### 4. Output Laporan
Buat laporan format tabel:
| File | Element | Issue | Rekomendasi |
|---|---|---|---|
| pages/index.njk | .stat-card | hardcode bg #fff | gunakan var(--bs-body-bg) |

## Cara Fix Umum
- Hardcode hex → ganti dengan CSS variable Bootstrap
- Background card putih → tambahkan `bg-body` class atau gunakan `var(--bs-card-bg)`
- Border solid color → gunakan `border-color` utility atau `var(--bs-border-color)`
