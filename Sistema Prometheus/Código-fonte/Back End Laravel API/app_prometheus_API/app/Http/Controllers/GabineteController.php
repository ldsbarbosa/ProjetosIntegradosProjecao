<?php

namespace App\Http\Controllers;

use App\Models\Gabinete;
use App\Http\Requests\StoreGabineteRequest;
use App\Http\Requests\UpdateGabineteRequest;

class GabineteController extends Controller
{
    public function __construct(Gabinete $gabinete){
        $this->gabinete = $gabinete;
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
     * @param  \App\Http\Requests\StoreGabineteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGabineteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gabinete  $gabinete
     * @return \Illuminate\Http\Response
     */
    public function show(Gabinete $gabinete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gabinete  $gabinete
     * @return \Illuminate\Http\Response
     */
    public function edit(Gabinete $gabinete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGabineteRequest  $request
     * @param  \App\Models\Gabinete  $gabinete
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGabineteRequest $request, Gabinete $gabinete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gabinete  $gabinete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gabinete $gabinete)
    {
        //
    }
}
