<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kd_trx = IdGenerator::generate(['table' => 'transaksis', 'length' =>10, 'prefix' =>'OUTR-']);
                $model->id = IdGenerator::generate(['table' => 'pelanggans', 'length' => 4, 'prefix' => '1']);
        });
    }
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id',
        'kd_trx',
        'nama_barang',
        'exp_date',
        'jumlah',
        'satuan',
        'harga_beli',
        'subtotal',
        'total',
        'ongkir',
        'diskon',
        'pembayaran',
        'kembalian'


    ];
}
