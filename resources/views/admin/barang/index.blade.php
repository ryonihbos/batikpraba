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

    .btn-custom {
        background-color: var(--brown-dark);
        color: #fff;
        border: none;
    }

    .btn-custom:hover {
        background-color: var(--brown-light);
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
                        <a class="nav-link active" href="{{ route('admin.barang.index') }}">
                            <i class="fa fa-box me-2"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
            <div class="dashboard-card">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-brown"><i class="fa fa-box me-2"></i>Data Produk</h4>
                    <a href="{{ route('admin.barang.create') }}" class="btn btn-custom">
                        <i class="fa fa-plus me-1"></i> Tambah Produk
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ $barang->keterangan }}</td>
                                <td>
                                    <img src="{{ asset('uploads/' . $barang->gambar) }}" width="80" class="img-thumbnail">
                                </td>
                                <td>
                                    <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form id="form-delete-{{ $barang->id }}" action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $barang->id }})">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data produk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Notifikasi sukses --}}
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1000
    });
</script>
@endif

{{-- Konfirmasi Hapus --}}
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Produk akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-' + id).submit();
            }
        });
    }
</script>
@endsection
