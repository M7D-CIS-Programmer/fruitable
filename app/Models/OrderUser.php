<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;

    protected $table = "orderusers";


    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'description',
        'order_id'
    ];

    protected $hidden = [
        'Created_at',
        'Updated_at',
    ];
}
