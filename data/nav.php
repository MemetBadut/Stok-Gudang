<?php

return [
    [
        'key' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'ri-home-5-line',
        'url' => url('admin/dashboard.php'),
    ],
    [
        'key' => 'barang',
        'label' => 'Stok Barang',
        'icon' => 'ri-box-3-line',
        'url' => url('admin/barang/index.php'),
    ],
    [
        'key' => 'kategori',
        'label' => 'Kategori',
        'icon' => 'ri-apps-2-line',
        'url' => '#',
    ],
    [
        'key' => 'supplier',
        'label' => 'Supplier',
        'icon' => 'ri-truck-line',
        'url' => '#',
    ],
    [
        'key' => 'barang-masuk',
        'label' => 'Barang Masuk',
        'icon' => 'ri-login-box-line',
        'url' => '#',
    ],
    [
        'key' => 'barang-keluar',
        'label' => 'Barang Keluar',
        'icon' => 'ri-logout-box-r-line',
        'url' => '#',
    ],
    [
        'key' => 'laporan',
        'label' => 'Laporan',
        'icon' => 'ri-file-list-3-line',
        'url' => '#',
    ],
    [
        'key' => 'pengaturan',
        'label' => 'Pengaturan',
        'icon' => 'ri-settings-3-line',
        'url' => '#',
    ],
    [
        'key' => 'logout',
        'label' => 'Logout',
        'icon' => 'ri-logout-box-r-line',
        'url' => url('auth/logout.php'),
    ],
];
