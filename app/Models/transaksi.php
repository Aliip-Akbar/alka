<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kd_barang = IdGenerator::generate(['table' => 'transaksis', 'length' => 12, 'prefix' =>'INV-']);
            $model->id = IdGenerator::generate(['table' => 'transaksis', 'length' => 4, 'prefix' => '1']);
        });
    }
    use HasFactory;
    protected $table = [
        'transaksis'
    ];
}
