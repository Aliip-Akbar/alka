<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\detailP;
use App\Models\transaksi;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cetak.laporan')->with([
            'user' => Auth::user()
        ]);
    }

    public function cetak_penjualan()
{
	$detail = detailP::where('j_transaksi', 'Transaksi Barang Masuk')->get();
    $transaksi = transaksi::where('j_transaksi', 'Transaksi Barang Masuk')->get();

	$pdf = PDF::loadview('laporan.penjualan',['detail'=>$detail], ['transaksi'=>$transaksi] );
	return $pdf->download('laporan-pembelian.pdf');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
