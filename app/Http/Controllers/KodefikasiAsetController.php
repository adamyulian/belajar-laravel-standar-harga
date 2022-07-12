<?php

namespace App\Http\Controllers;

use App\Models\KodefikasiAset;
use App\Http\Requests\StoreKodefikasiAsetRequest;
use App\Http\Requests\UpdateKodefikasiAsetRequest;
use App\Models\kodefikasi_aset;

class KodefikasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodefikasi_asets = kodefikasi_aset::all();
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

 }
