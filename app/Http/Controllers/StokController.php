<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;
class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barangs = DB::table('barangs')->get();
        $satuans = DB::table('satuans')->get();
        if ($request->ajax()) {

            $data = Stok::all();

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editStok"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteStok"><i class="fas fa-trash-alt"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('transaksi.stok', ['satuans' => $satuans], ['barangs' => $barangs])->with([
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
        Stok::updateOrCreate([
            'id' => $request->id
        ],
        [
            'kd_barang' => $request->kd_barang,
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_normal' => $request->harga_normal,
            'harga_mitra' => $request->harga_mitra,
            'harga_grosir' => $request->harga_grosir,
            'tgl_exp' => $request->tgl_exp,
            'stok' => $request->stok,
        ]);

        return response()->json(['success'=>'Stok baru Berhasil Ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stok = Stok::find($id);
        return response()->json($stok);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = Stok::find($id);
        return response()->json($stok);
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
        Stok::find($id)->delete();

        return response()->json(['success'=>'Stok Berhasil DiHapus.']);
    }
}
