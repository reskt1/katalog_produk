<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        ['kode' => 'P001', 'nama_produk' => 'Kaos SMK Kreatif', 'kategori' => 'Fashion', 'harga' => 75000, 'stok' => 20, 'deskripsi' => 'Kaos desain siswa SMK'],
        ['kode' => 'P002', 'nama_produk' => 'Totebag Edukasi', 'kategori' => 'Aksesori', 'harga' => 45000, 'stok' => 15, 'deskripsi' => 'Totebag untuk kegiatan sekolah'],
        ['kode' => 'P003', 'nama_produk' => 'Notebook Pelajar', 'kategori' => 'Alat Tulis', 'harga' => 25000, 'stok' => 30, 'deskripsi' => 'Notebook untuk catatan belajar'],
        ['kode' => 'P004', 'nama_produk' => 'Tumbler Sekolah', 'kategori' => 'Aksesori', 'harga' => 65000, 'stok' => 18, 'deskripsi' => 'Botol minum reusable'],
        ['kode' => 'P005', 'nama_produk' => 'Stiker Kreatif', 'kategori' => 'Aksesori', 'harga' => 15000, 'stok' => 50, 'deskripsi' => 'Paket stiker bertema edukasi'],
        ['kode' => 'P006', 'nama_produk' => 'Pin Ekskul', 'kategori' => 'Aksesori', 'harga' => 10000, 'stok' => 40, 'deskripsi' => 'Pin kegiatan ekstrakurikuler'],
        ['kode' => 'P007', 'nama_produk' => 'Topi Sekolah', 'kategori' => 'Fashion', 'harga' => 55000, 'stok' => 12, 'deskripsi' => 'Topi model kasual'],
        ['kode' => 'P008', 'nama_produk' => 'Mug Kelas', 'kategori' => 'Perlengkapan', 'harga' => 35000, 'stok' => 25, 'deskripsi' => 'Mug souvenir kelas'],
    ];

    foreach ($data as $item) {
        Product::create($item);
    }

    }
}
