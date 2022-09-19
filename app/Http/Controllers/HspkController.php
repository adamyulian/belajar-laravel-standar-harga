<?php

namespace App\Http\Controllers;

use App\Models\hspk;
use App\Http\Requests\StorehspkRequest;
use App\Http\Requests\UpdatehspkRequest;
use App\Models\User;
use App\Models\kodefikasi_aset;
use App\Models\KodefikasiRekeningBelanja;
use App\Models\satuan;

class HspkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hspks = hspk::all();
        return view('hspk.index', [
            'hspk' => $hspks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodefikasiaset = kodefikasi_aset::all();
        $kodefikasi_rekening_belanja = KodefikasiRekeningBelanja::all();
        $satuan = satuan::all();
        return view('hspk.create', compact('kodefikasiaset','kodefikasi_rekening_belanja', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorehspkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorehspkRequest $request)
    {
        $request->validate([
            'kode_komp'=> 'required',
            'nama_komp'=> 'required',
            'spesifikasi'=> 'required',
            'harga_satuan'=> 'required',
            'pajak'=> 'required',
            $table->string('kode_komp');
            $table->string('nama_komp');
            $table->text('spesifikasi');
            $table->string('nilai_hspk');
            $table->string('pajak');
            $table->foreignId('satuan_id');
            $table->foreignId('kodefikasi_rekening_belanja_id');
            $table->foreignId('kodefikasi_aset');
        ]);
        $array = $request->only([
            'kodefikasi_aset_id',
            'kode_komp',
            'nama_komp',
            'spesifikasi',
            'satuan_id',
            'harga_satuan',
            'pajak',
            'kodefikasi_rekening_belanja_id',
        ]);
        standar_harga::create($array);
        return redirect()->route('shs.index')
            ->with('success_message', 'Berhasil menambah SHS baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function show(hspk $hspk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function edit(hspk $hspk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehspkRequest  $request
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatehspkRequest $request, hspk $hspk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function destroy(hspk $hspk)
    {
        //
    }
}
