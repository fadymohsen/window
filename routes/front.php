<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\LandingPageController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\Front\ServicesController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::name('front.')
    ->prefix(LaravelLocalization::setLocale())
    ->middleware([ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])
    ->group(function(){
        Route::get('/', [MainController::class, 'home'])->name('home');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::resource('services', ServicesController::class)->only('index', 'show');
        Route::get('services/{last_service_id}/{limit}', [ServicesController::class, 'getMoreServices'])->name('services.get');
        Route::get('services/{service_id}/portofoliols/{last_service_id}/{limit}', [ServicesController::class, 'getMorePortofolios'])->name('portofolios.get');
        Route::resource('contact', ContactController::class)->only('index', 'store');
        Route::resource('blogs', BlogController::class)->only('index', 'show');
        Route::get('blogs/{last_blog_id}/{limit}', [BlogController::class, 'getMoreBlogs'])->name('blogs.get');
});

// ─── Landing Pages (Google Ads) ───────────────────────────────────────────────
Route::get('/national-day-96', [LandingPageController::class, 'nationalDay'])->name('landing.national-day');
Route::post('/national-day-96/lead', [LandingPageController::class, 'storeNationalDayLead'])->name('landing.national-day.store');

Route::get('/about.php', function () {
    return Redirect::to("/about", 301);
});
Route::get('/blogs.php', function () {
    return Redirect::to("/blogs", 301);
});
Route::get('/contact-us.php', function () {
    return Redirect::to("/contact", 301);
});
Route::get('{locale}/contacts', function ($locale) {
    return Redirect::to("/{$locale}/contact", 301);
})->where('locale', 'ar|en');
Route::get('/services.php', function () {
    return Redirect::to("/services", 301);
});
Route::get('/blog.php', function () {
    $id = request('id');
    if ($id) {
        $blog = \App\Models\Blog::find($id);
        if ($blog) {
            return Redirect::to("/ar/blogs/{$blog->slug}", 301);
        }
    }
    return Redirect::to("/ar/blogs", 301);
});
Route::get('/portofolio.php', function () {
    $id = request('id');
    if ($id) {
        $service = \App\Models\Service::find($id);
        if ($service) {
            return Redirect::to("/ar/services/{$service->slug}", 301);
        }
    }
    return Redirect::to("/ar/services", 301);
});
Route::get('{locale}/services/founfing-day-prints', function ($locale) {
    return Redirect::to("/{$locale}/services/founding-day-prints", 301);
})->where('locale', 'ar|en');

// Redirect numeric ID URLs to slug-based URLs (legacy links from old site)
Route::get('{locale}/services/{id}', function ($locale, $id) {
    $service = \App\Models\Service::find($id);
    if ($service) {
        return Redirect::to("/{$locale}/services/{$service->slug}", 301);
    }
    abort(404);
})->where(['locale' => 'ar|en', 'id' => '[0-9]+']);

Route::get('{locale}/blogs/{id}', function ($locale, $id) {
    $blog = \App\Models\Blog::find($id);
    if ($blog) {
        return Redirect::to("/{$locale}/blogs/{$blog->slug}", 301);
    }
    abort(404);
})->where(['locale' => 'ar|en', 'id' => '[0-9]+']);

// Redirect locale-less /services/{slug} and /blogs/{slug} to default locale
Route::get('/services/{slug}', function ($slug) {
    if (is_numeric($slug)) {
        $service = \App\Models\Service::find($slug);
        if ($service) {
            return Redirect::to('/ar/services/' . $service->slug, 301);
        }
        abort(404);
    }
    return Redirect::to('/ar/services/' . $slug, 301);
})->where('slug', '[a-zA-Z0-9][-a-zA-Z0-9]*');

Route::get('/blogs/{slug}', function ($slug) {
    if (is_numeric($slug)) {
        $blog = \App\Models\Blog::find($slug);
        if ($blog) {
            return Redirect::to('/ar/blogs/' . $blog->slug, 301);
        }
        abort(404);
    }
    return Redirect::to('/ar/blogs/' . $slug, 301);
})->where('slug', '[a-zA-Z0-9][-a-zA-Z0-9]*');

// Redirect bare /services, /blogs, /about, /contacts, /contact
Route::get('/services', function () {
    return Redirect::to('/ar/services', 301);
});
Route::get('/blogs', function () {
    return Redirect::to('/ar/blogs', 301);
});
Route::get('/about', function () {
    return Redirect::to('/ar/about', 301);
});
Route::get('/contacts', function () {
    return Redirect::to('/ar/contact', 301);
});
Route::get('/contact', function () {
    return Redirect::to('/ar/contact', 301);
});