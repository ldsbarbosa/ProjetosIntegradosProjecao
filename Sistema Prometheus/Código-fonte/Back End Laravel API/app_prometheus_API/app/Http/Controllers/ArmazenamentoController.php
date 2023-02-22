<?php

namespace App\Http\Controllers;

use App\Models\Armazenamento;
use App\Http\Requests\StoreArmazenamentoRequest;
use App\Http\Requests\UpdateArmazenamentoRequest;

class ArmazenamentoController extends Controller
{
    public function __construct(Armazenamento $armazenamento){
        $this->armazenamento = $armazenamento;
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
     * @param  \App\Http\Requests\StoreArmazenamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArmazenamentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Armazenamento  $armazenamento
     * @return \Illuminate\Http\Response
     */
    public function show(Armazenamento $armazenamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Armazenamento  $armazenamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Armazenamento $armazenamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArmazenamentoRequest  $request
     * @param  \App\Models\Armazenamento  $armazenamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArmazenamentoRequest $request, Armazenamento $armazenamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Armazenamento  $armazenamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armazenamento $armazenamento)
    {
        //
    }
}
