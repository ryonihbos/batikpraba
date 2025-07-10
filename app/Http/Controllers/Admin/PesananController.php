<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        // Menggunakan relasi 'detail' sesuai dengan model
        $pesanans = Pesanan::with(['user', 'pesanan_details.barang'])->get();

        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'pesanan_details.barang'])->findOrFail($id);

        return view('admin.pesanan.show', compact('pesanan'));
    }
}
