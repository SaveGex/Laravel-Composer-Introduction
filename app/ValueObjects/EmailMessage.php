<?php

namespace App\ValueObjects;

use App\ValueObjects\EmailAddress;
use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model
{
    public function __construct(
        private EmailAddress $to,
        private string $subject,
        private string $body,
        private ?EmailAddress $from = null
    ) {
        $this->from = $from ?? new EmailAddress(config('mail.from.address'));
    }

    public function getFrom(): string { return $this->from->address; }
    public function getTo(): string { return $this->to->address; }
    public function getSubject(): string { return $this->subject; }
    public function getBody(): string { return $this->body; }
}
