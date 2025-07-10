<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xendit\Xendit;
use Xendit\Invoice;
use App\Models\Pesanan;

class XenditController extends Controller
{
    /**
     * Proses pembayaran ke Xendit.
     * Akan membuat invoice dan redirect ke halaman pembayaran Xendit.
     */
    public function bayar()
    {
        // Ambil pesanan aktif yang status-nya 1 (siap dibayar)
        $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 1)->first();

        if (!$pesanan) {
            return redirect()->route('check_out')->with('error', 'Tidak ada pesanan untuk dibayar.');
        }

        // Set API Key dari konfigurasi
        Xendit::setApiKey(config('services.xendit.secret_key'));

        $params = [
            'external_id' => 'order-' . $pesanan->id . '-' . time(),
            'payer_email' => Auth::user()->email ?? 'user@example.com',
            'description' => 'Pembayaran pesanan #' . $pesanan->id,
            'amount' => (int) $pesanan->jumlah_harga,
            // ✅ Tambahkan ID ke route success
            'success_redirect_url' => route('checkout.sukses', ['id' => $pesanan->id]),
        ];

        try {
            // Buat invoice
            $invoice = Invoice::create($params);

            // Redirect ke halaman pembayaran Xendit
            return redirect($invoice['invoice_url']);
        } catch (\Exception $e) {
            return redirect()->route('check_out')->with('error', 'Gagal membuat invoice: ' . $e->getMessage());
        }
    }

    /**
     * Callback setelah pembayaran berhasil (success_redirect_url)
     * Menyimpan status pesanan dan update stok barang.
     */
    public function sukses($id)
    {
        $pesanan = Pesanan::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 1)
            ->first();

        if ($pesanan) {
            $pesanan->status = 2; // Pesanan selesai / dibayar
            $pesanan->save();

            // Update stok barang berdasarkan detail pesanan
            foreach ($pesanan->pesanan_details as $detail) {
                $barang = $detail->barang;

                if ($barang) {
                    $barang->stok -= $detail->jumlah;
                    $barang->save();
                }
            }
        }

        return redirect()->route('history.index')->with('success', 'Pembayaran berhasil! Pesanan sedang diproses.');
    }
}
