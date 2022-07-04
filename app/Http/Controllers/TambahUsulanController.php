<?php

namespace App\Http\Controllers;

use App\Models\tambah_usulan;
use App\Http\Requests\Storetambah_usulanRequest;
use App\Http\Requests\Updatetambah_usulanRequest;

class TambahUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tambah_usulan.create');
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
    public function store(Storetambah_usulanRequest $request)
    {
        $request->validate([
            'username' => 'required',
            'file_excel_dukungan' => 'required|file|mimes:xls,xlsx',
            'file_rar_dukungan' => 'required|file|mimes:rar,zip'
        ]);
        $array = $request->only([
            'tanggal_usulan','perangkat_daerah','jenis_usulan','jumlah_komponen'
            ,'jumlah_dukungan_penyedia','nomor_surat','penjelasan_komponen'
            ,'file_excel_dukungan','file_rar_dukungan'
        ]);
        tambah_usulan::create($array);
        return redirect()->route('tambah_usulan.index')
            ->with('success_message', 'Berhasil menambah user baru');
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
    public function update(Updatetambah_usulanRequest $request, tambah_usulan $tambah_usulan)
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
