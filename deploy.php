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
$logFile = $projectDir . '/storage/logs/deploy.log';
$script = "cd {$projectDir} && git pull origin main >> {$logFile} 2>&1 && php artisan migrate --force >> {$logFile} 2>&1 && php artisan optimize:clear >> {$logFile} 2>&1 && php artisan config:cache >> {$logFile} 2>&1 && php artisan view:cache >> {$logFile} 2>&1 && php artisan sitemap:generate >> {$logFile} 2>&1";

file_put_contents($logFile, date('Y-m-d H:i:s') . " Deploy started\n");
shell_exec("nohup bash -c '{$script}' > /dev/null 2>&1 &");
echo "Deploy triggered";
