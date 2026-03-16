<?php

namespace App\Contracts;

interface PaymentGatewayInterface
{
    public function charge(float $amount, array $options = []): array;
    public function refund(string $transactionId, float|null $amount = null): array;
    public function getBalance(): float;
}
