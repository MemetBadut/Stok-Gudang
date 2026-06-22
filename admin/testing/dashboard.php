<?php
// =============================================
// Gudang Elektronik - Dashboard
// =============================================

// Sample data - in a real app, this would come from a database
$stats = [
    'total'   => 512,
    'aman'    => 312,
    'menipis' => 134,
    'habis'   => 66,
];

$chart_data = [
    ['bulan' => 'Jan', 'stok' => 320],
    ['bulan' => 'Feb', 'stok' => 380],
    ['bulan' => 'Mar', 'stok' => 410],
    ['bulan' => 'Apr', 'stok' => 470],
    ['bulan' => 'Mei', 'stok' => 495],
    ['bulan' => 'Jun', 'stok' => 512],
];

$barang = [
    ['no'=>1,'kode'=>'BRG-001','nama'=>'Monitor LED 24"',    'icon'=>'🖥', 'kategori'=>'Monitor',    'lokasi'=>'Rak A1','stok'=>28,'status'=>'Aman'],
    ['no'=>2,'kode'=>'BRG-002','nama'=>'Keyboard Mechanical','icon'=>'⌨', 'kategori'=>'Peripheral',  'lokasi'=>'Rak B1','stok'=>15,'status'=>'Menipis'],
    ['no'=>3,'kode'=>'BRG-003','nama'=>'Mouse Wireless',     'icon'=>'🖱', 'kategori'=>'Peripheral',  'lokasi'=>'Rak B2','stok'=>8, 'status'=>'Menipis'],
    ['no'=>4,'kode'=>'BRG-004','nama'=>'Motherboard B550',   'icon'=>'🔧', 'kategori'=>'Komponen',    'lokasi'=>'Rak C1','stok'=>5, 'status'=>'Menipis'],
    ['no'=>5,'kode'=>'BRG-005','nama'=>'Power Supply 650W',  'icon'=>'⚡', 'kategori'=>'Komponen',    'lokasi'=>'Rak C2','stok'=>0, 'status'=>'Habis'],
];

$nav_items = [
    ['label'=>'Dashboard',     'icon'=>'grid',          'active'=>true,  'href'=>'dashboard.php'],
    ['label'=>'Stok Barang',   'icon'=>'package',       'active'=>false, 'href'=>'stok.php'],
    ['label'=>'Kategori',      'icon'=>'tag',           'active'=>false, 'href'=>'kategori.php'],
    ['label'=>'Supplier',      'icon'=>'truck',         'active'=>false, 'href'=>'supplier.php'],
    ['label'=>'Barang Masuk',  'icon'=>'download',      'active'=>false, 'href'=>'masuk.php'],
    ['label'=>'Barang Keluar', 'icon'=>'upload',        'active'=>false, 'href'=>'keluar.php'],
    ['label'=>'Laporan',       'icon'=>'file-text',     'active'=>false, 'href'=>'laporan.php'],
    ['label'=>'Pengaturan',    'icon'=>'settings',      'active'=>false, 'href'=>'pengaturan.php'],
];

// Helper: status badge class
function status_class($status) {
    return match($status) {
        'Aman'    => 'badge-aman',
        'Menipis' => 'badge-menipis',
        'Habis'   => 'badge-habis',
        default   => 'badge-aman',
    };
}

// Convert chart data to JSON for JS
$chart_json = json_encode($chart_data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — Gudang Elektronik</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --sidebar-bg:   #12213a;
    --sidebar-w:    220px;
    --blue:         #2563eb;
    --blue-light:   #dbeafe;
    --blue-dark:    #1d4ed8;
    --green:        #16a34a;
    --green-light:  #dcfce7;
    --amber:        #d97706;
    --amber-light:  #fef3c7;
    --red:          #dc2626;
    --red-light:    #fee2e2;
    --gray-50:      #f9fafb;
    --gray-100:     #f3f4f6;
    --gray-200:     #e5e7eb;
    --gray-400:     #9ca3af;
    --gray-600:     #6b7280;
    --gray-800:     #1f2937;
    --gray-900:     #111827;
    --white:        #ffffff;
    --body-bg:      #f4f5f7;
    --radius:       10px;
    --radius-lg:    14px;
}

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--body-bg);
    color: var(--gray-900);
    min-height: 100vh;
    display: flex;
}

/* ── Sidebar ── */
.sidebar {
    width: var(--sidebar-w);
    background: var(--sidebar-bg);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 0;
    align-self: flex-start;
    flex-shrink: 0;
}

.sidebar-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 22px 18px 18px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
}

.logo-icon {
    width: 42px; height: 42px;
    background: #1e3a5f;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
}

.logo-text .title  { color: #fff; font-weight: 700; font-size: 14px; line-height: 1.2; }
.logo-text .sub    { color: #8aa3c0; font-size: 11px; margin-top: 2px; }

.sidebar-nav {
    flex: 1;
    padding: 14px 10px;
    list-style: none;
}

.sidebar-nav li a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 12px;
    border-radius: 8px;
    color: #8aa3c0;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 400;
    transition: background 0.15s, color 0.15s;
    margin-bottom: 2px;
}

.sidebar-nav li a:hover { background: rgba(255,255,255,0.05); color: #c7d8f0; }
.sidebar-nav li.active a { background: #1e3a5f; color: #60a5fa; font-weight: 600; }
.sidebar-nav li a svg { width: 18px; height: 18px; flex-shrink: 0; }

.sidebar-user {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 16px 20px;
    border-top: 1px solid rgba(255,255,255,0.07);
}

.user-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: #1e3a5f;
    display: flex; align-items: center; justify-content: center;
    color: #60a5fa; font-weight: 700; font-size: 12px;
    flex-shrink: 0;
}

.user-info .name  { color: #fff; font-size: 13px; font-weight: 500; }
.user-info .email { color: #8aa3c0; font-size: 11px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 140px; }

/* ── Main ── */
.main { flex: 1; min-width: 0; display: flex; flex-direction: column; }

/* ── Topbar ── */
.topbar {
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
    padding: 0 28px;
    height: 62px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 10;
}

.topbar h1 { font-size: 22px; font-weight: 700; color: var(--gray-900); }

.topbar-right { display: flex; align-items: center; gap: 16px; }

.search-wrap {
    position: relative;
}

.search-wrap svg {
    position: absolute; left: 10px; top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px; color: var(--gray-400);
}

.search-wrap input {
    padding: 8px 14px 8px 34px;
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    font-size: 13px;
    font-family: inherit;
    color: var(--gray-800);
    outline: none;
    width: 270px;
    background: var(--gray-50);
    transition: border-color 0.15s;
}

.search-wrap input:focus { border-color: var(--blue); background: var(--white); }

.notif-btn {
    position: relative;
    width: 36px; height: 36px;
    border: 1px solid var(--gray-200);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; background: var(--white);
    color: var(--gray-600);
}

.notif-btn .badge {
    position: absolute; top: -2px; right: -2px;
    width: 17px; height: 17px;
    background: var(--red); border-radius: 50%;
    font-size: 9px; color: white; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
}

.admin-info { display: flex; align-items: center; gap: 8px; }
.admin-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    background: var(--blue-light);
    display: flex; align-items: center; justify-content: center;
    color: var(--blue-dark); font-weight: 700; font-size: 12px;
}
.admin-name { font-size: 13.5px; font-weight: 500; color: var(--gray-800); }

/* ── Content ── */
.content { padding: 26px 28px; flex: 1; }

/* ── Stat Cards ── */
.stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.stat-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 18px 20px;
    display: flex;
    gap: 14px;
    align-items: flex-start;
}

.stat-icon {
    width: 46px; height: 46px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; flex-shrink: 0;
}

.stat-label  { font-size: 12px; color: var(--gray-600); font-weight: 500; margin-bottom: 3px; }
.stat-value  { font-size: 30px; font-weight: 700; line-height: 1.1; color: var(--gray-900); }
.stat-sub    { font-size: 12px; margin-top: 3px; }

.stat-blue   .stat-icon { background: var(--blue-light); }
.stat-green  .stat-icon { background: var(--green-light); }
.stat-amber  .stat-icon { background: var(--amber-light); }
.stat-red    .stat-icon { background: var(--red-light); }

.stat-blue  .stat-sub { color: var(--blue); }
.stat-green .stat-sub { color: var(--green); }
.stat-amber .stat-sub { color: var(--amber); }
.stat-red   .stat-sub { color: var(--red); }

/* ── Middle Row ── */
.middle-row {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 20px;
    margin-bottom: 24px;
}

/* ── Chart Card ── */
.chart-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 22px 24px;
}

.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}

.card-title { font-size: 15px; font-weight: 700; color: var(--gray-900); }

.period-select {
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    padding: 7px 12px;
    font-size: 13px;
    font-family: inherit;
    color: var(--gray-700);
    background: var(--white);
    cursor: pointer;
    outline: none;
}

/* ── Right Column ── */
.right-col { display: flex; flex-direction: column; gap: 20px; }

/* ── Calendar ── */
.calendar-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 16px 18px;
}

.cal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

.cal-month { font-size: 14px; font-weight: 600; color: var(--gray-900); }

.cal-nav {
    background: none; border: none; cursor: pointer;
    color: var(--gray-600); padding: 2px 6px;
    border-radius: 4px; font-size: 16px;
    transition: color 0.15s;
}
.cal-nav:hover { color: var(--blue); }

.cal-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
    text-align: center;
}

.cal-day-name {
    font-size: 11px; font-weight: 600;
    color: var(--gray-500, #6b7280);
    padding: 4px 0;
    color: var(--gray-400);
}

.cal-day {
    font-size: 12.5px;
    padding: 6px 2px;
    border-radius: 50%;
    cursor: pointer;
    color: var(--gray-700);
    transition: background 0.12s;
    line-height: 1;
    aspect-ratio: 1;
    display: flex; align-items: center; justify-content: center;
}

.cal-day:hover { background: var(--blue-light); color: var(--blue-dark); }
.cal-day.today { background: var(--blue); color: white; font-weight: 700; }
.cal-day.other-month { color: var(--gray-300, #d1d5db); }

/* ── Growth Card ── */
.growth-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.growth-title { font-size: 14px; font-weight: 700; color: var(--gray-900); margin-bottom: 14px; }

.donut-wrap { position: relative; width: 80px; height: 80px; flex-shrink: 0; }
.donut-wrap canvas { width: 80px !important; height: 80px !important; }
.donut-label {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 700; color: var(--blue);
}

.growth-pct { font-size: 20px; font-weight: 700; color: var(--green); }
.growth-sub { font-size: 12px; color: var(--gray-500, #6b7280); margin-top: 2px; }

/* ── Table Card ── */
.table-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.table-card .card-header { padding: 18px 22px 0; }

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

thead tr { background: var(--gray-50); }
thead th {
    padding: 10px 16px;
    text-align: left;
    color: var(--gray-600);
    font-weight: 600;
    font-size: 12px;
    white-space: nowrap;
    border-bottom: 1px solid var(--gray-100);
}

tbody tr { border-bottom: 1px solid var(--gray-100); transition: background 0.1s; }
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: var(--gray-50); }

tbody td { padding: 12px 16px; color: var(--gray-700); }
tbody td.code { color: var(--gray-500); font-weight: 500; }
tbody td.no   { color: var(--gray-500); }

.item-name {
    display: flex; align-items: center; gap: 10px;
}

.item-thumb {
    width: 30px; height: 30px; border-radius: 6px;
    background: var(--gray-100);
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; flex-shrink: 0;
}

.stok-val { font-weight: 700; }
.stok-0   { color: var(--red); }
.stok-low { color: var(--amber); }
.stok-ok  { color: var(--gray-900); }

/* Status badges */
.badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 3px 11px;
    border-radius: 20px;
    font-size: 12px; font-weight: 600;
}

.badge-aman    { background: #e8f5ee; color: #1a7a40; }
.badge-menipis { background: #fff7e6; color: #b45309; }
.badge-habis   { background: #fef2f2; color: #b91c1c; }

.badge-dot {
    width: 6px; height: 6px; border-radius: 50%;
    display: inline-block;
}
.badge-aman    .badge-dot { background: #22c55e; }
.badge-menipis .badge-dot { background: #f59e0b; }
.badge-habis   .badge-dot { background: #ef4444; }

/* Action buttons */
.actions { display: flex; gap: 6px; }
.btn-icon {
    border: none; background: transparent; cursor: pointer;
    padding: 5px; border-radius: 6px; transition: background 0.12s;
    display: flex; align-items: center;
}
.btn-edit  { color: #3b82f6; }
.btn-del   { color: #ef4444; }
.btn-edit:hover { background: var(--blue-light); }
.btn-del:hover  { background: var(--red-light); }

/* Pagination */
.pagination-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 18px;
    border-top: 1px solid var(--gray-100);
    font-size: 12.5px;
    color: var(--gray-500);
}

.page-btns { display: flex; align-items: center; gap: 6px; }

.page-btn {
    border: 1px solid var(--gray-200);
    background: var(--white);
    color: var(--gray-700);
    border-radius: 6px;
    padding: 5px 11px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.12s;
    font-family: inherit;
}
.page-btn:hover { border-color: var(--blue); color: var(--blue); }
.page-btn.active { background: var(--blue); border-color: var(--blue); color: white; font-weight: 600; }

.per-page-select {
    border: 1px solid var(--gray-200);
    border-radius: 6px;
    padding: 5px 10px;
    font-size: 12.5px;
    font-family: inherit;
    color: var(--gray-700);
    cursor: pointer; outline: none;
}
</style>
</head>
<body>

<!-- ═══════════════════════════════════════ SIDEBAR ═══ -->
<aside class="sidebar">

    <div class="sidebar-logo">
        <div class="logo-icon">🏭</div>
        <div class="logo-text">
            <div class="title">Gudang Elektronik</div>
            <div class="sub">Sistem Stok Gudang</div>
        </div>
    </div>

    <ul class="sidebar-nav">
        <?php foreach ($nav_items as $item): ?>
        <li class="<?= $item['active'] ? 'active' : '' ?>">
            <a href="<?= htmlspecialchars($item['href']) ?>">
                <?php
                // Inline SVG icons (Tabler-style outlines)
                $icons = [
                    'grid'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
                    'package'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3L2 7.5v9L12 21l10-4.5v-9L12 3z"/><path d="M2 7.5l10 4.5 10-4.5"/><line x1="12" y1="12" x2="12" y2="21"/></svg>',
                    'tag'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>',
                    'truck'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 5v4h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
                    'download'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>',
                    'upload'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>',
                    'file-text' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
                    'settings'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>',
                ];
                echo $icons[$item['icon']] ?? '';
                ?>
                <?= htmlspecialchars($item['label']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="sidebar-user">
        <div class="user-avatar">AG</div>
        <div class="user-info">
            <div class="name">Admin Gudang</div>
            <div class="email">admin@gudangelektronik.id</div>
        </div>
    </div>

</aside>

<!-- ═══════════════════════════════════════ MAIN ═══════ -->
<main class="main">

    <!-- Topbar -->
    <header class="topbar">
        <h1>Dashboard</h1>
        <div class="topbar-right">
            <div class="search-wrap">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" placeholder="Cari barang, kode, atau kategori...">
            </div>
            <div class="notif-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                <span class="badge">2</span>
            </div>
            <div class="admin-info">
                <div class="admin-avatar">AG</div>
                <span class="admin-name">Admin Gudang</span>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="content">

        <!-- Stat Cards -->
        <div class="stat-grid">
            <!-- Total Barang -->
            <div class="stat-card stat-blue">
                <div class="stat-icon">📦</div>
                <div>
                    <div class="stat-label">Total Barang</div>
                    <div class="stat-value"><?= number_format($stats['total']) ?></div>
                    <div class="stat-sub">Semua barang</div>
                </div>
            </div>
            <!-- Stok Aman -->
            <div class="stat-card stat-green">
                <div class="stat-icon">✅</div>
                <div>
                    <div class="stat-label">Stok Aman</div>
                    <div class="stat-value"><?= number_format($stats['aman']) ?></div>
                    <div class="stat-sub">Stok mencukupi</div>
                </div>
            </div>
            <!-- Stok Menipis -->
            <div class="stat-card stat-amber">
                <div class="stat-icon">⚠️</div>
                <div>
                    <div class="stat-label">Stok Menipis</div>
                    <div class="stat-value"><?= number_format($stats['menipis']) ?></div>
                    <div class="stat-sub">Perlu diperhatikan</div>
                </div>
            </div>
            <!-- Stok Habis -->
            <div class="stat-card stat-red">
                <div class="stat-icon">🚫</div>
                <div>
                    <div class="stat-label">Stok Habis</div>
                    <div class="stat-value"><?= number_format($stats['habis']) ?></div>
                    <div class="stat-sub">Segera restock</div>
                </div>
            </div>
        </div>

        <!-- Middle Row: Chart + Calendar/Growth -->
        <div class="middle-row">

            <!-- Bar Chart -->
            <div class="chart-card">
                <div class="card-header">
                    <span class="card-title">Total Stok</span>
                    <select class="period-select" id="periodSelect">
                        <option>6 Bulan Terakhir</option>
                        <option>3 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
                <canvas id="stockChart" style="max-height:220px;"></canvas>
            </div>

            <!-- Right column -->
            <div class="right-col">

                <!-- Calendar -->
                <div class="calendar-card">
                    <div class="cal-header">
                        <button class="cal-nav" id="prevMonth">&#8249;</button>
                        <span class="cal-month" id="calTitle">September 2024</span>
                        <button class="cal-nav" id="nextMonth">&#8250;</button>
                    </div>
                    <div class="cal-grid" id="calGrid"></div>
                </div>

                <!-- Growth Donut -->
                <div class="growth-card">
                    <div style="flex:1">
                        <div class="growth-title">Pertumbuhan Stok</div>
                        <div class="growth-pct">+12.5%</div>
                        <div class="growth-sub">dari bulan lalu</div>
                    </div>
                    <div class="donut-wrap">
                        <canvas id="donutChart"></canvas>
                        <div class="donut-label">65%</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="table-card">
            <div class="card-header" style="padding:18px 22px 14px;">
                <span class="card-title">Stok Barang Terakhir</span>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $b): ?>
                    <tr>
                        <td class="no"><?= $b['no'] ?></td>
                        <td class="code"><?= htmlspecialchars($b['kode']) ?></td>
                        <td>
                            <div class="item-name">
                                <div class="item-thumb"><?= $b['icon'] ?></div>
                                <?= htmlspecialchars($b['nama']) ?>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($b['kategori']) ?></td>
                        <td><?= htmlspecialchars($b['lokasi']) ?></td>
                        <td>
                            <span class="stok-val <?= $b['stok'] === 0 ? 'stok-0' : ($b['stok'] <= 10 ? 'stok-low' : 'stok-ok') ?>">
                                <?= $b['stok'] ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge <?= status_class($b['status']) ?>">
                                <span class="badge-dot"></span>
                                <?= htmlspecialchars($b['status']) ?>
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="btn-icon btn-edit" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </button>
                                <button class="btn-icon btn-del" title="Hapus">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="pagination-row">
                <span>Menampilkan 1–<?= count($barang) ?> dari <?= count($barang) ?> data</span>
                <div style="display:flex;align-items:center;gap:10px;">
                    <div class="page-btns">
                        <button class="page-btn">&#8249;</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">&#8250;</button>
                    </div>
                    <select class="per-page-select">
                        <option>5 / halaman</option>
                        <option>10 / halaman</option>
                        <option>25 / halaman</option>
                    </select>
                </div>
            </div>
        </div>

    </div><!-- /content -->
</main>

<!-- ═══════════════════════════════════════ SCRIPTS ════ -->
<script>
// ── Pass PHP data to JS ──────────────────────────────
const chartData = <?= $chart_json ?>;

// ── Bar Chart ────────────────────────────────────────
(function() {
    const ctx = document.getElementById('stockChart').getContext('2d');
    const labels = chartData.map(d => d.bulan);
    const values = chartData.map(d => d.stok);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                data: values,
                backgroundColor: '#3b82f6',
                borderRadius: 6,
                borderSkipped: false,
                hoverBackgroundColor: '#2563eb',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1f2937',
                    titleFont: { family: 'DM Sans', size: 12 },
                    bodyFont:  { family: 'DM Sans', size: 13 },
                    padding: 10,
                    callbacks: {
                        label: ctx => ' Stok: ' + ctx.parsed.y
                    }
                },
                datalabels: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#9ca3af', font: { size: 11, family: 'DM Sans' }, stepSize: 100 },
                    grid: { color: '#f3f4f6' },
                    border: { display: false },
                },
                x: {
                    ticks: { color: '#6b7280', font: { size: 12, family: 'DM Sans' } },
                    grid: { display: false },
                    border: { display: false },
                }
            }
        },
        plugins: [{
            // draw value labels above bars
            id: 'topLabels',
            afterDatasetsDraw(chart) {
                const { ctx, data } = chart;
                chart.getDatasetMeta(0).data.forEach((bar, i) => {
                    ctx.save();
                    ctx.font = '600 12px DM Sans';
                    ctx.fillStyle = '#374151';
                    ctx.textAlign = 'center';
                    ctx.fillText(data.datasets[0].data[i], bar.x, bar.y - 6);
                    ctx.restore();
                });
            }
        }]
    });
})();

// ── Donut Chart ──────────────────────────────────────
(function() {
    const ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [65, 35],
                backgroundColor: ['#3b82f6', '#e5e7eb'],
                borderWidth: 0,
                hoverOffset: 0,
            }]
        },
        options: {
            cutout: '76%',
            responsive: false,
            plugins: { legend: { display: false }, tooltip: { enabled: false } },
        }
    });
})();

// ── Calendar ─────────────────────────────────────────
(function() {
    const days  = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    let year = 2024, month = 8; // September 2024 (0-indexed)
    const today = { y: 2024, m: 8, d: 19 };

    function render() {
        document.getElementById('calTitle').textContent = months[month] + ' ' + year;

        const grid = document.getElementById('calGrid');
        grid.innerHTML = '';

        // Day name headers
        days.forEach(d => {
            const el = document.createElement('div');
            el.className = 'cal-day-name';
            el.textContent = d;
            grid.appendChild(el);
        });

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const prevDays = new Date(year, month, 0).getDate();

        // Prev month days
        for (let i = firstDay - 1; i >= 0; i--) {
            const el = document.createElement('div');
            el.className = 'cal-day other-month';
            el.textContent = prevDays - i;
            grid.appendChild(el);
        }

        // Current month days
        for (let d = 1; d <= daysInMonth; d++) {
            const el = document.createElement('div');
            el.className = 'cal-day';
            if (year === today.y && month === today.m && d === today.d) el.classList.add('today');
            el.textContent = d;
            grid.appendChild(el);
        }

        // Next month fill
        const filled = firstDay + daysInMonth;
        const remaining = filled % 7 === 0 ? 0 : 7 - (filled % 7);
        for (let d = 1; d <= remaining; d++) {
            const el = document.createElement('div');
            el.className = 'cal-day other-month';
            el.textContent = d;
            grid.appendChild(el);
        }
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        month--; if (month < 0) { month = 11; year--; }
        render();
    });
    document.getElementById('nextMonth').addEventListener('click', () => {
        month++; if (month > 11) { month = 0; year++; }
        render();
    });

    render();
})();
</script>

</body>
</html>
