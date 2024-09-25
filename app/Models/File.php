<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file_name',
        'file_path',
        'type',
        'created_at',
        'updated_at',
    ];
}
