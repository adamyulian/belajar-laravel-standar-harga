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
        $tambah_usulans = tambah_usulan::all();
        return view('tambah_usulan.index', [
            'tambah_usulan' => $tambah_usulans
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
            'tanggal_usulan','jenis_usulan','jumlah_komponen'
            ,'jumlah_dukungan_penyedia','nomor_surat','penjelasan_komponen'
            ,'file_excel_dukungan','file_rar_dukungan'
        ]);
        $array['file_excel_dukungan'] = $request->file('file_excel_dukungan')->store('public/posts');
        $array['file_rar_dukungan'] = $request->file('file_excel_dukungan')->store('public/posts');

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
    public function edit($id)
    {
        $tambah_usulans = tambah_usulan::find($id);
        if (!$tambah_usulans) return redirect()->route('tambah_usulan.index')
            ->with('error_message', 'SHS '.$id.' tidak ditemukan');
        return view('tambah_usulan.edit', [
            'tammbah_usulan' => $tambah_usulans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetambah_usulanRequest  $request
     * @param  \App\Models\tambah_usulan  $tambah_usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
        ]);
        $tambah_usulans = tambah_usulan::find($id);
        $tambah_usulans->kode_komp = $request->kode_komp;
        $tambah_usulans->nama_komp = $request->nama_komp;
        $tambah_usulans->save();
        return redirect()->route('tambah_usulan.index')
            ->with('success_message', 'Berhasil mengubah SHS');
    }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request, $id)
    {
        $tambah_usulans = tambah_usulan::find($id);
        if ($id == $request->user()->id) return redirect()->route('tambah_usulan.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($tambah_usulans) $tambah_usulans->delete();
        return redirect()->route('tambah_usulan.index')
            ->with('success_message', 'Berhasil menghapus SHS');
    }
}