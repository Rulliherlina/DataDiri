<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$data = Data::latest()->paginate(10);
	return view('data.index', compact('data'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('data.create');
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
	$this->validate($request, [

	'nama' => 'required',
	'tanggal_lahir' => 'required',
	'no_tlp' => 'required'
	]);
	
	$data = Data::create([
	'nama' => $request->nama,
	'tanggal_lahir' => $request->tanggal_lahir,
	'no_tlp' => $request->no_tlp
	]);
	
	if($data){
	//redirect dengan pesan sukses
	return redirect()->route('data.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('data.index')->with(['error' => 'Data Gagal Disimpan!']);
	}
	}
	
	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
	//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function edit(Data $data)
	{
	return view('data.edit', compact('data'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, data $data)
	{
	$this->validate($request, [
    'nama' => 'required',
    'tanggal_lahir' => 'required',
	'no_tlp' => 'required'
	]);
	
	$data->update([
    'nama' => $request->nama,
    'tanggal_lahir' => $request->tanggal_lahir,
    'no_tlp' =>$request->no_tlp
	]);
	
	if($data) {
	//redirect dengan pesan sukses
	return redirect()->route('data.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('data.index')->with(['error' => 'Data Gagal Diupdate!']);
	}
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
	
	$data = Data::findOrFail($id);
	
	if($data){
	//redirect dengan pesan sukses
	return redirect()->route('data.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('data.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}