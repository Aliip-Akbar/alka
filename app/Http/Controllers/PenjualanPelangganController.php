<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Auth;
class PenjualanPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = DB::table('pelanggans')->get();

        return view('transaksi.p_pelanggan', ['pelanggans' => $pelanggans])->with([
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
            'id' => $request->id
        ],
        [
            'kd_trx' => $request->kd_trx,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga_barang' => $request->harga_barang,
            'subtotal' => $request->subtotal,

        ]);
        return response()->json(['success'=>'Data baru Berhasil Ditambahkan.']);
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
