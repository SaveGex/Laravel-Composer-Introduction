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
        
        RateLimiter::for('global', function(Request $request) {
            return Limit::perMinute(60);
        });

        RateLimiter::for('std', function (Request $request) {
            return Limit::perMinute(60)
                ->by($request->ip());
        });

        RateLimiter::for('reg-api', function (Request $request) {
            return $request->user() ?
                Limit::perMinute(100)->by($request->user()->id) :
                Limit::perMinute(60)->by($request->ip());
        });

        Route::bind('post', function($value) {
            return Post::where('slug', $value)->first() ??
                Post::findOrFail($value);
        });
    }
}
