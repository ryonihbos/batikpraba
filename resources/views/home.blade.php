@extends('layouts.app')

@section('content')

<!-- CDN SweetAlert2 & FontAwesome -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
    :root {
        --primary-brown: #8B4513;
        --dark-brown: #5C3317;
        --light-brown: #A0522D;
        --soft-brown: #f7f1ec;
    }
  
    body, html { background-color: var(--soft-brown); margin:0; padding:0; height:100%; }
    .text-brown { color: var(--primary-brown) !important; }
    .text-brown-emphasis { color: var(--dark-brown) !important; }
    .btn-brown { background-color: var(--primary-brown); color: white; border: none; }
    .btn-brown:hover { background-color: var(--dark-brown); }
    .btn-outline-brown { border:2px solid var(--primary-brown); color: var(--primary-brown); }
    .btn-outline-brown:hover { background-color: var(--primary-brown); color: white; }
    .bg-brown-dark { background-color: var(--dark-brown); color: white; }
    .badge-brown { background-color: var(--light-brown); color: white; }
    .card-batik { border:1px solid #ddd; background-color: #fffaf5; }
    .product-card, .produk-card-custom .card { background:#fffaf5; border:1px solid #eee; }
    .scrolling-wrapper::-webkit-scrollbar-thumb { background: var(--light-brown); }
    .text-primary-emphasis, h2, h5, h1 { color: var(--primary-brown); }
    .btn-primary { background-color: var(--primary-brown); border-color: var(--primary-brown); }
    .btn-primary:hover { background-color: var(--dark-brown); border-color: var(--dark-brown); }
    .badge-stok { background-color: var(--dark-brown); }
    footer { background: var(--soft-brown); color: var(--dark-brown); margin-top:auto; padding:2rem 0; }

    .scrolling-wrapper {
    -webkit-overflow-scrolling: touch;
    overflow-x: auto;
    white-space: nowrap;
    scroll-behavior: smooth;
    padding-bottom: 0.5rem;
}



</style>

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<div class="wrapper d-flex flex-column min-vh-100">
    <main class="flex-fill">
     <!-- Hero Section -->
<div class="container-fluid px-0" style="background: url('/uploads/banner/hero1.png') center center / cover no-repeat; background-size: cover;">
    <div class="container" style="padding: 140px 0 160px 0;">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4 d-flex justify-content-center mb-4 mb-md-0">
                <img src="/uploads/banner/vertikal.png" alt="Logo Batik Praba" style="max-height: 300px; width: auto;" class="animate__animated animate__fadeInLeft animate__delay-1s" />
            </div>
            <div class="col-md-7 text-center text-md-start ps-md-5 position-relative">
                <h1 class="fw-bold mb-2 text-brown animate__animated animate__fadeInUp animate__delay-1s" style="font-size: 2.8rem;">✨ Batik Praba</h1>
                <h5 class="fw-semibold mb-4 text-secondary animate__animated animate__fadeInUp animate__delay-2s">Praba Nusantara, Pesona Tiada Tara</h5>
                <p class="fs-5 mb-2 animate__animated animate__fadeInUp animate__delay-3s" style="color: #6E4B25;">
                    Batik adalah <strong style="color:#A0522D;">identitas</strong>, bukan sekadar pakaian.
                </p>
                <p class="fs-6 mb-2 animate__animated animate__fadeInUp animate__delay-4s" style="color: #6E4B25;">
                    <strong style="color:#8B4513;">Praba</strong> berarti <strong>cahaya</strong> atau <strong>aura</strong> yang memancar.
                </p>
                <p class="fs-6 mb-4 animate__animated animate__fadeInUp animate__delay-5s" style="color: #6E4B25;">
                    Tunjukkan <strong style="color:#A0522D;">pesonamu</strong> dan kenakan <strong style="color:#A0522D;">warisan budaya</strong> dengan bangga.
                </p>
                <a href="#produk" class="btn btn-outline-brown px-4 py-2 rounded-pill shadow-sm">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</div>



<!-- Tentang Kami -->
<div id="tentang" class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10"> <!-- Batasi lebar maksimal -->
            <div class="row align-items-center">
                <!-- Gambar -->
                <div class="col-md-6 mb-4 text-center" data-aos="fade-right" data-aos-duration="1200">
                    <img src="{{ url('uploads/banner/model_batik.png') }}" 
                         alt="Tentang Kami" 
                         class="img-fluid" 
                         style="max-height:280px; object-fit:contain;">
                </div>

                <!-- Teks -->
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1200">
                    <h2 class="fw-bold mb-4 text-brown-emphasis">
                        <i class="fa fa-star text-brown me-2"></i> Tentang <span class="text-brown">Batik Praba</span>
                    </h2>
                    <p class="fs-5 text-brown mb-3" style="line-height:1.8;">
                        <strong>Batik Praba</strong> hadir membawa keindahan budaya Indonesia ke seluruh nusantara. 
                        Kami percaya bahwa batik adalah <span class="text-brown-emphasis">identitas</span>, 
                        <em>warisan luhur</em>, dan <span class="text-brown">kebanggaan bangsa</span> yang tak lekang oleh waktu.
                    </p>
                    <p class="fs-5 text-brown mb-4" style="line-height:1.8;">
                        Dengan kualitas unggul dan desain memikat, 
                        <strong class="text-brown-emphasis">Batik Praba</strong> berkomitmen menghadirkan batik untuk berbagai suasana 
                        — formal, santai, hingga hadiah spesial.
                    </p>
                    <a href="#produk" class="btn btn-outline-brown px-4 py-2 rounded-pill shadow-sm">
                        <i class="fa fa-arrow-down me-2"></i> Jelajahi Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Search -->
        <div class="container my-4" id="search">
            <div class="d-flex justify-content-end">
                <form method="GET" action="{{ route('pesan.cari') }}" style="max-width:400px;width:100%;">
                    <div class="input-group shadow-sm">
                        <input type="text" name="q" class="form-control" placeholder="Cari produk batik...">
                        <button class="btn btn-primary px-3" type="submit">
                            <i class="fa fa-search me-1"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>


   

<!-- SweetAlert -->
<script>
function stokKosong() {
    Swal.fire({
        icon:'warning',
        title:'Stok Kosong',
        text:'Maaf, produk ini sedang tidak tersedia.',
        confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-brown') || '#6D4C41'
    });
}
</script>

<!-- Produk Populer -->
<div class="container my-5" data-aos="fade-up">
    <h4 class="fw-bold mb-4 text-brown-emphasis">Produk Populer</h4>

    <div class="scrolling-wrapper d-flex flex-nowrap overflow-x-auto pb-3 gap-4">
        @foreach($popularBarangs as $barang)
        <div class="product-card shadow-sm rounded" 
             style="min-width: 260px; max-width: 260px;" 
             data-aos="zoom-in" 
             data-aos-delay="{{ $loop->index * 100 }}">
            <div class="position-relative">
                @if($barang->stok == 0)
                    <span class="badge badge-stok position-absolute top-0 start-0 m-2">Habis</span>
                @endif
                <a href="{{ url('pesan/'.$barang->id) }}">
                    <img src="{{ url('uploads/'.$barang->gambar) }}" class="w-100 rounded-top" alt="{{ $barang->nama_barang }}" style="height:180px;object-fit:cover;">
                </a>
            </div>
            <div class="card-body p-3 text-center">
                <h6 class="fw-semibold mb-2 text-brown-emphasis">{{ $barang->nama_barang }}</h6>
                <div class="text-brown mb-1">Rp {{ number_format($barang->harga) }}</div>
                <div class="text-muted mb-3">Stok: {{ $barang->stok }}</div>
                @if($barang->stok == 0)
                    <button onclick="stokKosong()" class="btn btn-outline-secondary btn-sm w-100" disabled><i class="fas fa-shopping-cart me-2"></i> Beli</button>
                @else
                    <a href="{{ url('pesan/'.$barang->id) }}" class="btn btn-outline-brown btn-sm w-100"><i class="fas fa-shopping-cart me-2"></i> Beli</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Promo Banner -->
<div class="container mt-0 mb-5" data-aos="fade-up">
    <div class="position-relative rounded-4 overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
        <!-- Gambar Background -->
        <img src="{{ url('uploads/banner/banner.png') }}" alt="Promo" class="img-fluid w-100" style="height: auto;">

        <!-- Konten Teks di Tengah -->
        <div class="position-absolute top-50 start-50 translate-middle text-center px-3">
            <h6 class="mb-2" style="color: #8B4513; text-shadow: 1px 1px 3px rgba(255,255,255,0.8);">
                Cinta Budaya, Cinta Batik
            </h6>
            <h5 class="fw-bold mb-3" style="color: #5A2E0C; text-shadow: 2px 2px 5px rgba(255,255,255,0.7);">
                ✨ Tampil Elegan dengan Sentuhan Tradisi ✨
            </h5>
            <p class="small mb-3" style="color: #3E1F00; text-shadow: 1px 1px 2px rgba(255,255,255,0.6);">
                Nikmati promo spesial! Diskon hingga <strong>30%</strong> untuk koleksi eksklusif.
            </p>
            <a href="#produk" class="btn btn-outline-brown px-4 py-2 rounded-pill shadow-sm">
                Belanja Sekarang
            </a>
        </div>
    </div>
</div>

<!-- Produk Grid -->
<div id="produk" class="container my-5" data-aos="fade-up">
    <h3 class="fw-bold mb-4 text-center text-brown-emphasis" data-aos="fade-down">Produk Tersedia</h3>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($barangs->where('stok','>',0) as $index => $barang)
        <div class="col" data-aos="zoom-in" data-aos-delay="{{ 100 + ($index % 8) * 100 }}">
            <div class="produk-card-custom card h-100 shadow-sm rounded">
                <img src="{{ url('uploads/'.$barang->gambar) }}" class="card-img-top" alt="{{ $barang->nama_barang }}" style="height:200px;object-fit:cover;">
                <div class="card-body d-flex flex-column p-3">
                    <h6 class="fw-bold text-brown-emphasis">{{ $barang->nama_barang }}</h6>
                    <small class="text-brown">Rp {{ number_format($barang->harga) }}</small>
                    <small class="text-muted mb-2">Stok: {{ $barang->stok }}</small>
                    <small class="text-brown mb-3">{{ $barang->keterangan }}</small>
                    <a href="{{ url('pesan/'.$barang->id) }}" class="btn btn-primary btn-sm mt-auto"><i class="fa fa-shopping-cart me-1"></i> Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



        <!-- Testimoni -->
<div class="container my-5" data-aos="fade-up">
    <h2 class="text-center fw-bold mb-5 text-brown-emphasis" data-aos="fade-down">Apa Kata Mereka</h2>
    <div class="row justify-content-center g-4">
        @php
            $testis = [
                ['Rina','Jakarta','"Kualitas batiknya luar biasa, pelayanan sangat ramah!"'],
                ['Adi','Surabaya','"Saya bangga bisa pakai batik dari Batik Praba ke acara resmi."'],
                ['Andi','Bandung','"Desain modern tapi tetap mempertahankan nuansa tradisional."'],
            ];
        @endphp
        @foreach($testis as $i => $t)
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ 100 + $i * 100 }}">
            <div class="card shadow-sm rounded bg-light h-100 border-0">
                <div class="card-body text-center p-4">
                    <i class="fa fa-quote-left fa-2x mb-3 text-brown"></i>
                    <p class="fst-italic text-brown">{{ $t[2] }}</p>
                    <h6 class="fw-bold text-brown-emphasis mt-3">{{ $t[0] }}</h6>
                    <small class="text-muted">{{ $t[1] }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- Footer -->
<footer style="background-color: #6D4C41; font-family: 'Nunito', sans-serif;" class="text-center py-5 mt-5 text-white" data-aos="fade-up">
    <div class="container">
        <h4 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif;">✨ Batik Praba</h4>
        <p class="mb-4 fs-6 fst-italic">Mengangkat warisan budaya dengan sentuhan modern.</p>

        <!-- Navigasi -->
        <div class="mb-4 d-flex justify-content-center flex-wrap gap-3" data-aos="fade-up" data-aos-delay="100">
            <a href="#tentang" class="text-decoration-none fw-semibold text-white">Tentang Kami</a>
            <a href="#produk" class="text-decoration-none fw-semibold text-white">Produk</a>
        </div>

        <!-- Sosial Media -->
        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            <a href="https://facebook.com/namapagenya" target="_blank" class="mx-2 text-white"><i class="fab fa-facebook fa-xl"></i></a>
            <a href="https://instagram.com/namainstagram" target="_blank" class="mx-2 text-white"><i class="fab fa-instagram fa-xl"></i></a>
            <a href="https://wa.me/6281234567890" target="_blank" class="mx-2 text-white"><i class="fab fa-whatsapp fa-xl"></i></a>
        </div>

        <!-- Copyright -->
        <small class="text-light" data-aos="fade-up" data-aos-delay="300">
            &copy; {{ date('Y') }} <strong style="font-family: 'Playfair Display', serif;">Batik Praba</strong>. All rights reserved.
        </small>
    </div>
</footer>

<div style="height: 10px; background-color: #6D4C41;"></div>

@endsection
