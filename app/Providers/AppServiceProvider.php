<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
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
        // PENTING: Force HTTPS Scheme
        // Vercel menggunakan load balancer/proxy. Tanpa ini, Laravel akan mengira
        // request datang melalui HTTP, menyebabkan Session Cookie tidak aman
        // dan masalah CSRF Token (form "tidak aman").
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
