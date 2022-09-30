<?php

namespace App\Http\Controllers;

use App\Models\hspk_rincian;
use App\Http\Requests\Storehspk_rincianRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Updatehspk_rincianRequest;
use App\Models\User;
use App\Models\standar_harga;
use App\Models\hspk;
use App\Models\kodefikasi_aset;
use App\Models\KodefikasiRekeningBelanja;
use App\Models\satuan;

class HspkRincianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hspk_rincians = hspk_rincian::all();
        return view('hspk_rincian.index', [
            'hspk_rincian' => $hspk_rincians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storehspk_rincianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);

        $array = $request->only([
            'subkode_hspk',
            'koefisien_hspk',
            'subnilai_hspk',
            'hspk_id',
            'standar_harga_id',
        ]);
        hspk_rincian::create($array);
        $hspks = hspk::findOrfail($request->hspk_id);
        return redirect()->route('hspk_rincian.edit', $hspks)
            ->with('success_message', 'Berhasil menambah HSPK baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */
    public function show(hspk_rincian $hspk_rincian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hspks = hspk::findOrfail($id);
        $standar_hargas = standar_harga::all();
        $hspk_rincians = hspk_rincian::all();
        return view('hspk_rincian.edit', compact('standar_hargas', 'hspks', 'hspk_rincians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatehspk_rincianRequest  $request
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */
    public function destroy(hspk_rincian $hspk_rincian)
    {
        //
    }
}
