<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang',
        'nama_barang',
        'kategori',
        'satuan_beli',
        'harga_beli',
        'satuan_jual',
        'harga_normal',
        'harga_mitra',
        'harga_grosir',
        'point',
    ];
}
