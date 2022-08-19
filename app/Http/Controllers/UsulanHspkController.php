<?php

namespace App\Http\Controllers;

use App\Models\usulan_hspk;
use App\Http\Requests\Storeusulan_hspkRequest;
use App\Http\Requests\Updateusulan_hspkRequest;

class UsulanHspkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan_hspks = usulan_hspk::all();
        return view('usulan_hspk.index', [
            'usulan_hspk' => $usulan_hspks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = user::all();
        return view('usulan_hspk.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeusulan_hspkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeusulan_hspkRequest $request)
    {
        $request->validate([
            //'tanggal_usulan'=> 'required',
            //'jenis_usulan' => 'required',
            //'jumlah_komponen' => 'required',
            //'jumlah_dukungan_penyedia' => 'required',
            //'nomor_surat' => 'required',
            //'penjelasan_komponen' => 'required',
            //'file_excel_dukungan'=>'required|file|mimes:xls,xlxs',
            //'file_rar_dukungan' =>'required|file|mimes:rar,zip',
        ]);
        $array = $request->only([
            'user_id',
            'tanggal_usulan',
            'jenis_usulan',
            'jumlah_komponen',
            'jumlah_dukungan_penyedia',
            'nomor_surat',
            'penjelasan_komponen',
            'file_excel_dukungan',
            'file_rar_dukungan'
        ]);
        $array['file_excel_dukungan'] = $request->file('file_excel_dukungan')->store('public/posts/excel');
        $array['file_rar_dukungan'] = $request->file('file_rar_dukungan')->store('public/posts/rar');

        tambah_usulan::create($array);

        return redirect()->route('tambah_usulan.index')
            ->with('success_message', 'Berhasil menambah Usulan Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usulan_hspk  $usulan_hspk
     * @return \Illuminate\Http\Response
     */
    public function show(usulan_hspk $usulan_hspk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usulan_hspk  $usulan_hspk
     * @return \Illuminate\Http\Response
     */
    public function edit(usulan_hspk $usulan_hspk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateusulan_hspkRequest  $request
     * @param  \App\Models\usulan_hspk  $usulan_hspk
     * @return \Illuminate\Http\Response
     */
    public function update(Updateusulan_hspkRequest $request, usulan_hspk $usulan_hspk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usulan_hspk  $usulan_hspk
     * @return \Illuminate\Http\Response
     */
    public function destroy(usulan_hspk $usulan_hspk)
    {
        //
    }
}
