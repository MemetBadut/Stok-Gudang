<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gudang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/utilities.css">
    <link rel="stylesheet" href="../assets/css/pages/dashboard.css">
</head>
<body>
    <div class="dashboard-shell">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-logo-wrap">
                    <img src="../assets/img/logo-gudang-01.png" alt="Logo Gudang Elektronik">
                </div>
                <div class="brand-copy">
                    <h1>ELC</h1>
                    <p>Gudang Elektronik</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="#" class="active"><i class="ri-home-5-line"></i>Dashboard</a>
                <a href="#"><i class="ri-box-3-line"></i>Stok Barang</a>
                <a href="#"><i class="ri-apps-2-line"></i>Kategori</a>
                <a href="#"><i class="ri-truck-line"></i>Supplier</a>
                <a href="#"><i class="ri-login-box-line"></i>Barang Masuk</a>
                <a href="#"><i class="ri-logout-box-r-line"></i>Barang Keluar</a>
                <a href="#"><i class="ri-file-list-3-line"></i>Laporan</a>
                <a href="#"><i class="ri-settings-3-line"></i>Pengaturan</a>
            </nav>

            <div class="sidebar-user">
                <div class="avatar">
                    <i class="ri-user-3-line"></i>
                </div>
                <div class="identity">
                    <strong>User Gudang</strong>
                    <span>user@gudangelektronik.id</span>
                </div>
                <i class="ri-arrow-down-s-line chevron"></i>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <h1>Dashboard</h1>
                <div class="topbar-right">
                    <label class="search">
                        <i class="ri-search-line"></i>
                        <input type="text" placeholder="Cari barang, kode, atau kategori...">
                    </label>
                    <div class="top-icons">
                        <div class="notif">
                            <i class="ri-notification-3-line"></i>
                            <span class="badge">3</span>
                        </div>
                        <div class="top-user">
                            <i class="ri-account-circle-line"></i>
                            <span>User Gudang</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </div>
                </div>
            </header>

            <section class="stats-grid">
                <article class="stat-card">
                    <div class="stat-icon blue"><i class="ri-cpu-line"></i></div>
                    <div class="stat-content">
                        <p class="stat-top">Total Barang</p>
                        <h3>512</h3>
                        <p class="stat-foot blue-text">Semua barang</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon green"><i class="ri-inbox-archive-line"></i></div>
                    <div class="stat-content">
                        <p class="stat-top">Stok Aman</p>
                        <h3>312 <span class="sub-rate green-text">(60.9%)</span></h3>
                        <p class="stat-foot green-text">Stok mencukupi</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon orange"><i class="ri-error-warning-line"></i></div>
                    <div class="stat-content">
                        <p class="stat-top">Stok Menipis</p>
                        <h3>134 <span class="sub-rate orange-text">(26.2%)</span></h3>
                        <p class="stat-foot orange-text">Perlu diperhatikan</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon red"><i class="ri-calendar-check-line"></i></div>
                    <div class="stat-content">
                        <p class="stat-top">Aktivitas Hari Ini</p>
                        <h3>18</h3>
                        <p class="stat-foot red-text">Transaksi masuk &amp; keluar</p>
                    </div>
                </article>
            </section>

            <section class="dashboard-grid">
                <div class="left-stack">
                    <article class="panel chart-card">
                        <div class="panel-head">
                            <h3>Ringkasan Stok per Kategori</h3>
                        </div>

                        <div class="chart-wrap">
                            <div class="y-axis">
                                <span>125</span>
                                <span>100</span>
                                <span>75</span>
                                <span>50</span>
                                <span>25</span>
                                <span>0</span>
                            </div>
                            <div class="bars">
                                <div class="bar-item" style="--value:120;">
                                    <span class="bar-value">120</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Komponen</span>
                                </div>
                                <div class="bar-item" style="--value:98;">
                                    <span class="bar-value">98</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Periferal</span>
                                </div>
                                <div class="bar-item" style="--value:85;">
                                    <span class="bar-value">85</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Monitor</span>
                                </div>
                                <div class="bar-item" style="--value:76;">
                                    <span class="bar-value">76</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Penyimpanan</span>
                                </div>
                                <div class="bar-item" style="--value:58;">
                                    <span class="bar-value">58</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Perangkat</span>
                                </div>
                                <div class="bar-item" style="--value:40;">
                                    <span class="bar-value">40</span>
                                    <div class="bar"></div>
                                    <span class="bar-label">Lainnya</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart-legend">
                            <span class="legend-dot"></span>
                            <span>Jumlah Barang</span>
                        </div>
                    </article>

                    <article class="panel stock-card">
                        <div class="panel-head">
                            <h3>Barang Stok Menipis</h3>
                            <a href="#">Lihat semua</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ELC-004</td>
                                    <td>
                                        <div class="product-cell">
                                            <span class="thumb"><i class="ri-cpu-line"></i></span>
                                            <span>Motherboard B550</span>
                                        </div>
                                    </td>
                                    <td class="danger">0</td>
                                    <td>Rak B1</td>
                                </tr>
                                <tr>
                                    <td>ELC-008</td>
                                    <td>
                                        <div class="product-cell">
                                            <span class="thumb"><i class="ri-printer-line"></i></span>
                                            <span>Printer Inkjet</span>
                                        </div>
                                    </td>
                                    <td class="warning">5</td>
                                    <td>Rak C1</td>
                                </tr>
                                <tr>
                                    <td>ELC-010</td>
                                    <td>
                                        <div class="product-cell">
                                            <span class="thumb"><i class="ri-usb-line"></i></span>
                                            <span>USB Flash Drive 32GB</span>
                                        </div>
                                    </td>
                                    <td class="warning">60</td>
                                    <td>Rak C2</td>
                                </tr>
                                <tr>
                                    <td>ELC-003</td>
                                    <td>
                                        <div class="product-cell">
                                            <span class="thumb"><i class="ri-mouse-line"></i></span>
                                            <span>Mouse Wireless</span>
                                        </div>
                                    </td>
                                    <td class="warning">8</td>
                                    <td>Rak A1</td>
                                </tr>
                            </tbody>
                        </table>
                    </article>
                </div>

                <article class="panel activity-card">
                    <div class="panel-head">
                        <h3>Aktivitas Terbaru</h3>
                        <a href="#">Lihat semua</a>
                    </div>

                    <section class="activity-group">
                        <h4 class="group-title">
                            <i class="ri-arrow-down-circle-line in"></i>
                            Barang Masuk
                        </h4>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-hard-drive-2-line"></i></span>
                            <div>
                                <p class="item-name">Power Supply 650W</p>
                                <p class="item-sub">Dari PT. Sinar Elektronik</p>
                            </div>
                            <div class="item-right">
                                <span class="qty green-text">12 unit</span>
                                <span class="time">09:15</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-ram-2-line"></i></span>
                            <div>
                                <p class="item-name">RAM DDR4 16GB</p>
                                <p class="item-sub">Dari CV. Tech Nusantara</p>
                            </div>
                            <div class="item-right">
                                <span class="qty green-text">35 unit</span>
                                <span class="time">08:30</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-save-3-line"></i></span>
                            <div>
                                <p class="item-name">SSD NVMe 1TB</p>
                                <p class="item-sub">Dari PT. Mega Tech</p>
                            </div>
                            <div class="item-right">
                                <span class="qty green-text">22 unit</span>
                                <span class="time">07:45</span>
                            </div>
                        </div>
                    </section>

                    <hr class="divider">

                    <section class="activity-group">
                        <h4 class="group-title">
                            <i class="ri-arrow-up-circle-line out"></i>
                            Barang Keluar
                        </h4>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-tv-line"></i></span>
                            <div>
                                <p class="item-name">Monitor LED 24"</p>
                                <p class="item-sub">Ke Toko Mandiri</p>
                            </div>
                            <div class="item-right">
                                <span class="qty red-text">5 unit</span>
                                <span class="time">14:20</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-keyboard-line"></i></span>
                            <div>
                                <p class="item-name">Keyboard Mechanical</p>
                                <p class="item-sub">Ke Service Center</p>
                            </div>
                            <div class="item-right">
                                <span class="qty red-text">3 unit</span>
                                <span class="time">13:10</span>
                            </div>
                        </div>

                        <div class="activity-item">
                            <span class="thumb"><i class="ri-mouse-line"></i></span>
                            <div>
                                <p class="item-name">Mouse Wireless</p>
                                <p class="item-sub">Ke Toko Sejahtera</p>
                            </div>
                            <div class="item-right">
                                <span class="qty red-text">8 unit</span>
                                <span class="time">11:05</span>
                            </div>
                        </div>
                    </section>
                </article>
            </section>
        </main>
    </div>
</body>
</html>
