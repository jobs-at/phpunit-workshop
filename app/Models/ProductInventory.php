<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    public static function findWithHighestStock()
    {
        return ProductInventory::orderBy('quantity', 'desc')->orderBy('id')->firstOrFail();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
