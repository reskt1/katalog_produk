@extends('layouts.app')

@section('title', $product->nama_produk)

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 40px;">

    <div class="detail-card">
        <div class="detail-row">

            <!-- SISI KIRI: VISUALISASI ICON KATEGORI PRODUK -->
            <div class="detail-col-visual">
                <div class="visual-preview-box" style="height: 320px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                @if($product->gambar)
                    <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">
                @else
                    @if($product->kategori == 'Fashion') 👕
                    @elseif($product->kategori == 'Aksesori') 🎒
                    @elseif($product->kategori == 'Alat Tulis') 📝
                    @else 📦 @endif
                @endif
            </div>
            </div>

            <!-- SISI KANAN: DETAIL INFORMASI LENGKAP -->
            <div class="detail-col-info">
                <!-- Badge Kategori -->
                <span class="category-pill" style="margin-bottom: 12px; display: inline-block;">
                    {{ $product->kategori }}
                </span>

                <!-- Judul Nama Produk & Kode Unik -->
                <h2 class="detail-title">{{ $product->nama_produk }}</h2>
                <div class="detail-code-badge">Kode Produk Resmi: <strong style="color: #2d3748;">{{ $product->kode }}</strong></div>

                <!-- Tag Harga Format Rupiah -->
                <div class="detail-price-tag">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </div>

                <!-- Blok Deskripsi Produk -->
                <div style="border-top: 1px solid #e2e8f0; padding-top: 20px; margin-bottom: 20px;">
                    <h5 class="info-section-title">Deskripsi Produk</h5>
                    <p class="detail-description-text">
                        {{ $product->deskripsi }}
                    </p>
                </div>

                <!-- Indikator Angka Stok -->
                <div class="detail-stock-indicator">
                    <span>Status Stok Gudang: </span>
                    <strong style="color: {{ $product->stok > 0 ? '#198754' : '#dc3545' }}; font-weight: 700;">
                        {{ $product->stok > 0 ? $product->stok . ' Pcs (Tersedia)' : 'Habis / Kosong' }}
                    </strong>
                </div>

                <!-- Tombol Navigasi Alur Balik -->
                <a href="{{ route('katalog.index') }}" class="btn-back-katalog">
                    ⬅️ Kembali ke Katalog
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
