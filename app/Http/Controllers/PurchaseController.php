<?php

namespace App\Http\Controllers;

use App\Facades\Twitter;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Services\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function checkBalance(PaymentGateway $gateway)
    {
        return response()->json(['balance' => $gateway->getBalance()]);
    }

    public function store(Request $request)
    {
        $purchase = new Purchase();
        $purchase->user()->associate(Auth::user());
        $purchase->total_price = Product::findOrFail($request->product_id)->price;
        $purchase->save();

        PurchaseItem::create([
            'product_id' => $request->product_id,
            'purchase_id' => $purchase->fresh()->id,
            'quantity' => $request->quantity
        ]);

        Twitter::send('Purchase was created.');

        return response()->json($purchase->toArray(), 201);
    }
}
