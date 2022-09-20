<?php

namespace App\Http\Controllers;

use App\Models\hspk;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $array = $request->only([
            'kodefikasi_aset_id',
            'kode_komp',
            'nama_hspk',
            'penjelasan_hspk',
            'satuan_id',
            'nilai_hspk',
            'pajak',
            'kodefikasi_rekening_belanja_id',
        ]);
        hspk::create($array);
        return redirect()->route('hspk.index')
            ->with('success_message', 'Berhasil menambah HSPK baru');
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
    public function edit(hspk $id)
    {
        $hspks = hspk::find($id);
        $kodefikasiaset = kodefikasi_aset::all();
        $kodefikasi_rekening_belanja = KodefikasiRekeningBelanja::all();
        $satuan = satuan::all();
        if (!$hspks) return redirect()->route('hspk.index')
            ->with('error_message', 'HSPK dengan id'.$id.' tidak ditemukan');
        return view('shs.edit', compact('kodefikasiaset','kodefikasi_rekening_belanja','satuan'),[
            'standar_harga' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehspkRequest  $request
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatehspkRequest $request, hspk $hspk, $id)
    {
        $request->validate([
            'kode_komp'=> 'required',
            'nama_hspk'=> 'required' .$id,
            'penjelasan_hspk'=> 'required',
            'satuan_id'=> 'required',
            'nilai_hspk'=> 'required',
            'pajak'=> 'required',
        ]);
        $hspks = hspk::find($id);
        $kodefikasiaset = kodefikasi_aset::all();
        $satuan = satuan::all();
        $hspks->kode_komp = $request->kode_komp;
        $hspks->nama_komp = $request->nama_komp;
        $hspks->save();
        return redirect()->route('hspk.index')
            ->with('success_message', 'Berhasil mengubah HSPK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hspk  $hspk
     * @return \Illuminate\Http\Response
     */
    public function destroy(hspk $id)
    {
        $hspks = hspk::find($id);
        if ($hspks) $hspks->delete();
        return redirect()->route('shs.index')
            ->with('success_message', 'Berhasil menghapus HSPK');
    }
}
