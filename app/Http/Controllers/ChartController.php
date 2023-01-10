<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\transaksi;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        $data = Stok::all();

        return response()->json($data);
    }
    public function getChartTm()
    {
        $data = transaksi::all();

        return response()->json($data);
    }
}
