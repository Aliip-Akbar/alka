<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama',
        'jumlah_hutang',
        'total_bayar',
        'sisa_hutang',
        'status',
    ];
}
