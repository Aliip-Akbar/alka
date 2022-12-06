<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Barang extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kd_barang = IdGenerator::generate(['table' => 'barangs', 'length' => 8, 'prefix' =>'Brg']);
            $model->id = IdGenerator::generate(['table' => 'barangs', 'length' => 4, 'prefix' => '1']);
        });
    }
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori',
        'satuan_beli',
        'harga_beli',
        'satuan_jual',
        'harga_normal',
        'harga_mitra',
        'harga_grosir',
        'stok',
        'point',
    ];
}
