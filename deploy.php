<?php
$secret = 'gaLEkyjXk8RvfY8tWT0url96';

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

if (!hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
    http_response_code(403);
    die('Unauthorized');
}

if (function_exists('opcache_reset')) {
    opcache_reset();
}

$projectDir = '/home/u165969086/domains/windowadv.com/public_html';
$commands = [
    "cd {$projectDir} && git pull origin main",
    "cd {$projectDir} && php artisan migrate --force",
    "cd {$projectDir} && php artisan optimize:clear",
    "cd {$projectDir} && php artisan config:cache",
    "cd {$projectDir} && php artisan view:cache",
    "cd {$projectDir} && php artisan sitemap:generate",
];
$output = '';
foreach ($commands as $cmd) {
    $output .= shell_exec($cmd . ' 2>&1') . "\n";
}
echo $output;
