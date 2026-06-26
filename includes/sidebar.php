<?php
require_once __DIR__ . '/../config/app.php';

$navItems = require __DIR__ . '/../data/nav.php';

$authUser = $_SESSION['auth_user'] ?? [];

$activeMenu = $activeMenu ?? '';
$userName = $userName ?? ($authUser['nama'] ?? 'Admin Gudang');
$userEmail = $userEmail ?? ($authUser['email'] ?? 'admin@gudangelektronik.id');
$cleanName = trim((string) $userName);
$nameParts = preg_split('/\s+/', $cleanName) ?: [];
$firstInitial = strtoupper(substr($nameParts[0] ?? 'A', 0, 1));
$secondInitial = strtoupper(substr($nameParts[1] ?? ($nameParts[0] ?? 'G'), 0, 1));
$userInitials = $userInitials ?? ($firstInitial . $secondInitial);
?>

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
            <a
                href="<?= e($item['url'] ?? '#'); ?>"
                class="<?= $activeMenu === ($item['key'] ?? '') ? 'active' : ''; ?>"
            >
                <i class="<?= e($item['icon'] ?? 'ri-circle-line'); ?>"></i>
                <span><?= e($item['label'] ?? 'Menu'); ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="inventory-user">
        <div class="inventory-avatar"><?= e($userInitials); ?></div>
        <div>
            <strong><?= e($userName); ?></strong>
            <span><?= e($userEmail); ?></span>
        </div>
    </div>
</aside>
