# Rules: Admin Template Project

> Aturan-aturan berikut wajib diikuti oleh AI agent saat bekerja pada project ini.
> Semua keputusan sudah terkunci di RENCANA_ADMIN_TEMPLATE.md.

---

## Keputusan Terkunci — JANGAN DIUBAH

| Aspek | Keputusan | Versi |
|---|---|---|
| CSS Framework | Bootstrap | `5.3.3` |
| Preprocessor | Dart Sass | `^1.77` |
| Static Site Generator | Eleventy (11ty) + Nunjucks | `@11ty/eleventy@^3` |
| Bundler JS | esbuild | `^0.21` |
| Ikon | Tabler Icons (SVG, via npm @tabler/icons) | `^3` |
| Chart | ApexCharts | `^3` |
| Font | Inter (self-hosted via @fontsource/inter) | `^5` |
| Package manager | npm | — |
| Bahasa JS | Vanilla JS (ES Modules). Tanpa React/Vue/jQuery | — |
| Node | LTS (>= 20) | — |

---

## Konvensi Wajib

- **Penamaan file:** kebab-case — contoh: user-list.njk, theme-toggle.js
- **Kelas CSS kustom:** prefiks `at-` — contoh: .at-sidebar, .at-avatar
  - Utamakan kelas utilitas Bootstrap dulu; buat kelas kustom hanya bila perlu
- **Menu sidebar:** HANYA diedit lewat src/_data/nav.js. Jangan hardcode li di partial
- **Ikon:** ambil dari @tabler/icons, disisipkan sebagai inline SVG via shortcode icon
- **Komentar kode:** Bahasa Indonesia, singkat
- **Dark mode:** Gunakan Bootstrap 5.3 built-in (data-bs-theme). Jangan buat custom dark mode

---

## Definition of Done (berlaku setiap task)

Sebuah task dianggap SELESAI hanya jika SEMUA terpenuhi:
- [ ] Semua file yang disebut di task sudah dibuat/diubah
- [ ] npm run build berjalan tanpa error
- [ ] Tampil benar di mode terang DAN gelap
- [ ] Responsif: tidak ada overflow di lebar 375px, 768px, 1440px
- [ ] Tidak menambah dependency di luar daftar terkunci

---

## Larangan Keras

- Jangan gunakan React, Vue, Angular, jQuery
- Jangan install dependency baru tanpa konfirmasi user
- Jangan hardcode menu di sidebar.njk
- Jangan edit folder dist/ secara manual
- Jangan menggunakan CDN untuk font eksternal; semua font eksternal wajib diinstal via npm dan di-host sendiri (self-hosted)

---

## Urutan Eksekusi

Fase 0 (tooling) → Fase 1 (shell) → { Fase 2, 3, 4 komponen } → Fase 5 (pages) → Fase 6 (JS) → Fase 7 (polish) → Fase 8 (build final)
Fase 1 adalah fondasi — jangan lanjut ke Fase 2 sebelum Fase 1 solid.

---

## Design System Tokens

- Primary: #206bc4 | Secondary: #6c757d | Success: #2fb344
- Info: #4299e1 | Warning: #f59f00 | Danger: #d63939
- Body bg: #f5f7fb | Body color: #1e293b | Border: #e6e7e9
- Font: Inter, 0.875rem base, weight 600 headings
- Radius: 4px base, 3px sm, 6px lg
