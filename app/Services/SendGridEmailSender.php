<?php

namespace App\Services;

use App\Contracts\EmailSenderInterface;
use App\Mail\SendGridMailable;
use App\ValueObjects\EmailMessage;
use Illuminate\Support\Facades\Mail;

class SendGridEmailSender implements EmailSenderInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function sendEmail(EmailMessage $message): bool
    {
        try
        {
            Mail::send(new SendGridMailable($message));
        }   
        catch(\Exception $e)
        {
            dd($e->getMessage());
        }
        return true;
    }

}
