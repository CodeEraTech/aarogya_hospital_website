<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::composer(['layouts.site', 'home', 'layouts.admin', 'admin.auth.login'], function ($view): void {
            $view->with('siteSettings', Schema::hasTable('settings') ? Setting::pluck('value', 'key') : collect());
        });
    }
}
