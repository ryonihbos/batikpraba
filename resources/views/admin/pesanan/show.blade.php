@extends('layouts.app')

@section('content')
<style>
    :root {
        --brown-dark: #5C3317;
        --brown-light: #A67C52;
        --brown-soft: #EBDACB;
    }

    .sidebar {
        position: sticky;
        top: 20px;
        height: calc(100vh - 40px);
        overflow-y: auto;
        background-color: var(--brown-soft);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.04);
    }

    .sidebar .nav-link {
        color: var(--brown-dark);
        font-weight: 500;
        transition: 0.3s;
    }

    .sidebar .nav-link:hover {
        background-color: var(--brown-light);
        border-radius: 8px;
        padding-left: 12px;
        color: #fff;
    }

    .text-brown {
        color: var(--brown-dark);
    }
</style>

<div class="container-fluid mt-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="sidebar">
                <h5 class="text-brown fw-bold mb-3">📋 Menu Admin</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.barang.index') }}">
                            <i class="fa fa-box me-2"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pesanan.index') }}">
                            <i class="fa fa-shopping-cart me-2"></i> Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pengguna') }}">
                            <i class="fa fa-users me-2"></i> Pengguna
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Konten Utama: Detail Pesanan -->
        <div class="col-md-9">
            <h3>Detail Pesanan</h3>

            <div class="mb-3">
                <strong>Nama Akun:</strong> {{ $pesanan->user->name }} <br>
                <strong>Tanggal:</strong> {{ $pesanan->tanggal }} <br>
                <strong>Status:</strong> 
                    @if ($pesanan->status == 1)
                        <span class="badge bg-warning text-dark">Belum Bayar</span>
                    @elseif ($pesanan->status == 2)
                        <span class="badge bg-success">Sudah Bayar</span>
                    @else
                        <span class="badge bg-secondary">Status Tidak Diketahui</span>
                    @endif
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan->pesanan_details as $detail)
                        <tr>
                            <td>{{ $detail->barang->nama_barang ?? 'Tidak tersedia' }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp {{ number_format($detail->jumlah_harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($detail->barang && $detail->barang->gambar)
                                    <img src="{{ asset('uploads/' . $detail->barang->gambar) }}" width="80">
                                @else
                                    <small>Tidak ada gambar</small>
                                @endif
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
