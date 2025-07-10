<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_details';

    protected $fillable = [
        'pesanan_id',
        'barang_id',
        'jumlah',
        'total_harga', // ✅ Gunakan nama yang sesuai dengan blade & database
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barang_id', 'id');
    }

    // Relasi ke pesanan
    public function pesanan()
    {
        return $this->belongsTo(\App\Models\Pesanan::class, 'pesanan_id', 'id');
    }
}
