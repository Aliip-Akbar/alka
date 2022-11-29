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
            $model->kd_trx = IdGenerator::generate(['table' => 'transaksis', 'length' =>12, 'prefix' =>'TrxOut-']);
                $model->id = IdGenerator::generate(['table' => 'transaksis', 'length' => 1, 'prefix' => '1']);
                $model->id_transaksi = IdGenerator::generate(['table' => 'transaksis', 'length' => 4, 'prefix' => '0']);
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
        'grand_total',


    ];
}
