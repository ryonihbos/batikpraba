@extends('layouts.app')

@section('content')
<style>
    :root {
        --brown-dark: #5C3317;
        --brown-light: #A67C52;
        --brown-soft: #EBDACB;
    }

    body {
        background-color: #FAF5EF;
    }

    .dashboard-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 18px rgba(92, 51, 23, 0.1);
        transition: transform 0.2s ease;
        border-left: 5px solid var(--brown-light);
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
    }

    .dashboard-icon {
        font-size: 2rem;
        color: #fff;
        background-color: var(--brown-dark);
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 15px;
    }

    .dashboard-card h4 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--brown-dark);
    }

    .dashboard-card p {
        color: #777;
    }

    /* Sidebar sticky dan scrollable */
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

    .table td, .table th {
        vertical-align: middle;
    }

    .badge-warning {
        background-color: #f0ad4e;
    }

    .badge-success {
        background-color: #5cb85c;
    }

    .badge-danger {
        background-color: #d9534f;
    }

    /* Batas tinggi dan scroll untuk tabel pesanan terbaru */
    .scrollable-table {
        max-height: 350px;
        overflow-y: auto;
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
                      <a href="{{ route('admin.pesanan.index') }}" class="nav-link">
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

        <!-- Konten Utama -->
        <div class="col-md-9">
            <div class="row g-4 mb-4">
                <!-- Produk -->
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon"><i class="fa fa-box"></i></div>
                        <h4>{{ $totalProduk }} Produk</h4>
                        <p>Produk Tersedia</p>
                    </div>
                </div>

                <!-- Pengguna -->
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon"><i class="fa fa-users"></i></div>
                        <h4>{{ $totalUser }} Pengguna</h4>
                        <p>Pengguna Terdaftar</p>
                    </div>
                </div>

                <!-- Pesanan -->
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="dashboard-icon"><i class="fa fa-shopping-cart"></i></div>
                        <h4>{{ $totalPesanan }} Pesanan</h4>
                        <p>Total Transaksi</p>
                    </div>
                </div>
            </div>

            <!-- Tabel Pesanan Terbaru -->
            <div class="dashboard-card">
                <h4 class="text-brown mb-3"><i class="fa fa-clock me-2"></i> Pesanan Terbaru</h4>
                <div class="scrollable-table">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesananBaru as $pesanan)
                                @php
                                    switch($pesanan->status) {
                                        case 1: $label = 'Belum Bayar'; $class = 'warning'; break;
                                        case 2: $label = 'Sudah Bayar'; $class = 'success'; break;
                                        default: $label = 'Dibatalkan'; $class = 'danger'; break;
                                    }
                                @endphp
                                <tr>
                                    <td>#{{ $pesanan->id }}</td>
                                    <td>{{ $pesanan->user->name ?? '-' }}</td>
                                    <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                    <td><span class="badge badge-{{ $class }} px-3 py-2">{{ $label }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada pesanan terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
