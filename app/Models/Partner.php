<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fullname',
        'handphone',
        'email',
        'company_name',
        'description',
        'bpom',
        'distributor',
        'reached_email',
        'category_product',
        'file_company',
        'file_bpom',
        'created_at',
        'updated_at',
    ];
}
