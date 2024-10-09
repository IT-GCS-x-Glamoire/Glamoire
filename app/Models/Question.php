<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';  // Tambahkan baris ini
    protected $fillable = [
        'id',
        'fullname',
        'email',
        'question',
        'created_at',
        'updated_at',
    ];
}
