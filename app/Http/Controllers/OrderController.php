<?php

namespace App\Http\Controllers;

use App\Contracts\EmailSenderInterface;
use App\Contracts\PaymentGatewayInterface;
use App\Services\LoggerService;
use App\ValueObjects\EmailAddress;
use App\ValueObjects\EmailMessage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private PaymentGatewayInterface $paymentGateway;
    private LoggerService $logger;
    private EmailSenderInterface $emailSender;
    public function __construct(PaymentGatewayInterface $paymentGateway, LoggerService $logger, EmailSenderInterface $emailSender)
    {
        $this->logger = $logger;
        $this->paymentGateway = $paymentGateway;
        $this->emailSender = $emailSender;
    }

    public function process(Request $request)
    {
        $amount = $request->input('amount', 0);

        $this->logger->info("Payment processing: $amount");

        $result = $this->paymentGateway->charge($amount);
        
        $email = $request->input('email');
        $this->logger->info("Extracted email: $email");

        $this->emailSender->sendEmail(
            new EmailMessage(
                new EmailAddress($email),
                "Payment was processed:",
                json_encode($result)
            )
        );

        return response()->json($result);
    }
}
