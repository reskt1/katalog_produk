@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Jumbotron / Hero Banner Moderen -->
<div class="hero-section">
    <div style="width: 90%; max-width: 1200px; margin: 0 auto;">
        <h1 class="hero-title">Katalog UMKM Siswa SMK</h1>
        <p class="hero-subtitle">
            Platform digital resmi yang menampilkan berbagai produk kreatif, inovatif, dan berkualitas tinggi hasil karya langsung dari siswa-siswi SMK yang berbakat.
        </p>
        <a href="{{ route('katalog.index') }}" class="btn-hero">
            📂 Jelajahi Katalog Produk
        </a>
    </div>
</div>

<!-- Kartu Fitur Keunggulan -->
<div style="width: 90%; max-width: 1200px; margin: 0 auto; padding-bottom: 50px;">
    <div class="feature-grid">

        <div class="feature-card">
            <span class="feature-icon">✨</span>
            <h5>Produk Kreatif</h5>
            <p>Desain dan inovasi produk murni hasil pemikiran kreatif dan kerja keras pelajar masa kini.</p>
        </div>

        <div class="feature-card">
            <span class="feature-icon">💰</span>
            <h5>Harga Terjangkau</h5>
            <p>Kualitas bersaing dengan penawaran harga terbaik yang sangat ramah di kantong konsumen.</p>
        </div>

        <div class="feature-card">
            <span class="feature-icon">📱</span>
            <h5>Akses Mudah</h5>
            <p>Website responsif dan ringan yang dapat diakses dengan nyaman kapan saja dan melalui perangkat apa saja.</p>
        </div>

    </div>
</div>
@endsection
