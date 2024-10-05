<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buynow extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'is_buy',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->has(User::class);
    }
}
