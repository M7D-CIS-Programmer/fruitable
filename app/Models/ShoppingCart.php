<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = "shoppingcarts";


    protected $fillable = [
        'id',
        'quantity',
        'Created_at',
        'Updated_at',
        'product_id',
    ];

    protected $hidden = [
        'Created_at',
        'Updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); 
    }
}
