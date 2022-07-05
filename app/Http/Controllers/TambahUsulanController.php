<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tambah_usulan;
use App\Models\User;

class TambahUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tambah_usulan = tambah_usulan::all();
        return view('tambah_usulan.index', [
            'tambah_usulan' => $tambah_usulan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_usulan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetambah_usulanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        ddd($request);
        $request->validate([
           
        ]);
        $array = $request->only([
            'tanggal_usulan','perangkat_daerah','jenis_usulan','jumlah_komponen'
            ,'jumlah_dukungan_penyedia','nomor_surat','penjelasan_komponen'
            ,'file_excel_dukungan','file_rar_dukungan'
        ]);
        $file_excel_dukungan = $request->file('file_excel_dukungan');$file_excel_dukungan->storeAs('public/posts', $file_excel_dukungan->hashName());

        $file_rar_dukungan = $request->file('file_excel_dukungan');$file_rar_dukungan->storeAs('public/posts', $file_rar_dukungan->hashName());

        tambah_usulan::create($array);
        return redirect()->route('tambah_usulan.index')
            ->with('success_message', 'Berhasil menambah usulan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tambah_usulan  $tambah_usulan
     * @return \Illuminate\Http\Response
     */
    public function show(tambah_usulan $tambah_usulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tambah_usulan  $tambah_usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(tambah_usulan $tambah_usulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetambah_usulanRequest  $request
     * @param  \App\Models\tambah_usulan  $tambah_usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tambah_usulan $tambah_usulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tambah_usulan  $tambah_usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tambah_usulan $tambah_usulan)
    {
        //
    }
}
