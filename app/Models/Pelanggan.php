<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kd_user',
        'nama_pelanggan',
        'alamat',
        'telp',
        'email',
        'j_pelanggan'

    ];
}
