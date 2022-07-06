<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\standar_harga;
use App\Models\User;

class ShsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standar_hargas = standar_harga::all();
        return view('shs.index', [
            'shs' => $standar_hargas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('shs.create');
}
public function store(Request $request)
{
    $request->validate([
        'kode_komp'=> 'required',
        'nama_komp'=> 'required',
        'spesifikasi'=> 'required',
        'satuan'=> 'required',
        'harga_satuan'=> 'required',
        'pajak'=> 'required',
        'rek_belanja'=> 'required',
    ]);
    $array = $request->only([
        'kode_komp',
        'nama_komp',
        'spesifikasi',
        'satuan',
        'harga_satuan',
        'pajak',
        'rek_belanja'
    ]);
    standar_harga::create($array);
    return redirect()->route('shs.index')
        ->with('success_message', 'Berhasil menambah SHS baru');
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
    $standar_hargas = standar_harga::find($id);
    if (!$standar_hargas) return redirect()->route('shs.index')
        ->with('error_message', 'Shs dengan id'.$id.' tidak ditemukan');
    return view('shs.edit', [
        'standar_harga' => $standar_hargas
    ]);
}
public function update(Request $request, $id)
{
    $request->validate([
        'kode_komp'=> 'required',
        'nama_komp'=> 'required' .$id,
        'spesifikasi'=> 'required',
        'satuan'=> 'required',
        'harga_satuan'=> 'required',
        'pajak'=> 'required',
        'rek_belanja'=> 'required',
    ]);
    $standar_hargas = standar_harga::find($id);
    $standar_hargas->kode_komp = $request->kode_komp;
    $standar_hargas->nama_komp = $request->nama_komp;
    $standar_hargas->save();
    return redirect()->route('shs.index')
        ->with('success_message', 'Berhasil mengubah SHS');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
{
    $standar_hargas = standar_harga::find($id);
    if ($id == $request->user()->id) return redirect()->route('shs.index')
        ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    if ($standar_hargas) $standar_hargas->delete();
    return redirect()->route('shs.index')
        ->with('success_message', 'Berhasil menghapus SHS');
}
}