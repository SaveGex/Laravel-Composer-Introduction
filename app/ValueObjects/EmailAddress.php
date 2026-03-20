<?php

namespace App\ValueObjects;

readonly class EmailAddress
{


    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $address
    )
    {
        if(!filter_var($this->address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address');
        }
    }
}
