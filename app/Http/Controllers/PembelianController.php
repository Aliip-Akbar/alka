<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use Auth;
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $pelanggans = Pelanggan::where('j_pelanggan', 'mitra')->get();

        return view('transaksi.pembelian', ['Pelanggan' => $pelanggans])->with([
            'user' => Auth::user()
        ]);
    }

    public function getData($nama_barang)
    {
        if (empty($nama_barang)) {
            return [];
        }
        $barangs = DB::table('barangs')
            ->select('barangs.*')
            ->where('nama_barang', 'LIKE', "$nama_barang%")
            ->limit(25)
            ->get();

        return $barangs;
    }
    public function getStok($nama_barang)
    {
        if (empty($nama_barang)) {
            return [];
        }
        $barangs = DB::table('stoks')
            ->select('stoks.*')
            ->where('nama_barang', 'LIKE', "$nama_barang%")
            ->limit(25)
            ->get();

        return $barangs;
    }

    public function getInfo($trx_id)
    {
        $trx = DB::table('detail_p_s')
        ->select('detail_p_s.*')
        ->where('trx_id',"$trx_id")
        -get();

        return $trx;
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
        transaksi::updateOrCreate([
            'id_transaksi' => $request->id_transaksi
        ],
        [
            'kd_trx' => $request->kd_trx,
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'harga_barang' => $request->harga_barang,
            'subtotal' => $request->subtotal,
            'j_transaksi' => $request->j_transaksi

        ]);
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
