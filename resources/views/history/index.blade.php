@extends('layouts.app')

@section('content')
<div class="container my-5">

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
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>  
        </div>

        <div class="col-md-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4"><i class="fa fa-history me-2"></i> Riwayat Pemesanan</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center" style="border-collapse: collapse;">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pesan</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                @if($item->status == 0)
                                    <span class="badge bg-secondary">Belum Checkout</span>
                                @elseif($item->status == 1)
                                    <span class="badge bg-warning text-dark">Sudah Pesan & Belum Bayar</span>
                                @elseif($item->status == 2)
                                    <span class="badge bg-success">Sudah Bayar</span>
                                @else
                                    <span class="badge bg-dark">Tidak Diketahui</span>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($item->jumlah_harga + $item->kode) }}</td>
                            <td>
                                <a href="{{ url('history/'.$item->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                            </td>
                        </tr>
                        @endforeach

                        @if($pesanan->count() === 0)
                        <tr>
                            <td colspan="5" class="text-muted">Belum ada data pemesanan.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Tambahan styling untuk mengatur border jika perlu --}}
<style>
    table.table th, table.table td {
        border: 1px solid #dee2e6 !important;
    }
</style>
@endsection
