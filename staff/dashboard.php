<?php
require_once __DIR__ . '/../auth/session.php';

requireRole(['staff']);

$user = authUser();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Staff</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>
<body>
    <h1>Dashboard Staff</h1>
    <p>Halo, <?= e($user['nama'] ?? 'Staff'); ?></p>

    <a href="../auth/logout.php">Logout</a>
</body>
</html>