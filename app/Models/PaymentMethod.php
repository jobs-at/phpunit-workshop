<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class PaymentMethod extends Model
{
    use HasFactory;

    public function test()
    {
        Mail::fake();
    }
}
