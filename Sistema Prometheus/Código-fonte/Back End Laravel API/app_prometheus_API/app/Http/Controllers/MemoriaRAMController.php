<?php

namespace App\Http\Controllers;

use App\Models\MemoriaRAM;
use App\Http\Requests\StoreMemoriaRAMRequest;
use App\Http\Requests\UpdateMemoriaRAMRequest;

class MemoriaRAMController extends Controller
{
    public function __construct(MemoriaRAM $memoriaRAM){
        $this->memoriaRAM = $memoriaRAM;
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
     * @param  \App\Http\Requests\StoreMemoriaRAMRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoriaRAMRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemoriaRAM  $memoriaRAM
     * @return \Illuminate\Http\Response
     */
    public function show(MemoriaRAM $memoriaRAM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemoriaRAM  $memoriaRAM
     * @return \Illuminate\Http\Response
     */
    public function edit(MemoriaRAM $memoriaRAM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoriaRAMRequest  $request
     * @param  \App\Models\MemoriaRAM  $memoriaRAM
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoriaRAMRequest $request, MemoriaRAM $memoriaRAM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemoriaRAM  $memoriaRAM
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemoriaRAM $memoriaRAM)
    {
        //
    }
}
