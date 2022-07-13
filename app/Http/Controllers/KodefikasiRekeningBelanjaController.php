<?php

namespace App\Http\Controllers;

use App\Models\KodefikasiRekeningBelanja;
use App\Http\Requests\StoreKodefikasiRekeningBelanjaRequest;
use App\Http\Requests\UpdateKodefikasiRekeningBelanjaRequest;

class KodefikasiRekeningBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodefikasi_rekening_belanja = KodefikasiRekeningBelanja::all();
        return view('kodefikasi_rekening_belanja.index', [
            'kodefikasi_rekening_belanja' => $kodefikasi_rekening_belanja
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
     * @param  \App\Http\Requests\StoreKodefikasiRekeningBelanjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKodefikasiRekeningBelanjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodefikasiRekeningBelanja  $kodefikasiRekeningBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(KodefikasiRekeningBelanja $kodefikasiRekeningBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodefikasiRekeningBelanja  $kodefikasiRekeningBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit(KodefikasiRekeningBelanja $kodefikasiRekeningBelanja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKodefikasiRekeningBelanjaRequest  $request
     * @param  \App\Models\KodefikasiRekeningBelanja  $kodefikasiRekeningBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodefikasiRekeningBelanjaRequest $request, KodefikasiRekeningBelanja $kodefikasiRekeningBelanja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodefikasiRekeningBelanja  $kodefikasiRekeningBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodefikasiRekeningBelanja $kodefikasiRekeningBelanja)
    {
        //
    }
}
