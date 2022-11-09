<?php

namespace App\Services;

class FakePaymentGateway implements PaymentGateway
{
    public function getBalance()
    {
        return 100;
    }
}
