<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', '!=', 0)
            ->get();

        return view('history.index', compact('pesanan'));
    }
/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Display the details of a specific order.
     *
     * @param int $id The ID of the order to retrieve details for.
     * @return \Illuminate\View\View The view displaying the order details.
     */

/*******  2302bdbf-46d3-4b96-9010-69ef3165f3c2  *******/
    public function detail($id)
    {
          $pesanan = Pesanan::where('id', $id)->first();
          $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan','pesanan_details'));

    }
}
