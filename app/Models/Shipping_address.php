<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    use HasFactory;

    // Nonaktifkan auto-increment jika id adalah UUID
    public $incrementing = false;
    protected $keyType = 'string';

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'handphone',
        'province',
        'regency',
        'district',
        'address',
        'benchmark',
        'is_main',
        'is_use',
        'id_province',
        'id_regency',
        'id_district',
        'created_at',
        'updated_at',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
