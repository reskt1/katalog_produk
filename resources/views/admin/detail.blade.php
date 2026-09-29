@extends('layouts.app')

@section('title', 'Admin - Detail ' . $product->nama_produk)

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 40px;">
    <div class="detail-card">
        <div class="detail-row">

            <!-- Sisi Visual -->
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

            <!-- Sisi Informasi -->
            <div class="detail-col-info">
                <span class="badge" style="margin-bottom: 12px; display: inline-block;">{{ $product->kategori }}</span>
                <h2 class="detail-title">{{ $product->nama_produk }}</h2>
                <div class="detail-code-badge">Kode Produk Resmi: <strong>{{ $product->kode }}</strong></div>

                <div class="detail-price-tag">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>

                <div style="border-top: 1px solid #e2e8f0; padding-top: 20px; margin-bottom: 20px;">
                    <h5 class="info-section-title">Deskripsi Produk (Review Admin)</h5>
                    <p class="detail-description-text">{{ $product->deskripsi }}</p>
                </div>

                <div class="detail-stock-indicator">
                    <span>Status Stok Gudang: </span>
                    <strong>{{ $product->stok }} Pcs</strong>
                </div>

                <!-- 🔒 TOMBOL KEMBALI DIKUNCI PASTI KE DASHBOARD ADMIN -->
                <a href="{{ route('admin.index') }}" class="btn-back-katalog" style="background-color: #1e3c72; color: #ffffff;">
                    ⬅️ Kembali ke Dashboard Admin
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
