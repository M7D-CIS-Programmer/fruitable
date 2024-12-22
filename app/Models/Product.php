<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = "products";


    protected $fillable = [
        'title',
        'discription',
        'price',
        'imgepath',
        'catigory_id',
        'quantity',
        'Created_at',
        'Updated_at',
    ];

    protected $hidden = [
        'Created_at',
        'Updated_at',
    ];
}
