<?php

namespace App\Services;

class CreditCardPaymentGateway implements PaymentGateway
{
    public function getBalance()
    {
        return 200;
    }
}
