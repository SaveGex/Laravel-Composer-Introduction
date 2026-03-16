<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayInterface;
use App\Services\LoggerService;
use App\Services\StripeGateway;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGatewayInterface::class, function($app) {
            $logger = $app->make(LoggerService::class);

            return new StripeGateway($logger);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
