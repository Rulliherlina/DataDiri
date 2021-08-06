<?php

namespace App\Http\Controllers\Api;

use App\Models\Pendidikans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikans = Pendidikans::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar pendidikan',
            'data' => $pendidikans
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pendidikans|max:255',
            'jenjangpendidikan' => 'required',
		    'thn_masuk' => 'required',
		    'thn_lulus' => 'required'
        ]);

        $pendidikans = Pendidikans::create([
            'name'=> $request->name,
            'jenjangpendidikan' => $request->jenjangpendidikan,
		    'thn_masuk' => $request->thn_masuk,
		    'thn_lulus' => $request->thn_lulus
            ]);

            if($pendidikans)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'pendidikans berhasil di tambahkan',
                    'data' => $pendidikans
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'pendidikans gagal di tambahkan',
                'data' => $pendidikans
            ], 409);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidikan = Pendidikans::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail pendidikans',
            'data' => $pendidikan
        ], 200);
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
        $request->validate([
            'name' => 'required|unique:pendidikans|max:255',
            'jenjangpendidikan' => 'required',
            'thn_masuk' => 'required',
            'thn_lulus' => 'required'
        ]);

        $h = Pendidikans::find($id)->update([
            'name' => $request->name,
            'jenjangpendidikan' => $request->jenjangpendidikan,
            'thn_masuk' => $request->thn_masuk,
            'thn_lulus' => $request->thn_lulus
        ]);

        return response()->json([
            'success' => true,
            'message' => 'pendidikans Updated',
            'data' => $h
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Pendidikans::find($id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'pendidikans Deleted',
            'data' => $cek
        ], 200);
    }
}
