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
        $hspks = hspk::all();
        $standar_hargas = standar_harga::all();
        $satuan = satuan::all();
        return view('hspk.hspk_rincian.create', compact('hspks','standar_hargas', 'satuan'));
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
        $array = $request->only([
            'subkode_hspk',
            'koefisien_hspk',
            'hspk_id',
            'standar_harga_id',
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

        $request->validate([

        ]);
        $hspk_rincians = hspk_rincian::findOrfail($id);
        $hspk_rincians->subkode_hspk = $request->subkode_hspk;
        $hspk_rincians->koefisien_hspk = $request->koefisien_hspk;
        $hspk_rincians->standar_harga_id = $request->standar_harga_id;
        $hspk_rincians->save();
        return redirect()->back()
            ->with('success_message', 'Berhasil mengubah Usulan');
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
