<?php
$initialData = [
    ['id' => 'ELC-001', 'nama' => 'Monitor LED 24"', 'kategori' => 'Monitor', 'lokasi' => 'Rak A1', 'stok' => 28, 'tglMasuk' => '18 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baik'],
    ['id' => 'ELC-002', 'nama' => 'Keyboard Mechanical', 'kategori' => 'Peripheral', 'lokasi' => 'Rak B1', 'stok' => 15, 'tglMasuk' => '20 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baik'],
    ['id' => 'ELC-003', 'nama' => 'Mouse Wireless', 'kategori' => 'Peripheral', 'lokasi' => 'Rak B2', 'stok' => 8, 'tglMasuk' => '19 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baik'],
    ['id' => 'ELC-004', 'nama' => 'Motherboard B550', 'kategori' => 'Komponen', 'lokasi' => 'Rak C1', 'stok' => 5, 'tglMasuk' => '22 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baru'],
    ['id' => 'ELC-005', 'nama' => 'Power Supply 650W', 'kategori' => 'Komponen', 'lokasi' => 'Rak C2', 'stok' => 0, 'tglMasuk' => '21 Mei 2024', 'tglKeluar' => null, 'status' => 'Habis', 'kondisi' => 'Baik'],
    ['id' => 'ELC-006', 'nama' => 'RAM DDR4 16GB', 'kategori' => 'Komponen', 'lokasi' => 'Rak C3', 'stok' => 12, 'tglMasuk' => '20 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baru'],
    ['id' => 'ELC-007', 'nama' => 'SSD NVMe 1TB', 'kategori' => 'Penyimpanan', 'lokasi' => 'Rak D1', 'stok' => 9, 'tglMasuk' => '17 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baik'],
    ['id' => 'ELC-008', 'nama' => 'Printer Inkjet', 'kategori' => 'Peripheral', 'lokasi' => 'Rak D2', 'stok' => 14, 'tglMasuk' => '16 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baik'],
    ['id' => 'ELC-009', 'nama' => 'Laptop Gaming i5', 'kategori' => 'Komponen', 'lokasi' => 'Rak E1', 'stok' => 6, 'tglMasuk' => '15 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baru'],
    ['id' => 'ELC-010', 'nama' => 'USB Flash Drive 32GB', 'kategori' => 'Aksesoris', 'lokasi' => 'Rak E2', 'stok' => 20, 'tglMasuk' => '14 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baik'],
    ['id' => 'ELC-011', 'nama' => 'Webcam HD 1080p', 'kategori' => 'Peripheral', 'lokasi' => 'Rak B3', 'stok' => 33, 'tglMasuk' => '13 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baru'],
    ['id' => 'ELC-012', 'nama' => 'Headset Gaming', 'kategori' => 'Aksesoris', 'lokasi' => 'Rak E3', 'stok' => 42, 'tglMasuk' => '12 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baik'],
    ['id' => 'ELC-013', 'nama' => 'GPU RTX 3060', 'kategori' => 'Komponen', 'lokasi' => 'Rak C4', 'stok' => 3, 'tglMasuk' => '11 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baru'],
    ['id' => 'ELC-014', 'nama' => 'HDD External 2TB', 'kategori' => 'Penyimpanan', 'lokasi' => 'Rak D3', 'stok' => 7, 'tglMasuk' => '10 Mei 2024', 'tglKeluar' => null, 'status' => 'Menipis', 'kondisi' => 'Baik'],
    ['id' => 'ELC-015', 'nama' => 'Cooling Pad Laptop', 'kategori' => 'Aksesoris', 'lokasi' => 'Rak E4', 'stok' => 25, 'tglMasuk' => '9 Mei 2024', 'tglKeluar' => null, 'status' => 'Aman', 'kondisi' => 'Baik'],
];

$navItems = [
    ['label' => 'Dashboard', 'icon' => 'ri-dashboard-line'],
    ['label' => 'Stok Barang', 'icon' => 'ri-box-3-line', 'active' => true],
    ['label' => 'Kategori', 'icon' => 'ri-apps-2-line'],
    ['label' => 'Supplier', 'icon' => 'ri-truck-line'],
    ['label' => 'Barang Masuk', 'icon' => 'ri-login-box-line'],
    ['label' => 'Barang Keluar', 'icon' => 'ri-logout-box-r-line'],
    ['label' => 'Laporan', 'icon' => 'ri-file-list-3-line'],
    ['label' => 'Pengaturan', 'icon' => 'ri-settings-3-line'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang - Gudang Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/utilities.css">
    <link rel="stylesheet" href="assets/css/pages/barang.css">
</head>
<body>
    <div class="inventory-shell">
        <aside class="inventory-sidebar">
            <div class="inventory-brand">
                <div class="inventory-logo">
                    <i class="ri-building-4-line"></i>
                </div>
                <div>
                    <strong>Gudang Elektronik</strong>
                    <span>Sistem Stok Gudang</span>
                </div>
            </div>

            <nav class="inventory-nav" aria-label="Menu gudang">
                <?php foreach ($navItems as $item) : ?>
                    <button type="button" class="<?= !empty($item['active']) ? 'active' : ''; ?>">
                        <i class="<?= htmlspecialchars($item['icon']); ?>"></i>
                        <span><?= htmlspecialchars($item['label']); ?></span>
                    </button>
                <?php endforeach; ?>
            </nav>

            <div class="inventory-user">
                <div class="inventory-avatar">AG</div>
                <div>
                    <strong>Admin Gudang</strong>
                    <span>admin@gudangelektronik.id</span>
                </div>
            </div>
        </aside>

        <main class="inventory-main">
            <header class="inventory-topbar">
                <h1>Stok Barang</h1>
                <div class="inventory-topbar-actions">
                    <label class="inventory-search">
                        <i class="ri-search-line"></i>
                        <input type="search" id="searchInput" placeholder="Cari barang, kode, atau kategori...">
                    </label>
                    <button class="icon-button" type="button" aria-label="Notifikasi">
                        <i class="ri-notification-3-line"></i>
                        <span>2</span>
                    </button>
                    <div class="inventory-profile">
                        <div class="inventory-avatar small">AG</div>
                        <span>Admin Gudang</span>
                    </div>
                </div>
            </header>

            <section class="inventory-content">
                <div class="inventory-stats">
                    <article class="inventory-stat">
                        <div class="stat-symbol blue"><i class="ri-box-3-line"></i></div>
                        <div>
                            <span>Total Barang</span>
                            <strong id="statTotal">0</strong>
                            <small>Semua barang</small>
                        </div>
                    </article>
                    <article class="inventory-stat">
                        <div class="stat-symbol green"><i class="ri-checkbox-circle-line"></i></div>
                        <div>
                            <span>Stok Aman</span>
                            <strong id="statAman">0</strong>
                            <small>Stok mencukupi</small>
                        </div>
                    </article>
                    <article class="inventory-stat">
                        <div class="stat-symbol amber"><i class="ri-error-warning-line"></i></div>
                        <div>
                            <span>Stok Menipis</span>
                            <strong id="statMenipis">0</strong>
                            <small>Perlu diperhatikan</small>
                        </div>
                    </article>
                    <article class="inventory-stat">
                        <div class="stat-symbol red"><i class="ri-close-circle-line"></i></div>
                        <div>
                            <span>Stok Habis</span>
                            <strong id="statHabis">0</strong>
                            <small>Segera restock</small>
                        </div>
                    </article>
                </div>

                <section class="inventory-card">
                    <div class="inventory-toolbar">
                        <div class="toolbar-field">
                            <label for="statusFilter">Stok</label>
                            <select id="statusFilter" class="form-select form-select-sm">
                                <option value="Semua">Semua</option>
                                <option value="Aman">Aman</option>
                                <option value="Menipis">Menipis</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>
                        <div class="toolbar-field">
                            <label for="kondisiFilter">Kondisi</label>
                            <select id="kondisiFilter" class="form-select form-select-sm">
                                <option value="Semua">Semua</option>
                                <option value="Baik">Baik</option>
                                <option value="Baru">Baru</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="toolbar-actions">
                            <button type="button" class="btn btn-primary btn-sm" id="addButton">
                                <i class="ri-add-line"></i>
                                Tambah Barang
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="exportButton">
                                <i class="ri-download-2-line"></i>
                                Export
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table inventory-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Stok</th>
                                    <th>Tgl Masuk</th>
                                    <th>Tgl Keluar</th>
                                    <th>Status</th>
                                    <th>Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="barangTableBody"></tbody>
                        </table>
                    </div>

                    <div class="inventory-pagination">
                        <span id="paginationInfo">Menampilkan 0 dari 0 data</span>
                        <div class="pagination-buttons" id="paginationButtons"></div>
                    </div>
                </section>
            </section>
        </main>
    </div>

    <div class="toast-notification" id="notification" role="status" aria-live="polite"></div>

    <div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="barangModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id="barangForm">
                <div class="modal-header">
                    <h2 class="modal-title fs-6" id="barangModalLabel">Tambah Barang Baru</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId">

                    <div class="mb-3">
                        <label for="kodeBarang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="kodeBarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="kategoriBarang" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategoriBarang" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lokasiBarang" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasiBarang" required>
                        </div>
                    </div>
                    <div class="row g-3 mt-0">
                        <div class="col-md-6">
                            <label for="stokBarang" class="form-label">Stok</label>
                            <input type="number" min="0" class="form-control" id="stokBarang" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggalMasuk" class="form-label">Tgl Masuk</label>
                            <input type="text" class="form-control" id="tanggalMasuk" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="kondisiBarang" class="form-label">Kondisi</label>
                        <select class="form-select" id="kondisiBarang">
                            <option value="Baik">Baik</option>
                            <option value="Baru">Baru</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const ITEMS_PER_PAGE = 10;
        let barangData = <?= json_encode($initialData, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
        let currentPage = 1;
        let editModeId = null;

        const elements = {
            search: document.getElementById("searchInput"),
            statusFilter: document.getElementById("statusFilter"),
            kondisiFilter: document.getElementById("kondisiFilter"),
            tbody: document.getElementById("barangTableBody"),
            paginationInfo: document.getElementById("paginationInfo"),
            paginationButtons: document.getElementById("paginationButtons"),
            notification: document.getElementById("notification"),
            modalTitle: document.getElementById("barangModalLabel"),
            form: document.getElementById("barangForm"),
            addButton: document.getElementById("addButton"),
            exportButton: document.getElementById("exportButton"),
            saveButton: document.getElementById("saveButton"),
            editId: document.getElementById("editId"),
            kode: document.getElementById("kodeBarang"),
            nama: document.getElementById("namaBarang"),
            kategori: document.getElementById("kategoriBarang"),
            lokasi: document.getElementById("lokasiBarang"),
            stok: document.getElementById("stokBarang"),
            tanggalMasuk: document.getElementById("tanggalMasuk"),
            kondisi: document.getElementById("kondisiBarang"),
            statTotal: document.getElementById("statTotal"),
            statAman: document.getElementById("statAman"),
            statMenipis: document.getElementById("statMenipis"),
            statHabis: document.getElementById("statHabis"),
        };

        const barangModal = new bootstrap.Modal(document.getElementById("barangModal"));

        function escapeHtml(value) {
            return String(value ?? "")
                .replaceAll("&", "&amp;")
                .replaceAll("<", "&lt;")
                .replaceAll(">", "&gt;")
                .replaceAll('"', "&quot;")
                .replaceAll("'", "&#039;");
        }

        function getTodayIndonesian() {
            return new Date().toLocaleDateString("id-ID", {
                day: "numeric",
                month: "long",
                year: "numeric",
            });
        }

        function getStatusByStok(stok) {
            const total = Number(stok);
            if (total === 0) return "Habis";
            if (total <= 10) return "Menipis";
            return "Aman";
        }

        function getCategoryIcon(kategori) {
            const normalized = String(kategori).toLowerCase();
            if (normalized.includes("monitor")) return "ri-tv-line";
            if (normalized.includes("peripheral")) return "ri-keyboard-line";
            if (normalized.includes("komponen")) return "ri-cpu-line";
            if (normalized.includes("penyimpanan")) return "ri-hard-drive-2-line";
            if (normalized.includes("aksesoris")) return "ri-plug-line";
            return "ri-box-3-line";
        }

        function statusBadge(status) {
            const safeStatus = escapeHtml(status);
            const className = {
                Aman: "status-safe",
                Menipis: "status-warning",
                Habis: "status-danger",
            }[status] || "status-safe";

            return `<span class="status-badge ${className}"><span></span>${safeStatus}</span>`;
        }

        function kondisiBadge(kondisi) {
            const safeKondisi = escapeHtml(kondisi);
            const className = {
                Baik: "condition-good",
                Baru: "condition-new",
                Rusak: "condition-bad",
            }[kondisi] || "condition-good";

            return `<span class="condition-badge ${className}">${safeKondisi}</span>`;
        }

        function getFilteredData() {
            const query = elements.search.value.trim().toLowerCase();
            const status = elements.statusFilter.value;
            const kondisi = elements.kondisiFilter.value;

            return barangData.filter((item) => {
                const searchable = `${item.id} ${item.nama} ${item.kategori}`.toLowerCase();
                const matchSearch = searchable.includes(query);
                const matchStatus = status === "Semua" || item.status === status;
                const matchKondisi = kondisi === "Semua" || item.kondisi === kondisi;
                return matchSearch && matchStatus && matchKondisi;
            });
        }

        function renderStats() {
            elements.statTotal.textContent = barangData.length;
            elements.statAman.textContent = barangData.filter((item) => item.status === "Aman").length;
            elements.statMenipis.textContent = barangData.filter((item) => item.status === "Menipis").length;
            elements.statHabis.textContent = barangData.filter((item) => item.status === "Habis").length;
        }

        function renderTable() {
            const filtered = getFilteredData();
            const totalPages = Math.ceil(filtered.length / ITEMS_PER_PAGE) || 1;

            if (currentPage > totalPages) {
                currentPage = totalPages;
            }

            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const paged = filtered.slice(startIndex, startIndex + ITEMS_PER_PAGE);

            if (paged.length === 0) {
                elements.tbody.innerHTML = `
                    <tr>
                        <td colspan="10" class="empty-row">Tidak ada data ditemukan</td>
                    </tr>
                `;
            } else {
                elements.tbody.innerHTML = paged.map((item) => `
                    <tr>
                        <td class="text-muted fw-semibold">${escapeHtml(item.id)}</td>
                        <td>
                            <div class="inventory-product">
                                <span><i class="${getCategoryIcon(item.kategori)}"></i></span>
                                <strong>${escapeHtml(item.nama)}</strong>
                            </div>
                        </td>
                        <td>${escapeHtml(item.kategori)}</td>
                        <td>${escapeHtml(item.lokasi)}</td>
                        <td class="stock-number ${item.stok === 0 ? "danger" : item.stok <= 10 ? "warning" : ""}">${escapeHtml(item.stok)}</td>
                        <td>${escapeHtml(item.tglMasuk)}</td>
                        <td class="text-muted">${escapeHtml(item.tglKeluar || "-")}</td>
                        <td>${statusBadge(item.status)}</td>
                        <td>${kondisiBadge(item.kondisi)}</td>
                        <td>
                            <div class="table-actions">
                                <button type="button" onclick="openEdit('${escapeHtml(item.id)}')" aria-label="Edit ${escapeHtml(item.nama)}">
                                    <i class="ri-pencil-line"></i>
                                </button>
                                <button type="button" class="danger" onclick="deleteItem('${escapeHtml(item.id)}')" aria-label="Hapus ${escapeHtml(item.nama)}">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `).join("");
            }

            const from = filtered.length === 0 ? 0 : startIndex + 1;
            const to = Math.min(startIndex + ITEMS_PER_PAGE, filtered.length);
            elements.paginationInfo.textContent = `Menampilkan ${from}-${to} dari ${filtered.length} data`;
            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            const buttons = [];
            buttons.push(`
                <button type="button" ${currentPage === 1 ? "disabled" : ""} onclick="goToPage(${currentPage - 1})">
                    <i class="ri-arrow-left-s-line"></i>
                </button>
            `);

            for (let page = 1; page <= totalPages; page += 1) {
                buttons.push(`
                    <button type="button" class="${page === currentPage ? "active" : ""}" onclick="goToPage(${page})">
                        ${page}
                    </button>
                `);
            }

            buttons.push(`
                <button type="button" ${currentPage === totalPages ? "disabled" : ""} onclick="goToPage(${currentPage + 1})">
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            `);

            elements.paginationButtons.innerHTML = buttons.join("");
        }

        function render() {
            renderStats();
            renderTable();
        }

        function goToPage(page) {
            currentPage = page;
            renderTable();
        }

        function showNotification(message, type = "success") {
            elements.notification.textContent = message;
            elements.notification.className = `toast-notification show ${type}`;

            window.setTimeout(() => {
                elements.notification.className = "toast-notification";
            }, 2500);
        }

        function openAdd() {
            editModeId = null;
            elements.modalTitle.textContent = "Tambah Barang Baru";
            elements.saveButton.textContent = "Tambah Barang";
            elements.form.reset();
            elements.editId.value = "";
            elements.kode.disabled = false;
            elements.kode.value = `ELC-${String(barangData.length + 1).padStart(3, "0")}`;
            elements.tanggalMasuk.value = getTodayIndonesian();
            elements.kondisi.value = "Baik";
            barangModal.show();
        }

        function openEdit(id) {
            const item = barangData.find((barang) => barang.id === id);
            if (!item) return;

            editModeId = id;
            elements.modalTitle.textContent = "Edit Barang";
            elements.saveButton.textContent = "Simpan Perubahan";
            elements.editId.value = item.id;
            elements.kode.value = item.id;
            elements.kode.disabled = true;
            elements.nama.value = item.nama;
            elements.kategori.value = item.kategori;
            elements.lokasi.value = item.lokasi;
            elements.stok.value = item.stok;
            elements.tanggalMasuk.value = item.tglMasuk;
            elements.kondisi.value = item.kondisi;
            barangModal.show();
        }

        function deleteItem(id) {
            const item = barangData.find((barang) => barang.id === id);
            if (!item || !confirm(`Hapus barang ${item.nama}?`)) return;

            barangData = barangData.filter((barang) => barang.id !== id);
            showNotification("Barang dihapus", "danger");
            render();
        }

        function saveItem(event) {
            event.preventDefault();

            const stok = Number.parseInt(elements.stok.value, 10);
            const payload = {
                id: elements.kode.value.trim(),
                nama: elements.nama.value.trim(),
                kategori: elements.kategori.value.trim(),
                lokasi: elements.lokasi.value.trim(),
                stok: Number.isNaN(stok) ? 0 : stok,
                tglMasuk: elements.tanggalMasuk.value.trim(),
                tglKeluar: null,
                kondisi: elements.kondisi.value,
            };
            payload.status = getStatusByStok(payload.stok);

            if (!payload.id || !payload.nama || !payload.kategori || !payload.lokasi || !payload.tglMasuk) {
                showNotification("Lengkapi data barang dulu", "danger");
                return;
            }

            const duplicate = barangData.some((item) => item.id === payload.id && item.id !== editModeId);
            if (duplicate) {
                showNotification("Kode barang sudah digunakan", "danger");
                return;
            }

            if (editModeId) {
                barangData = barangData.map((item) => item.id === editModeId ? payload : item);
                showNotification("Barang berhasil diperbarui");
            } else {
                barangData = [...barangData, payload];
                showNotification("Barang berhasil ditambahkan");
            }

            barangModal.hide();
            render();
        }

        function exportCsv() {
            const filtered = getFilteredData();
            const headers = ["Kode Barang", "Nama Barang", "Kategori", "Lokasi", "Stok", "Tgl Masuk", "Tgl Keluar", "Status", "Kondisi"];
            const rows = filtered.map((item) => [
                item.id,
                item.nama,
                item.kategori,
                item.lokasi,
                item.stok,
                item.tglMasuk,
                item.tglKeluar || "-",
                item.status,
                item.kondisi,
            ]);

            const csv = [headers, ...rows]
                .map((row) => row.map((cell) => `"${String(cell).replaceAll('"', '""')}"`).join(","))
                .join("\n");
            const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
            const url = URL.createObjectURL(blob);
            const link = document.createElement("a");

            link.href = url;
            link.download = "stok-barang.csv";
            link.click();
            URL.revokeObjectURL(url);
        }

        elements.search.addEventListener("input", () => {
            currentPage = 1;
            renderTable();
        });
        elements.statusFilter.addEventListener("change", () => {
            currentPage = 1;
            renderTable();
        });
        elements.kondisiFilter.addEventListener("change", () => {
            currentPage = 1;
            renderTable();
        });
        elements.addButton.addEventListener("click", openAdd);
        elements.exportButton.addEventListener("click", exportCsv);
        elements.form.addEventListener("submit", saveItem);

        render();
    </script>
</body>
</html>
