<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi dengan model Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_product_id');
    }
}
