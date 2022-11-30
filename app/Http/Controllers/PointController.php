<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;
class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $mitras = DB::table('mitras')->get();
        $pelanggans = DB::table('pelanggans')->get();
        if ($request->ajax()) {

            $data = Point::all();

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editPoint"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePoint"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('transaksi.point', ['pelanggans' => $pelanggans])->with([
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
        Point::updateOrCreate([
            'id' => $request->id
        ],
        [
            'nama_pelanggan' => $request->nama_pelanggan,
            'point_masuk' => $request->point_masuk,
            'point_ditebus' => $request->point_ditebus,
        ]);

        return response()->json(['success'=>'Point baru Berhasil Ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $point = Point::find($id);
        return response()->json($point);
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
        Point::find($id)->delete();

        return response()->json(['success'=>'Point Berhasil DiHapus.']);
    }
}
