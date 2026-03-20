<?php

namespace App\Providers;

use App\Contracts\EmailSenderInterface;
use App\Services\SendGridEmailSender;

use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->scoped(EmailSenderInterface::class, SendGridEmailSender::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
