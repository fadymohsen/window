<?php

    include 'front.php';
    include 'dashboard.php';

Route::get('/sitemap.xml', function () {
    $sitemapPath = public_path('sitemap.xml');
    // Only regenerate if file doesn't exist or is older than 24 hours
    if (!file_exists($sitemapPath) || filemtime($sitemapPath) < now()->subHours(24)->timestamp) {
        \App\Services\SiteMapService::generate();
    }
    return response()->file($sitemapPath, [
        'Content-Type' => 'application/xml',
    ]);
});

Route::get('/llms.txt', function () {
    return response()->file(public_path('llms.txt'), [
        'Content-Type' => 'text/plain; charset=utf-8',
    ]);
});
