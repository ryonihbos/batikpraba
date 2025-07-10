<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans'; // opsional, hanya jika tidak konvensional

    protected $fillable = [
        'user_id', 'kode', 'total_harga', 'status', 'created_at', 'updated_at'
    ];

    // 🔗 Relasi ke user yang memesan
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    // 🔗 Relasi ke detail pesanan
    public function pesanan_details()
    {
        return $this->hasMany(\App\Models\PesananDetail::class, 'pesanan_id', 'id');
    }
}
