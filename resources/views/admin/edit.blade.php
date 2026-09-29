@extends('layouts.app')

@section('title', 'Ubah Produk')

@section('content')
<div class="container" style="padding-bottom: 40px;">

    <div class="form-card">
        <!-- Judul Header Form -->
        <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 15px; margin-bottom: 25px;">
            <h3 style="font-size: 22px; font-weight: 800; color: #1e3c72; margin: 0 0 5px 0;">✏️ Ubah Data Produk</h3>
            <p style="font-size: 14px; color: #6c757d; margin: 0;">Perbarui rincian data produk dengan Kode Resmi: <strong style="color: #1e3c72;">{{ $product->kode }}</strong></p>
        </div>

        <!-- TAMPILAN PESAN ERROR VALIDASI (Syarat Bab B) -->
        @if ($errors->any())
            <div class="alert-error-modern">
                <strong style="display: block; margin-bottom: 6px;">⚠️ Gagal Memperbarui Data:</strong>
                <ul style="margin: 0; padding-left: 20px; font-size: 13px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM INPUT PERUBAHAN UTAMA -->
        <form action="{{ route('admin.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Wajib di Laravel untuk rute Update data -->

            <!-- Kode Produk -->
            <div class="form-group-modern">
                <label class="form-label-modern">Kode Produk Resmi</label>
                <input type="text" name="kode" class="form-control-modern" value="{{ old('kode', $product->kode) }}" required>
            </div>

            <!-- Nama Produk -->
            <div class="form-group-modern">
                <label class="form-label-modern">Nama Lengkap Produk</label>
                <input type="text" name="nama_produk" class="form-control-modern" value="{{ old('nama_produk', $product->nama_produk) }}" required>
            </div>

            <!-- Kategori Produk (Dropdown Select) -->
            <div class="form-group-modern">
                <label class="form-label-modern">Kategori Produk</label>
                <select name="kategori" class="form-control-modern" style="cursor: pointer;" required>
                    <option value="Fashion" {{ old('kategori', $product->kategori) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                    <option value="Aksesori" {{ old('kategori', $product->kategori) == 'Aksesori' ? 'selected' : '' }}>Aksesori</option>
                    <option value="Alat Tulis" {{ old('kategori', $product->kategori) == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                    <option value="Perlengkapan" {{ old('kategori', $product->kategori) == 'Perlengkapan' ? 'selected' : '' }}>Perlengkapan</option>
                </select>
            </div>

            <!-- Baris Input Berdampingan: Harga & Stok -->
            <div class="form-row-modern">
                <div class="form-col-modern">
                    <label class="form-label-modern">Harga Jual (Rp)</label>
                    <input type="number" name="harga" class="form-control-modern" value="{{ old('harga', $product->harga) }}" required>
                </div>

                <div class="form-col-modern">
                    <label class="form-label-modern">Jumlah Stok Gudang</label>
                    <input type="number" name="stok" class="form-control-modern" value="{{ old('stok', $product->stok) }}" required>
                </div>
            </div>

            <!-- Deskripsi Teks Area -->
            <div class="form-group-modern" style="margin-bottom: 30px;">
                <label class="form-label-modern">Deskripsi Singkat Produk</label>
                <textarea name="deskripsi" class="form-control-modern" rows="4" style="resize: vertical; min-height: 80px;" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>

            <!-- Tombol Aksi Update & Batal -->
            <div style="display: flex; gap: 12px; justify-content: flex-end; border-top: 1px solid #e2e8f0; padding-top: 25px;">
                <a href="{{ route('admin.index') }}" class="btn btn-danger" style="padding: 12px 24px; font-weight: 700; border-radius: 8px; text-decoration: none; line-height: 20px;">
                    Batal
                </a>
                <button type="submit" class="btn btn-warning" style="padding: 12px 28px; font-weight: 700; border-radius: 8px; box-shadow: 0 4px 10px rgba(255, 193, 7, 0.2);">
                    🔄 Perbarui Data
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
