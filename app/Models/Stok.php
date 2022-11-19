<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'satuan',
        'tgl_exp',
        'harga_beli',
        'stok',

    ];
}
