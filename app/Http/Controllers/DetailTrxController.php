<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailP;
use DB;
class DetailTrxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        DetailP::updateOrCreate([
            'id' => $request->id
        ],
        [
            'trx_id' => $request->trx_id,
            'keterangan' => $request->keterangan,
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama' => $request->nama,
            'subtotal' => $request->subtotal,
            'diskon' => $request->diskon,
            'biaya_tambahan' => $request->biaya_tambahan,
            'grand_total' => $request->grand_total,
            'j_transaksi' => $request->j_transaksi

        ]);
        return response()->json(['success'=>'pelanggan baru Berhasil Ditambahkan.']);
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
