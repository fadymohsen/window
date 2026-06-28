<?php

    include 'front.php';
    include 'dashboard.php';

Route::get('/sitemap.xml', function () {
    \App\Services\SiteMapService::generate();
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'application/xml',
    ]);
});
