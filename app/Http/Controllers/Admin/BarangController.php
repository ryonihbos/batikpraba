<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'nullable',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads'), $fileName);
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'gambar' => $fileName
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'nullable',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar && file_exists(public_path('uploads/'.$barang->gambar))) {
                unlink(public_path('uploads/'.$barang->gambar));
            }

            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads'), $fileName);
            $barang->gambar = $fileName;
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'gambar' => $barang->gambar
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Produk berhasil diupdate.');
    }

  public function destroy($id)
{
    $barang = Barang::findOrFail($id);

    // Jangan hapus file gambarnya
    $barang->delete();

    return redirect()->route('admin.barang.index')->with('success', 'Produk berhasil dihapus.');
}

}