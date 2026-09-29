<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'kode',
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'gambar'
    ];
}
