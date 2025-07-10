@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h3><i class="fa fa-check-circle"></i> Pembayaran Berhasil!</h3>
        <p>Terima kasih, pembayaran Anda telah berhasil.</p>
        <a href="{{ url('/home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
    </div>
</div>
@endsection
