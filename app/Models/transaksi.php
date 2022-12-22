<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'kd_trx',
        'nama_barang',
        'harga_barang',
        'jumlah',
        'subtotal',
        'keterangan',
        'j_transaksi'


    ];
}
