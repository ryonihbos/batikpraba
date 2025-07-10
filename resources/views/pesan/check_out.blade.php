@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-2">
            <a href="{{ url('home') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ url('history') }}" class="btn btn-info">
                <i class="fa fa-history"></i> Riwayat Pemesanan
            </a>
        </div>

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Halaman Check Out</h3>

                    @if(!empty($pesanan) && $pesanan_details->count() > 0)
                        <p class="text-end">Tanggal Pesan: <strong>{{ $pesanan->tanggal }}</strong></p>

                        {{-- Status Checkout --}}
                        <p>Status Pesanan: 
                            @if($pesanan->status == 1)
                                <span class="badge bg-warning text-dark">Belum Bayar</span>
                            @elseif($pesanan->status == 2)
                                <span class="badge bg-success">Sudah Bayar</span>
                            @endif
                        </p>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pesanan_details as $key => $detail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ url('uploads') }}/{{ $detail->barang->gambar }}" width="100" alt=""></td>
                                    <td>{{ $detail->barang->nama_barang }}</td>
                                    <td>{{ $detail->jumlah }} kain</td>
                                    <td>Rp. {{ number_format($detail->barang->harga) }}</td>
                                    <td>Rp. {{ number_format($detail->jumlah_harga) }}</td>
                                    <td>
                                        <form action="{{ url('check-out/' . $detail->id) }}" method="POST" onsubmit="return confirm('Anda yakin akan menghapus data?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total Harga :</strong></td>
                                    <td colspan="2">
                                        <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong>
                                    </td>
                                </tr>

                                {{-- Tombol Check Out & Bayar --}}
                                <tr>
                                    <td colspan="7" class="text-end">
                                        <form method="POST" action="{{ route('checkout.bayar') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin ingin Check Out dan membayar sekarang?');">
                                                <i class="fa fa-credit-card"></i> Check Out & Bayar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">Keranjang belanja kosong. Silakan pilih produk terlebih dahulu.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
