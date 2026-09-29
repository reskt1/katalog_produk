<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. HALAMAN UTAMA / HOME
    public function home() {
        return view('home');
    }
    // 2. SISI PENGUNJUNG: Tampil Katalog & Pencarian
    public function index(Request $request) {
        $search = $request->get('search');

        // Fitur Pencarian berdasarkan nama atau kategori (Sesuai Syarat Bab B)
        if ($search) {
            $products = Product::where('nama_produk', 'like', "%{$search}%")
                               ->orWhere('kategori', 'like', "%{$search}%")
                               ->get();
        } else {
            $products = Product::all();
        }

        return view('katalog', compact('products'));
    }
     // 3. SISI PENGUNJUNG: Halaman Detail Produk
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Kembalikan ke fungsi semula: khusus menampilkan detail sisi user/pengunjung
        return view('detail', compact('product'));
    }

    // Tambahkan fungsi baru ini khusus untuk sisi Admin
    public function adminShow($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.detail', compact('product'));
    }

    // 4. SISI ADMIN: Halaman Utama Pengelolaan (Dashboard CRUD)
    public function adminIndex() {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }
     // 5. SISI ADMIN: Form Tambah Produk
    public function create() {
        return view('admin.create');
    }
    // 6. SISI ADMIN: Proses Simpan Data + Validasi (Sesuai Syarat Bab B)
    public function store(Request $request) {
    $request->validate([
        'kode' => 'required|unique:products,kode',
        'nama_produk' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar maks 2MB
    ]);

    $data = $request->all();

    // Logika jika Admin mengunggah berkas gambar asli
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        // Memberi nama unik agar gambar tidak bentrok (contoh: 171829384.png)
        $namaGambar = time() . '.' . $file->getClientOriginalExtension();
        // Memindahkan gambar asli ke dalam folder public/images
        $file->move(public_path('images'), $namaGambar);
        $data['gambar'] = $namaGambar;
    }

    Product::create($data);
    return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan');
}

    // 7. SISI ADMIN: Form Ubah Produk
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }
     // 8. SISI ADMIN: Proses Update Data
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:products,kode,'.$product->id,
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Produk berhasil diperbarui!');
    }
    // 9. SISI ADMIN: Proses Hapus Data
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus!');
    }
}
