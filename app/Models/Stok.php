<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'harga_beli',
        'harga_normal',
        'harga_mitra',
        'harga_grosir',
        'tgl_exp',
        'stok',
    ];

}
