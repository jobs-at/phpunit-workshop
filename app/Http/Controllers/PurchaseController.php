<?php

namespace App\Http\Controllers;

use App\Facades\PaymentGateway;
use App\Models\PaymentMethod;

class PurchaseController extends Controller
{
    public function checkBalance()
    {
        return response()->json(['balance' => PaymentGateway::getBalance(new PaymentMethod())]);
    }
}
