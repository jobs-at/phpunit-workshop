<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function findWithHighestPrice()
    {
        return Product::orderBy('price', 'desc')->orderBy('id')->firstOrFail();
    }
}
