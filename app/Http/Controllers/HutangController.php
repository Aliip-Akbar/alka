<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
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
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm  editHutang"><i class="fas fa-edit "></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $satuans = DB::table('satuans')->get();
        $kategoris = DB::table('kategoris')->get();

        return view('cetak.hutang', ['satuans' => $satuans], ['kategoris' => $kategoris])->with([
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
            'jumlah_hutang' => $request->jumlah_hutang,
            'total_bayar' => $request->total_bayar,
            'sisa_hutang' => $request->sisa_hutang,
            'status' => $request->status,
        ]);

        return response()->json(['success'=>'Hutang baru Berhasil Ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Hutang = Hutang::find($id);
        return response()->json($Hutang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Hutang = Hutang::find($id);
        return response()->json($Hutang);
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
        Hutang::find($id)->delete();

        return response()->json(['success'=>'Hutang Berhasil DiHapus.']);
    }
}
