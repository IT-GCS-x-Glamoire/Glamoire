<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array', // Ini akan mengubah kolom 'images' menjadi array saat diakses
    ];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }
}
