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
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/barang*') ? 'active' : '' }}" href="{{ route('admin.barang.index') }}">
                            <i class="fa fa-box me-2"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-shopping-cart me-2"></i> Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/pengguna*') ? 'active' : '' }}" href="{{ route('admin.pengguna') }}">
                            <i class="fa fa-users me-2"></i> Pengguna
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="col-md-9">
            <a href="{{ route('admin.barang.index') }}" class="btn btn-outline-secondary mb-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2>Tambah Produk</h2>
            <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
