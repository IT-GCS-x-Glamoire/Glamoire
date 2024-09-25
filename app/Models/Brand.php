<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi satu brand memiliki banyak produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
