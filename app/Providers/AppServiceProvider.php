<?php

namespace App\Providers;

use App\Models\Post;
use App\Services\LoggerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoggerService::class, function($app) {
            return new LoggerService(storage_path('logs/app.log'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind('post', function($value) {
           return Post::where('slug', $value)->first() 
            ?? Post::findOrFail($value);
        });
    }
}
