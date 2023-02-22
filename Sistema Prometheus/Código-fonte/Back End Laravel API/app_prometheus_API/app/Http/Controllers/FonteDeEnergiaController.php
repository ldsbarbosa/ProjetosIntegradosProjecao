<?php

namespace App\Http\Controllers;

use App\Models\FonteDeEnergia;
use App\Http\Requests\StoreFonteDeEnergiaRequest;
use App\Http\Requests\UpdateFonteDeEnergiaRequest;

class FonteDeEnergiaController extends Controller
{
    public function __construct(FonteDeEnergia $fonteDeEnergia){
        $this->fonteDeEnergia = $fonteDeEnergia;
    }
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
     * @param  \App\Http\Requests\StoreFonteDeEnergiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFonteDeEnergiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FonteDeEnergia  $fonteDeEnergia
     * @return \Illuminate\Http\Response
     */
    public function show(FonteDeEnergia $fonteDeEnergia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FonteDeEnergia  $fonteDeEnergia
     * @return \Illuminate\Http\Response
     */
    public function edit(FonteDeEnergia $fonteDeEnergia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFonteDeEnergiaRequest  $request
     * @param  \App\Models\FonteDeEnergia  $fonteDeEnergia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFonteDeEnergiaRequest $request, FonteDeEnergia $fonteDeEnergia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FonteDeEnergia  $fonteDeEnergia
     * @return \Illuminate\Http\Response
     */
    public function destroy(FonteDeEnergia $fonteDeEnergia)
    {
        //
    }
}
