<?php

namespace App\Http\Controllers;

use App\Models\KodefikasiAset;
use App\Http\Requests\StoreKodefikasiAsetRequest;
use App\Http\Requests\UpdateKodefikasiAsetRequest;

class KodefikasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodefikasi_asets = KodefikasiAset::all();
        return view('kodefikasi_aset.index', [
            'kodefikasi_aset' => $kodefikasi_asets
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
     * @param  \App\Http\Requests\StoreKodefikasiAsetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKodefikasiAsetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function show(KodefikasiAset $kodefikasiAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function edit(KodefikasiAset $kodefikasiAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKodefikasiAsetRequest  $request
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodefikasiAsetRequest $request, KodefikasiAset $kodefikasiAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodefikasiAset $kodefikasiAset)
    {
        //
    }
}
