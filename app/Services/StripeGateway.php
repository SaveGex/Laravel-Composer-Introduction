<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class StripeGateway implements PaymentGatewayInterface
{
    private LoggerService $logger;

    public function __construct(LoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function charge(float $amount, array $options = []): array
    {
        $this->logger->info("Start processing payment: $amount");

        return [
            'success' => true,
            'transaction_id' => 'stripe_' . uniqid(),
            'gateway' => 'stripe',
            'amount' => $amount,
        ];
    }

    public function refund(string $transactionId, ?float $amount = null): array
    {
        $this->logger->info("Rollback transaction: $transactionId");

        return [
            'success' => false,
            'refund_id' => 'refund_' . uniqid(),
        ];
    }

    public function getBalance(): float
    {
        return 1000.0;
    }
}
