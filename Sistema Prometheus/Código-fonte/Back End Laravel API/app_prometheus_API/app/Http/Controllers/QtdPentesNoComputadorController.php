<?php

namespace App\Http\Controllers;

use App\Models\QtdPentesNoComputador;
use App\Http\Requests\StoreQtdPentesNoComputadorRequest;
use App\Http\Requests\UpdateQtdPentesNoComputadorRequest;

class QtdPentesNoComputadorController extends Controller
{
    public function __construct(QtdPentesNoComputador $qtdPentesNoComputador){
        $this->qtdPentesNoComputador = $qtdPentesNoComputador;
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
     * @param  \App\Http\Requests\StoreQtdPentesNoComputadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQtdPentesNoComputadorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QtdPentesNoComputador  $qtdPentesNoComputador
     * @return \Illuminate\Http\Response
     */
    public function show(QtdPentesNoComputador $qtdPentesNoComputador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QtdPentesNoComputador  $qtdPentesNoComputador
     * @return \Illuminate\Http\Response
     */
    public function edit(QtdPentesNoComputador $qtdPentesNoComputador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQtdPentesNoComputadorRequest  $request
     * @param  \App\Models\QtdPentesNoComputador  $qtdPentesNoComputador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQtdPentesNoComputadorRequest $request, QtdPentesNoComputador $qtdPentesNoComputador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QtdPentesNoComputador  $qtdPentesNoComputador
     * @return \Illuminate\Http\Response
     */
    public function destroy(QtdPentesNoComputador $qtdPentesNoComputador)
    {
        //
    }
}
