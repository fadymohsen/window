<?php
$secret = 'gaLEkyjXk8RvfY8tWT0url96';

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

if (!hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
    http_response_code(403);
    die('Unauthorized');
}

$output = shell_exec('cd /home/u165969086/public_html && git pull origin main 2>&1');
echo $output;
