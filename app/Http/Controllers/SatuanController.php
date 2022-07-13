<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use App\Http\Requests\StoresatuanRequest;
use App\Http\Requests\UpdatesatuanRequest;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = satuan::all();
        return view('satuan.index', [
            'satuan' => $satuan
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
     * @param  \App\Http\Requests\StoresatuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresatuanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesatuanRequest  $request
     * @param  \App\Models\satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesatuanRequest $request, satuan $satuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(satuan $satuan)
    {
        //
    }
}
