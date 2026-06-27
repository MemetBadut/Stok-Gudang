<?php
session_start();

$role = $_GET['role'] ?? 'admin';
if (!in_array($role, ['admin', 'staff'])) {
    $role = 'admin';
}

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);

$loginCssVersion = filemtime(__DIR__ . '/../assets/css/testcss/login.css');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gudang Elektronik</title>
    <link rel="stylesheet" href="../assets/css/testcss/login.css?v=<?= $loginCssVersion; ?>">
</head>
<body>
    <main class="login-page">
        <section class="login-card">
            <div class="login-brand">
                <div class="brand-content">
                    <img src="../assets/img/logo-gudang-01.png" alt="Logo Gudang Elektronik" class="brand-logo">
                    <h1>Gudang Elektronik</h1>
                    <p>Sistem Manajemen Stok Gudang</p>
                </div>
            </div>

            <div class="login-form-wrapper">
                <div class="form-header">
                    <h2>Selamat Datang</h2>
                    <p>Silakan pilih jenis akun untuk melanjutkan</p>
                </div>

                <div class="role-tabs">
                    <a href="login.php?role=admin" class="role-tab <?= $role === 'admin' ? 'active' : '' ?>">
                        <span class="tab-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4Z"/><path d="M4 20c0-3.31 3.58-6 8-6s8 2.69 8 6"/></svg>
                        </span>
                        Admin
                    </a>
                    <a href="login.php?role=staff" class="role-tab <?= $role === 'staff' ? 'active' : '' ?>">
                        <span class="tab-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4Z"/><path d="M4 20c0-3.31 3.58-6 8-6s8 2.69 8 6"/></svg>
                        </span>
                        User
                    </a>
                </div>

                <?php if ($error): ?>
                    <div class="alert-error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form action="proses_login.php" method="POST" class="login-form">
                    <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

                    <div class="input-group">
                        <span class="input-icon">
                            <svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/></svg>
                        </span>
                        <input type="email" name="email" placeholder="Email" autocomplete="email" required>
                    </div>

                    <div class="input-group">
                        <span class="input-icon">
                            <svg viewBox="0 0 24 24"><path d="M7 11V8a5 5 0 0 1 10 0v3"/><path d="M6 11h12v9H6z"/></svg>
                        </span>
                        <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Tampilkan password">
                            <svg viewBox="0 0 24 24"><path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
                        </button>
                    </div>

                    <button type="submit" class="login-button">Login</button>
                </form>

                <p class="copyright">© 2024 Gudang Elektronik. All rights reserved.</p>
            </div>
        </section>
    </main>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
