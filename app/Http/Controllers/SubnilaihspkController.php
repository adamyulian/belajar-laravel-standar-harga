<?php

namespace App\Http\Controllers;

use App\Models\subnilaihspk;
use App\Http\Requests\StoresubnilaihspkRequest;
use App\Http\Requests\UpdatesubnilaihspkRequest;

class SubnilaihspkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresubnilaihspkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubnilaihspkRequest $request)
    {
        $request->validate([

        ]);
        $array = $request->only([
            'subnilai'=> $request->subnilai,
            'hspk_rincian_id'=> $request->hspk_rincian_id,
        ]);
        subnilaihspk::create($array);
        return redirect()->back()
            ->with('success_message', 'Berhasil menyimpan subnilai HSPK baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subnilaihspk  $subnilaihspk
     * @return \Illuminate\Http\Response
     */
    public function show(subnilaihspk $subnilaihspk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subnilaihspk  $subnilaihspk
     * @return \Illuminate\Http\Response
     */
    public function edit(subnilaihspk $subnilaihspk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubnilaihspkRequest  $request
     * @param  \App\Models\subnilaihspk  $subnilaihspk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubnilaihspkRequest $request, subnilaihspk $subnilaihspk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subnilaihspk  $subnilaihspk
     * @return \Illuminate\Http\Response
     */
    public function destroy(subnilaihspk $subnilaihspk)
    {
        //
    }
}
