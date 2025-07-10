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
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>

            <div class="card shadow-sm rounded-4 p-4 bg-white">
                <h2 class="mb-4 text-brown fw-bold">Edit Produk</h2>
                <form id="form-edit-produk" action="{{ route('admin.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gambar Lama</label><br>
                            <img src="{{ asset('uploads/' . $barang->gambar) }}" class="img-thumbnail" style="width: 120px; border-radius: 10px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3">{{ $barang->keterangan }}</textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Ganti Gambar (jika perlu)</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" id="btn-update" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btn-update').addEventListener('click', function(event) {
    event.preventDefault();

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Produk akan diperbarui. Pastikan semua data sudah benar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#5C3317',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Memperbarui...',
                html: '<b>Mohon tunggu sebentar</b>',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            setTimeout(() => {
                document.getElementById('form-edit-produk').submit();
            }, 100);
        }
    });
});
</script>
@endsection
