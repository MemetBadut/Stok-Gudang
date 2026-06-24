<?php
require_once __DIR__ . '/../config/app.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireLogin(): void
{
    if (empty($_SESSION['auth_user'])) {
        header('Location: ' . url('auth/login.php'));
        exit;
    }
}

function requireRole(array $roles): void
{
    requireLogin();

    $userRole = $_SESSION['auth_user']['role'] ?? '';

    if (!in_array($userRole, $roles, true)) {
        header('Location: ' . url('auth/login.php'));
        exit;
    }
}

function authUser(): array
{
    return $_SESSION['auth_user'] ?? [];
}