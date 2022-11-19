<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelanggan',
        'point_masuk',
        'point_ditebus',
        'saldo_point',

];
}
