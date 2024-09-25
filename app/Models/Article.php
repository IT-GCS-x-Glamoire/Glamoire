<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class, 'category_product_id');
    }
    
}
