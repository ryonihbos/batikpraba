@extends('layouts.app') {{-- atau layouts.admin kalau kamu punya --}}

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

        <!-- Konten Utama -->
        <div class="col-md-9">
            <h2>Riwayat Pesanan</h2>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total Item</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanans as $pesanan)
                        <tr>
                            <td>{{ $pesanan->user->name }}</td>
                            <td>{{ $pesanan->tanggal }}</td>
                            <td>
                                @if ($pesanan->status == 1)
                                    <span class="badge bg-warning text-dark">Belum Bayar</span>
                                @elseif ($pesanan->status == 2)
                                    <span class="badge bg-success">Sudah Bayar</span>
                                @else
                                    <span class="badge bg-secondary">Status Tidak Diketahui</span>
                                @endif
                            </td>
                            <td>{{ $pesanan->pesanan_details->sum('jumlah') }}</td>
                            <td>
                                <a href="{{ route('admin.pesanan.show', $pesanan->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
