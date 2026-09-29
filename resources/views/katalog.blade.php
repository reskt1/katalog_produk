@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="container" style="padding-top: 40px; padding-bottom: 60px;">

    <!-- HEADER HALAMAN & PENCARIAN -->
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 35px; gap: 20px;">
        <div class="page-header">
            <h2 class="page-title">🎒 Katalog Produk UMKM</h2>
            <p class="page-subtitle">Temukan berbagai produk kreatif unggulan karya siswa-siswi SMK.</p>
        </div>

        <!-- BAR PENCARIAN PREMIUM -->
        <div style="flex: 0 0 450px; max-width: 100%;">
            <form action="{{ route('katalog.index') }}" method="GET" class="search-box-wrapper">
                <input type="text" name="search" class="search-input" placeholder="Cari nama produk atau kategori..." value="{{ request('search') }}">

                @if(request('search'))
                    <a href="{{ route('katalog.index') }}" class="btn-reset-search">Reset</a>
                @endif

                <button type="submit" class="btn-search">Cari</button>
            </form>
        </div>
    </div>

    <!-- NOTIFIKASI PENCARIAN -->
    @if(request('search'))
        <div class="modern-alert">
            🔍 Menampilkan hasil pencarian untuk kata kunci: <strong>"{{ request('search') }}"</strong>
        </div>
    @endif

    <!-- GRID ETALASE KARTU PRODUK -->
    <div class="product-grid">
        @forelse($products as $product)
            <div class="product-card-wrapper">
                <div class="premium-card">
                    <!-- Placeholder Gambar Sesuai Nama Produk -->
                    <div class="card-img-placeholder" style="height: 180px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                        @if($product->gambar)
                            <!-- Menampilkan foto produk asli milik Anda -->
                            <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <!-- Cadangan jika gambar kosong, pakai emoji sesuai kategori -->
                            @if($product->kategori == 'Fashion') 👕
                            @elseif($product->kategori == 'Aksesori') 🎒
                            @elseif($product->kategori == 'Alat Tulis') 📝
                            @else 📦 @endif
                        @endif
                    </div>
                    <div class="card-info-body">
                        <span class="category-pill">{{ $product->kategori }}</span>
                        <h5 class="product-title">{{ $product->nama_produk }}</h5>
                        <p class="product-code">ID: {{ $product->kode }}</p>

                        <div class="card-footer-info">
                            <p class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                            <div class="stock-wrapper">
                                <span>Stok: <strong style="color: {{ $product->stok < 15 ? '#dc3545' : '#198754' }}">{{ $product->stok }}</strong></span>
                                <!-- Tombol Menuju Detail -->
                                <a href="{{ route('katalog.show', $product->id) }}" class="btn-view-detail">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Tampilan Jika Produk Tidak Ditemukan -->
            <div style="width: 100%; text-center: center; padding: 60px 0; color: #a0aec0;">
                <span style="font-size: 4rem; display: block; margin-bottom: 15px;">❌</span>
                <h4 style="font-weight: 700; color: #4a5568; margin: 0 0 5px 0;">Produk Tidak Ditemukan</h4>
                <p style="margin: 0; font-size: 14px;">Coba gunakan kata kunci pencarian kategori atau nama produk lainnya.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
