@extends('layouts.app')

@section('content')
<div class="container my-4">

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

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-outline-softbrown">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Breadcrumb -->
        <div class="col-md-12">
            <nav aria-label="breadcrumb"
                style="background-color: #f4e9dd; 
                        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08); 
                        padding: 1rem 1.5rem; 
                        border-radius: 0.5rem;
                        margin-bottom: 0;">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}" style="color: #7a5230;">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #7a5230;">
                        {{ $barang->nama_barang }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Produk --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="rounded w-100 shadow-sm" alt="Gambar Barang">
                        </div>

                        <div class="col-md-6 mt-4 mt-md-0">
                            <h2 class="fw-bold" style="color: #7a5230;">{{ $barang->nama_barang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ $barang->stok }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                            <form method="POST" action="{{ url('pesan') }}/{{ $barang->id }}">
                                                @csrf
                                                <input type="number" name="jumlah_pesan" class="form-control mt-1" 
                                                       min="1" max="{{ $barang->stok }}" required 
                                                       placeholder="Masukkan jumlah">
                                                <button type="submit" class="btn btn-softbrown mt-3 w-100">
                                                    <i class="fa fa-shopping-cart me-1"></i> Masukkan ke Keranjang
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>      
                    </div>  
                </div>
            </div>           
        </div>
    </div>
</div>

{{-- Custom Button Style --}}
<style>
    .btn-softbrown {
        background-color: #7a5230;
        color: white;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-softbrown:hover {
        background-color: #5c3d24;
        color: white;
    }

    .btn-outline-softbrown {
        background-color: #f4e9dd;
        color: #7a5230;
        border: 1px solid #7a5230;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-softbrown:hover {
        background-color: #7a5230;
        color: white;
    }
</style>
@endsection
