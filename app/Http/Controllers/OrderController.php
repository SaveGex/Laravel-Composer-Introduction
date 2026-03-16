<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use App\Services\LoggerService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private PaymentGatewayInterface $paymentGateway;
    private LoggerService $logger;
    public function __construct(PaymentGatewayInterface $paymentGateway, LoggerService $logger)
    {
        $this->logger = $logger;
        $this->paymentGateway = $paymentGateway;
    }

    public function process(Request $request)
    {
        $amount = $request->input('amount', 0);

        $this->logger->info("Обработка рлатежа $amount");

        $result = $this->paymentGateway->charge($amount);

        return response()->json($result);
    }
}
