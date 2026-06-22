<?php
session_start();

function dashboardPath(string $role): string
{
    return $role === 'admin' ? '../admin/dashboard.php' : '../staff/dashboard.php';
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if (!empty($_SESSION['auth_user']['role'])) {
    header('Location: ' . dashboardPath($_SESSION['auth_user']['role']));
    exit;
}

if (empty($_SESSION['login_token'])) {
    $_SESSION['login_token'] = bin2hex(random_bytes(32));
}

$email = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $token = $_POST['csrf_token'] ?? '';

    if (!hash_equals($_SESSION['login_token'], $token)) {
        $errors[] = 'Sesi login tidak valid. Muat ulang halaman lalu coba lagi.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email wajib valid.';
    }

    if ($password === '') {
        $errors[] = 'Password wajib diisi.';
    }

    if ($errors === []) {
        require_once __DIR__ . '/../config/conn.php';

        $stmt = $conn->prepare('SELECT id, nama, email, password, role FROM users WHERE email = ? LIMIT 1');

        if ($stmt === false) {
            $errors[] = 'Server login belum siap. Cek query dan koneksi database.';
        } else {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($userId, $userName, $userEmail, $passwordHash, $userRole);
            $user = null;

            if ($stmt->fetch()) {
                $user = [
                    'id' => $userId,
                    'nama' => $userName,
                    'email' => $userEmail,
                    'password' => $passwordHash,
                    'role' => $userRole,
                ];
            }

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);

                $_SESSION['auth_user'] = [
                    'id' => (int) $user['id'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role'] ?: 'staff',
                ];

                unset($_SESSION['login_token']);

                header('Location: ' . dashboardPath($_SESSION['auth_user']['role']));
                exit;
            }

            $errors[] = 'Email atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gudang Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/utilities.css">
    <link rel="stylesheet" href="../assets/css/pages/login.css">
</head>
<body>
    <main class="login-shell">
        <section class="login-visual" aria-label="Identitas gudang">
            <div class="login-brand">
                <div class="login-logo-wrap">
                    <img src="../assets/img/logo-gudang-01.png" alt="Logo Gudang Elektronik">
                </div>
                <div>
                    <strong>Gudang Elektronik</strong>
                    <span>Sistem Stok Gudang</span>
                </div>
            </div>

            <div class="login-hero">
                <span class="login-eyebrow">Inventory Control</span>
                <h1>Masuk untuk kelola stok gudang.</h1>
                <p>Pantau stok, transaksi barang masuk, barang keluar, dan laporan gudang dari satu dashboard.</p>
            </div>

            <div class="login-summary-grid">
                <article>
                    <i class="ri-box-3-line"></i>
                    <strong>512</strong>
                    <span>Total Barang</span>
                </article>
                <article>
                    <i class="ri-checkbox-circle-line"></i>
                    <strong>312</strong>
                    <span>Stok Aman</span>
                </article>
                <article>
                    <i class="ri-error-warning-line"></i>
                    <strong>18</strong>
                    <span>Perlu Dicek</span>
                </article>
            </div>
        </section>

        <section class="login-panel" aria-label="Form login">
            <form class="login-card" method="POST" action="login.php" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e($_SESSION['login_token']); ?>">

                <div class="login-card-head">
                    <span class="login-icon">
                        <i class="ri-shield-user-line"></i>
                    </span>
                    <div>
                        <p>Selamat Datang</p>
                        <h2>Login Admin</h2>
                    </div>
                </div>

                <?php if ($errors !== []) : ?>
                    <div class="login-alert" role="alert">
                        <i class="ri-error-warning-line"></i>
                        <span><?= e($errors[0]); ?></span>
                    </div>
                <?php endif; ?>

                <div class="login-field">
                    <label for="email">Email</label>
                    <div class="login-input">
                        <i class="ri-mail-line"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?= e($email); ?>"
                            placeholder="admin@gudangelektronik.id"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <div class="login-field">
                    <label for="password">Password</label>
                    <div class="login-input">
                        <i class="ri-lock-password-line"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button class="login-password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                </div>

                <button class="login-submit" type="submit">
                    <span>Masuk Dashboard</span>
                    <i class="ri-arrow-right-line"></i>
                </button>

                <p class="login-note">Gunakan akun yang sudah terdaftar di tabel users.</p>
            </form>
        </section>
    </main>

    <script>
        const toggleButton = document.querySelector(".login-password-toggle");
        const passwordInput = document.getElementById("password");

        toggleButton.addEventListener("click", () => {
            const isHidden = passwordInput.type === "password";
            passwordInput.type = isHidden ? "text" : "password";
            toggleButton.setAttribute("aria-pressed", String(isHidden));
            toggleButton.setAttribute("aria-label", isHidden ? "Sembunyikan password" : "Tampilkan password");
            toggleButton.innerHTML = `<i class="${isHidden ? "ri-eye-off-line" : "ri-eye-line"}"></i>`;
        });
    </script>
</body>
</html>
