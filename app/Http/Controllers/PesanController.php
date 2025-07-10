<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PesanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('home')->with('error', 'Barang tidak ditemukan');
        }

        return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::find($id);
        $tanggal = Carbon::now();

        if ($request->jumlah_pesan > $barang->stok) {
            return redirect('pesan/' . $id);
        }

        $cek_pesanan = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();

        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::id();
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 1;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        $pesanan_baru = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();

        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)
            ->where('pesanan_id', $pesanan_baru->id)
            ->first();

        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $cek_pesanan_detail->jumlah += $request->jumlah_pesan;
            $cek_pesanan_detail->jumlah_harga += $barang->harga * $request->jumlah_pesan;
            $cek_pesanan_detail->save();
        }

        $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();
        $pesanan->jumlah_harga += $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Pesanan Berhasil', 'Pesanan Anda telah berhasil ditambahkan ke keranjang');
        return redirect('check-out');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();
        $pesanan_details = $pesanan ? PesananDetail::where('pesanan_id', $pesanan->id)->get() : [];

        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::find($id);

        if (!$pesanan_detail) {
            Alert::error('Gagal Menghapus', 'Data tidak ditemukan');
            return redirect('check-out');
        }

        $pesanan = Pesanan::find($pesanan_detail->pesanan_id);
        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->update();
        $pesanan_detail->delete();

        // Jika tidak ada detail lagi, anggap pesanan dibatalkan
        $remaining = PesananDetail::where('pesanan_id', $pesanan->id)->count();
        if ($remaining == 0) {
            $pesanan->status = 0; // dibatalkan
            $pesanan->update();
        }

        Alert::error('Pesanan Berhasil Dihapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::find(Auth::id());

        if (empty($user->alamat) || empty($user->nohp)) {
            Alert::error('Identitas Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();

        if (!$pesanan) {
            Alert::error('Tidak ada pesanan yang bisa dikonfirmasi', 'Error');
            return redirect('check-out');
        }

        $pesanan_id = $pesanan->id;
        $pesanan->status = 2; // proses
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::find($pesanan_detail->barang_id);
            $barang->stok -= $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('Pesanan Sukses Check Out, Mengarahkan ke Pembayaran...', 'Success');
        return redirect()->route('checkout.bayar', ['pesanan_id' => $pesanan_id]);
    }

    public function cari(Request $request)
    {
        $query = $request->input('q');

        $barang = Barang::where('nama_barang', 'LIKE', '%' . $query . '%')->first();

        if ($barang) {
            return redirect()->route('pesan.index', ['id' => $barang->id]);
        } else {
            Alert::error('Produk tidak ditemukan', 'Silakan coba nama lain');
            return redirect()->back();
        }
    }
}
