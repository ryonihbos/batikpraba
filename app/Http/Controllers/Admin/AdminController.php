<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            // Produk yang stok-nya tersedia
            'totalProduk' => Barang::where('stok', '>', 0)->count(),

            // Hanya pengguna biasa (bukan admin)
            'totalUser' => User::where('role', 'user')->count(), // Ganti jika pakai is_admin

            // Pesanan yang tidak dibatalkan
            'totalPesanan' => Pesanan::where('status', '!=', 0)->count(),

            // 5 pesanan terbaru yang valid
            'pesananBaru' => Pesanan::where('status', '!=', 0)
                                    ->latest()
                                    ->take(5)
                                    ->get()
        ]);
    }
}
