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
    public function index($id)
    {
        $hspk_rincians = hspk_rincian::all();
        $hspks = hspk::findOrfail($id);
        $standar_hargas = standar_harga::all();
        $hspk_rincians = hspk_rincian::select('*')->where('hspk_id', $hspks->id)->get();
        return view('hspk.hspk_rincian.index', $hspks, compact('standar_hargas', 'hspks', 'hspk_rincians'));
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
            'subkode_hspk' => 'required',
            'koefisien_hspk' => 'required|numeric',
            'standar_harga_id' => 'required',
        ]);
        $standar_harga = standar_harga::findOrFail($request->standar_harga_id);
        $harga_satuan = $standar_harga->harga_satuan;
        $koefisien_hspk = $request->koefisien_hspk;
        $subnilai_hspk = $harga_satuan*$koefisien_hspk;
        $array = $request->only([
            'subkode_hspk',
            'koefisien_hspk',
            'hspk_id',
            'standar_harga_id',
            'subnilai_hspk'=>$subnilai_hspk,
        ]);
        $hspk_rincian = hspk_rincian::create($array);
        return redirect()->back()->with('success_message', 'Berhasil menambah Komponen HSPK baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */

     public function show(hspk_rincian $request, $id)
    {
        $hspk_rincians = hspk_rincian::find($id);
        if ($hspk_rincians) $hspk_rincians->delete();
        $hspks = hspk::findOrfail($request->hspk_id);
        return redirect()->route('hspk.hspk_rincian.index')
            ->with('success_message', 'Berhasil menghapus SHS');
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
        $hspk_rincians = hspk_rincian::select('*')->where('hspk_id', $hspks->id)->get();
        // $koefisien_hspk = hspk_rincian::select('koefisien_hspk')->where('hspk_id', $hspks->id)->get();
        // $harga_satuan = standar_harga::select('harga_satuan')->get();
        // $subnilai_hspk = $koefisien_hspk * $harga_satuan ;
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

        // $hspk_rincian = standar_harga::find($request->standar_harga_id);
        // $harga_satuan = $standar_harga->harga_satuan;
        // $koefisien_hspk = $request->koefisien_hspk;
        // $subnilai_hspk = $harga_satuan*$koefisien_hspk;
        // $array = $request->only([
        //     'subkode_hspk',
        //     'koefisien_hspk',
        //     'hspk_id',
        //     'standar_harga_id',
        //     'subnilai_hspk'=>$subnilai_hspk,
        // ]);
        // $hspk_rincian = hspk_rincian::create($array);
        // return redirect()->back()->with('success_message', 'Berhasil menambah Komponen HSPK baru');

        // $request->validate([
        //     'kode_komp'=> 'required',
        //     'nama_komp'=> 'required' .$id,
        //     'spesifikasi'=> 'required',
        //     'satuan'=> 'required',
        //     'harga_satuan'=> 'required',
        //     'pajak'=> 'required',
        // ]);
        // $standar_hargas = standar_harga::find($id);
        // $kodefikasiaset = kodefikasi_aset::all();
        // $satuan = satuan::all();
        // $standar_hargas->kode_komp = $request->kode_komp;
        // $standar_hargas->nama_komp = $request->nama_komp;
        // $standar_hargas->save();
        // return redirect()->route('shs.index')
        //     ->with('success_message', 'Berhasil mengubah SHS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hspk_rincian  $hspk_rincian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hspk_rincians = hspk_rincian::find($id);
        $hspk_rincians->delete();
        return redirect()->back()
            ->with('success_message', 'Berhasil menghapus SHS');

    }
    // public function destroy(Request $request, $id)
    // {
    // $standar_hargas = standar_harga::find($id);
    // if ($standar_hargas) $standar_hargas->delete();
    // return redirect()->route('shs.index')
    //     ->with('success_message', 'Berhasil menghapus SHS');

    // }

}
