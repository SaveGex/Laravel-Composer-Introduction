<?php

namespace App\Contracts;

use App\ValueObjects\EmailMessage;

interface EmailSenderInterface
{
    public function sendEmail(EmailMessage $message): bool;
}
