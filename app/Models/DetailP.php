<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailP extends Model
{
    use HasFactory;
    protected $fillable = [
        'trx_id',
        'tgl_transaksi',
        'keterangan',
        'nama',
        'subtotal',
        'diskon',
        'biaya_tambahan',
        'grand_total',
        'j_transaksi'


    ];
}
