<?php

namespace App\Http\Controllers;

use App\Models\DetailP;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Hutang;
use Auth;
class HutangController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {


        if ($request->ajax()) {

            $data = Hutang::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->make(true);
        }

        return view('cetak.hutang')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hutang::updateOrCreate([
            'id' => $request->id
        ],
        [
            'nama' => $request->nama,
            'jumlah_hutang'=> $request->jumlah_hutang,
            'total_bayar' => $request->total_bayar,
            'sisa_hutang' => $request->sisa_hutang,
            'status' => $request->status,
        ]);

        return response()->json(['success'=>'Barang baru Berhasil Ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
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
        Barang::find($id)->delete();

        return response()->json(['success'=>'Barang Berhasil DiHapus.']);
    }
}
