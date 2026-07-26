<?php

return [
    [
        'label' => 'Dashboard',
        'icon' => 'home',
        'children' => [
            ['label' => 'Dashboard Utama', 'url' => 'dashboard'],
            ['label' => 'Analitik', 'url' => 'dashboard/analytics'],
        ]
    ],
    [
        'label' => 'Komponen UI',
        'icon' => 'components',
        'children' => [
            ['label' => 'Buttons & Dropdowns', 'url' => 'components/buttons'],
            ['label' => 'Alerts & Badges', 'url' => 'components/alerts'],
            ['label' => 'Cards & Stat Cards', 'url' => 'components/cards'],
            ['label' => 'Avatars', 'url' => 'components/avatars'],
            ['label' => 'Modals & Offcanvas', 'url' => 'components/modals'],
            ['label' => 'Tabs & Accordion', 'url' => 'components/navigation'],
            ['label' => 'Progress & Skeleton', 'url' => 'components/progress'],
            ['label' => 'Tooltips & Popovers', 'url' => 'components/overlays'],
            ['label' => 'List & Timeline', 'url' => 'components/lists'],
            ['label' => 'Empty State', 'url' => 'components/empty'],
        ]
    ],
    [
        'label' => 'Tampilan Data',
        'icon' => 'table',
        'children' => [
            ['label' => 'Tabel Dasar', 'url' => 'tables/basic'],
            ['label' => 'Tabel Interaktif', 'url' => 'tables/interactive'],
            ['label' => 'Datatables Lanjutan', 'url' => 'components/datatables'],
        ]
    ],
    [
        'label' => 'Form & Input',
        'icon' => 'forms',
        'children' => [
            ['label' => 'Input Dasar', 'url' => 'forms/inputs'],
            ['label' => 'Controls & Switches', 'url' => 'forms/controls'],
            ['label' => 'Validasi Form', 'url' => 'forms/validation'],
            ['label' => 'File Upload', 'url' => 'forms/upload'],
            ['label' => 'Form Layout', 'url' => 'forms/layout'],
            ['label' => 'Form Lanjutan', 'url' => 'forms/advanced'],
        ]
    ],
    [
        'label' => 'Charts',
        'icon' => 'chart-bar',
        'url' => 'charts',
    ],
    [
        'label' => 'Autentikasi',
        'icon' => 'lock',
        'children' => [
            ['label' => 'Login', 'url' => 'login'],
            ['label' => 'Register', 'url' => 'register'],
            ['label' => 'Forgot Password', 'url' => 'forgot-password'],
        ]
    ],
    [
        'label' => 'Pengguna',
        'icon' => 'users',
        'children' => [
            ['label' => 'Daftar User', 'url' => 'users'],
            ['label' => 'Tambah / Edit User', 'url' => 'users/create'],
        ]
    ],
    [
        'label' => 'Pengaturan',
        'icon' => 'settings',
        'url' => 'settings',
    ],
    [
        'label' => 'Landing Page',
        'icon' => 'world',
        'url' => '/',
    ]
];
