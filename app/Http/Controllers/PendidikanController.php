<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$pendidikan = Pendidikan::latest()->paginate(10);
	return view('pendidikan.index', compact('pendidikan'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('pendidikan.create');
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
	'jenjangpendidikan' => 'required',
	'thn_masuk' => 'required',
	'thn_lulus' => 'required'
	]);
	
	$pendidikan = Pendidikan::create([
	'nama' => $request->nama,
	'jenjangpendidikan' => $request->jenjangpendidikan,
	'thn_masuk' => $request->thn_masuk,
	'thn_lulus' => $request->thn_lulus
	]);
	
	if($pendidikan){
	//redirect dengan pesan sukses
	return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('pendidikan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
	public function edit(pendidikan $pendidikan)
	{
	return view('pendidikan.edit', compact('pendidikan'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, pendidikan $pendidikan)
	{
	$this->validate($request, [
		'nama' => 'required',
		'jenjangpendidikan' => 'required',
		'thn_masuk' => 'required',
		'thn_lulus' => 'required'
	]);
	
	$pendidikan->update([
		'nama' => $request->nama,
		'jenjangpendidikan' => $request->jenjangpendidikan,
		'thn_masuk' => $request->thn_masuk,
		'thn_lulus' => $request->thn_lulus
	]);
	
	if($pendidikan) {
	//redirect dengan pesan sukses
	return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('pendidikan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
	
	$pendidikan = Pendidikan::findOrFail($id);
	
	if($pendidikan){
	//redirect dengan pesan sukses
	return redirect()->route('pendidikan.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('pendidikan.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}