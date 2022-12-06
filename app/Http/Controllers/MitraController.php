<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use DataTables;
use Auth;
class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Pelanggan::where('j_pelanggan', 'mitra')->get();

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editMitra"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteMitra"><i class="fas fa-trash-alt"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="show btn btn-primary btn-sm showMitra"><i class="fas fa-eye"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('data_master.mitra')->with([
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
        Pelanggan::updateOrCreate([
            'id' => $request->id
        ],
        [
            'kd_user' => $request->kd_user,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'kategori' => $request->kategori,
            'j_pelanggan' => $request->j_pelanggan,
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
        $pelanggan = Pelanggan::find($id);
        return response()->json($pelanggan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return response()->json($pelanggan);
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
        Pelanggan::find($id)->delete();

        return response()->json(['success'=>'pelanggan Berhasil DiHapus.']);
    }
}
