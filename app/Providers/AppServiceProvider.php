<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\{Page, Setting};

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
            $settings = Schema::hasTable('settings') ? Setting::pluck('value', 'key') : collect();
            if (!empty($settings['website_logo']) && is_file(public_path($settings['website_logo'])) && $settings['website_logo'] !== 'assets/hospital/images/aarogya-logo.png') {
                copy(public_path($settings['website_logo']), public_path('assets/hospital/images/aarogya-logo.png'));
            }
            if (!empty($settings['website_favicon']) && is_file(public_path($settings['website_favicon'])) && $settings['website_favicon'] !== 'favicon.ico') {
                copy(public_path($settings['website_favicon']), public_path('favicon.ico'));
            }
            $view->with('siteSettings', $settings);
            $view->with('footerPages', Schema::hasTable('pages') ? Page::where('status', 'Active')->orderBy('title')->get(['title', 'slug']) : collect());
            $view->with('socialKeys', ['facebook' => 'fa-facebook', 'instagram' => 'fa-instagram', 'linkedin' => 'fa-linkedin', 'youtube' => 'fa-youtube', 'whatsapp' => 'fa-whatsapp']);
        });
    }
}
