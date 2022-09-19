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
        //
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
