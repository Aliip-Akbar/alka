<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Pelanggan extends Model
{
    public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->kd_user = IdGenerator::generate(['table' => 'pelanggans', 'length' =>6, 'prefix' =>'M-']);
            $model->id = IdGenerator::generate(['table' => 'pelanggans', 'length' => 4, 'prefix' => '1']);
    });
}
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_pelanggan',
        'alamat',
        'telp',
        'email',
        'j_pelanggan'

    ];
}
