<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtrx extends Model
{
    use HasFactory;

    protected $fillable =[
        'trx_id',
        'nama_pelanggan',
        'subtotal',
        'diskon',
        'pajak',
        'grand_total',
    ];
}
