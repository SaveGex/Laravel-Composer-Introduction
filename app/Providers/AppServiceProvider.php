<?php

namespace App\Providers;

use App\Models\Post;
use App\Services\LoggerService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoggerService::class, function ($app) {
            return new LoggerService(storage_path("logs/app.log"));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
