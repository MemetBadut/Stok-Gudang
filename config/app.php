<?php


define('BASE_URL', '/project-uas');

function url(string $path = ''): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function e(string|null $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}