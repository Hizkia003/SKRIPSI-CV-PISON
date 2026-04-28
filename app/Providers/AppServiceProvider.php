<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share data ke semua view
        View::composer('*', function ($view) {

            // Site Content (Home)
            if (Schema::hasTable('site_contents')) {
                $view->with('siteContent', \App\Models\SiteContent::first());
            }

            // Footer Setting
            if (Schema::hasTable('footer_settings')) {
                $view->with('footer', \App\Models\FooterSetting::first());
            }
        });
    }
}