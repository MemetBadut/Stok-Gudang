<?php

return [
    [
        'key' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'ri-home-5-line',
        'url' => url('admin/dashboard.php')
    ],
    [
        'key' => 'barang',
        'label' => 'Stok Barang',
        'icon' => 'ri-box-3-line',
        'url' => url('admin/barang/index.php')
    ],
    [
        'key' => 'kategori',
        'label' => 'Kategori',
        'icon' => 'ri-apps-2-line',
        'url' => url('admin/kategori/index.php')
    ],
    [
        'key' => 'logout',
        'label' => 'Logout',
        'icon' => 'ri-logout-box-r-line',
        'url' => url('auth/logout.php')
    ],
];