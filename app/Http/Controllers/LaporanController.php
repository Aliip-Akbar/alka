<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\Models\transaksi;
use App\Models\Barang;
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

    public function cetak_pembelian()
{
    $todayDate = Carbon::now()->isoFormat(' dddd, D MMMM Y');
	$transaksi = transaksi::join('detail_p_s','detail_p_s.trx_id', '=','kd_trx')
                ->where('detail_p_s.j_transaksi','Transaksi Barang Masuk')
                ->where('transaksis.j_transaksi','Transaksi Barang Masuk')
                ->get(['transaksis.*', 'detail_p_s.*']);

	$pdf = PDF::loadview('laporan.cetak_pembelian', ['transaksi'=>$transaksi], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-pembelian.pdf');
}

public function cetak_penjualan()
{
    $todayDate = Carbon::now()->isoFormat('dddd, D MMMM Y');
	$transaksi = transaksi::join('detail_p_s','detail_p_s.trx_id', '=','kd_trx')
                ->where('detail_p_s.keterangan','Transaksi Reguler')
                ->where('transaksis.keterangan','Transaksi Reguler')
                ->get(['transaksis.*', 'detail_p_s.*']);

	$pdf = PDF::loadview('laporan.cetak_penjualan', ['transaksi'=>$transaksi], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-transaksi-reguler.pdf');
}

public function cetak_mitra()
{
    $todayDate = Carbon::now()->isoFormat('dddd, D MMMM Y');
	$transaksi = transaksi::join('detail_p_s','detail_p_s.trx_id', '=','kd_trx')
                ->where('detail_p_s.keterangan','Transaksi Mitra')
                ->where('transaksis.keterangan','Transaksi Mitra')
                ->get(['transaksis.*', 'detail_p_s.*']);

	$pdf = PDF::loadview('laporan.cetak_mitra', ['transaksi'=>$transaksi], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-transaksi-mitra.pdf');
}

public function cetak_barang()
{
	$barang = Barang::all();
    $todayDate = Carbon::now()->isoFormat('dddd, D MMMM Y');
	$pdf = PDF::loadview('laporan.cetak_barang', ['Barang'=>$barang], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-stok-barang.pdf');
}

public function cetak_masuk()
{
    $todayDate = Carbon::now()->isoFormat('dddd, D MMMM Y');
	$masuk = transaksi::where('j_transaksi', 'Transaksi Barang Masuk')->get();

	$pdf = PDF::loadview('laporan.cetak_masuk', ['transaksi'=>$masuk], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-barang-masuk.pdf');
}
public function cetak_keluar()
{
    $todayDate = Carbon::now()->isoFormat('dddd, D MMMM Y');
	$keluar= transaksi::where('j_transaksi', 'Transaksi Barang keluar')->get();

	$pdf = PDF::loadview('laporan.cetak_keluar', ['transaksi'=>$keluar], ['Carbon'=>$todayDate] );
	return $pdf->download('laporan-barang-keluar.pdf');
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
