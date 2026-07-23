module.exports = [
  {
    label: "Dashboard",
    icon: "home",
    children: [
      { label: "Dashboard Utama", url: "/" },
      { label: "Analitik", url: "/dashboard-analytics/" }
    ]
  },
  {
    label: "Komponen UI",
    icon: "components",
    children: [
      { label: "Buttons & Dropdowns", url: "/components/buttons/" },
      { label: "Alerts & Badges", url: "/components/alerts/" },
      { label: "Cards & Stat Cards", url: "/components/cards/" },
      { label: "Avatars", url: "/components/avatars/" },
      { label: "Modals & Offcanvas", url: "/components/modals/" },
      { label: "Tabs & Accordion", url: "/components/navigation/" },
      { label: "Progress & Skeleton", url: "/components/progress/" },
      { label: "Tooltips & Popovers", url: "/components/overlays/" },
      { label: "List & Timeline", url: "/components/lists/" },
      { label: "Empty State", url: "/components/empty/" }
    ]
  },
  {
    label: "Tampilan Data",
    icon: "table",
    children: [
      { label: "Tabel Dasar", url: "/tables/basic/" },
      { label: "Tabel Interaktif", url: "/tables/interactive/" }
    ]
  },
  {
    label: "Form & Input",
    icon: "forms",
    children: [
      { label: "Input Dasar", url: "/forms/inputs/" },
      { label: "Controls & Switches", url: "/forms/controls/" },
      { label: "Validasi Form", url: "/forms/validation/" },
      { label: "File Upload", url: "/forms/upload/" },
      { label: "Form Layout", url: "/forms/layout/" }
    ]
  },
  {
    label: "Charts",
    icon: "chart-bar",
    url: "/charts/"
  },
  {
    label: "Autentikasi",
    icon: "lock",
    children: [
      { label: "Login", url: "/auth/login/" },
      { label: "Register", url: "/auth/register/" },
      { label: "Forgot Password", url: "/auth/forgot-password/" }
    ]
  },
  {
    label: "Pengguna",
    icon: "users",
    children: [
      { label: "Daftar User", url: "/users/list/" },
      { label: "Tambah / Edit User", url: "/users/form/" }
    ]
  },
  {
    label: "Pengaturan",
    icon: "settings",
    url: "/settings/"
  }
];
