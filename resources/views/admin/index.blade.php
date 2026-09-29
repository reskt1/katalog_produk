@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container" style="padding-top: 40px; padding-bottom: 40px;">

    <!-- NOTIFIKASI SUKSES CRUD -->
    @if(session('success'))
        <div class="alert-success-modern">
            🎉 {{ session('success') }}
        </div>
    @endif

    <!-- KEPALA HALAMAN DASHBOARD & TOMBOL UTAMA -->
    <div class="admin-header-box">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #1e3c72; margin: 0 0 5px 0;">🛠️ Dashboard Pengelolaan Produk</h2>
            <p style="font-size: 14px; color: #6c757d; margin: 0;">Selamat datang, Admin. Silakan kelola data produk katalog UMKM di sini.</p>
        </div>

        <!-- Tombol Tambah Produk & Keluar Sesuai Flowchart -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ route('admin.create') }}" class="btn btn-success" style="padding: 10px 20px; font-weight: 700; border-radius: 6px; box-shadow: 0 4px 10px rgba(25, 135, 84, 0.2);">
                + Tambah Produk
            </a>

            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn btn-danger" style="padding: 10px 20px; font-weight: 700; border-radius: 6px; box-shadow: 0 4px 10px rgba(220, 53, 69, 0.2);" onclick="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- KARTU TABEL DATA UTAMA -->
    <div class="modern-table-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th width="100">Kode</th>
                    <th>Nama Produk</th>
                    <th width="150">Kategori</th>
                    <th width="150">Harga Satuan</th>
                    <th width="100">Stok</th>
                    <th width="220" style="text-align: center;">Aksi Manajemen</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td style="font-weight: 700; color: #1e3c72;">{{ $product->kode }}</td>
                        <td><strong>{{ $product->nama_produk }}</strong></td>
                        <td><span class="badge">{{ $product->kategori }}</span></td>
                        <td style="font-weight: 600; color: #2d3748;">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td style="font-weight: 600; color: {{ $product->stok < 15 ? '#dc3545' : '#198754' }};">{{ $product->stok }}</td>
                        <td>
                            <!-- TOMBOL AKSI CRUD BERWARNA KONTRAS -->
                            <div style="display: flex; gap: 6px; justify-content: center; align-items: center;">
                                <!-- Ditambahkan penanda dari halaman admin -->
                                <a href="{{ route('admin.show', $product->id) }}" class="btn-action btn-action-view">Lihat</a>
                                <a href="{{ route('admin.edit', $product->id) }}" class="btn-action btn-action-edit">Ubah</a>

                                <form action="{{ route('admin.destroy', $product->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Apakah Anda benar-benar yakin ingin menghapus produk ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-action-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #a0aec0; font-style: italic;">
                            📭 Belum ada data produk di dalam database. Silakan klik tombol "+ Tambah Produk" untuk mengisi data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
