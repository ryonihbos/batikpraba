<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ✅ Ambil produk populer berdasarkan nama tertentu
        $popularBarangs = Barang::whereIn('nama_barang', [
            'Batik Tobelo',
            'Batik Jember',
            'Batik Cikarang',
            'Batik Kebumen',
            'Batik Grobogan'
        ])->get();

        // ✅ DIUBAH: hanya tampilkan produk dengan stok lebih dari 0 dan gunakan pagination
        $barangs = Barang::where('stok', '>', 0)->paginate(9);

        // ✅ Kembalikan view 'home' dengan data populer dan barang tersedia
        return view('home', compact('popularBarangs', 'barangs'));
    }
}
