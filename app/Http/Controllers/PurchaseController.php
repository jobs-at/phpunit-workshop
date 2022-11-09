<?php

namespace App\Http\Controllers;

use App\Services\PaymentGateway;

class PurchaseController extends Controller
{
    public function checkBalance(PaymentGateway $gateway)
    {
        return response()->json(['balance' => $gateway->getBalance()]);
    }
}
