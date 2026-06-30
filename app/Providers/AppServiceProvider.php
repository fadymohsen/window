<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\WebsiteSetting;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        try
        {
            $this->app->singleton('website_settings', function(){
                return WebsiteSetting::all()->first();
            });
        }
        catch(Exception $e)
        {

        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        try
        {
            $settings = WebsiteSetting::all()->first();
            View::share('website_settings', $settings);
        }
        catch(Exception $e)
        {

        }

        View::composer('front.partials._footer', function ($view) {
            try {
                $view->with('footer_services', Service::withTranslation()->limit(8)->get());
            } catch (Exception $e) {
                $view->with('footer_services', collect());
            }
        });
    }
}
