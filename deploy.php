<?php
$secret = 'gaLEkyjXk8RvfY8tWT0url96';

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

if (!hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
    http_response_code(403);
    die('Unauthorized');
}

$commands = [
    'cd /home/u165969086 && git pull origin main',
    'cd /home/u165969086 && cp deploy.php domains/windowadv.com/public_html/deploy.php',
    'cd /home/u165969086 && php artisan config:cache',
    'cd /home/u165969086 && php artisan route:cache',
    'cd /home/u165969086 && php artisan view:cache',
];
$output = '';
foreach ($commands as $cmd) {
    $output .= shell_exec($cmd . ' 2>&1') . "\n";
}
echo $output;
