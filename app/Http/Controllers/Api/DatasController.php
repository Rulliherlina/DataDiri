<?php

namespace App\Http\Controllers\Api;

use App\Models\Datas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $datas = Datas::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Diri',
            'data' => $datas
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
            'nama' => 'required|unique:datas|max:255',
            'tgl_lahir' => 'required',
            'no_tlp' => 'required|numeric'

        ]);

        $datas = Datas::create([
            'nama'=> $request->nama,
            'tgl_lahir' => $required->tgl_lahir,
            'no_tlp' => $request->no_tlp
            

            ]);

            if($datas)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Diri berhasil di tambahkan',
                    'data' => $datas
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Data Diri gagal di tambahkan',
                'data' => $datas
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
                $data = Datas::where('id', $id)->get();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data diri',
                    'data' => $data
                ], 200);
    }
    public function edit($id)
    {
                $data = Datas::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data diri',
                    'data' => $data
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
        /*$request->validate([
            'nama' => 'required|unique:datas|max:255',
            'no_tlp' => 'required|numeric',
            'tgl_lahir' => 'required,
            'alamat' => 'required'
        ]);*/
        $b = Datas::find($id)->update([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'no_tlp' => $request->no_tlp,
            
            
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $b
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
        $cek = Datas::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
