<?php

namespace App\Http\Controllers;

use App\Models\PlacaMae;
use App\Http\Requests\StorePlacaMaeRequest;
use App\Http\Requests\UpdatePlacaMaeRequest;

class PlacaMaeController extends Controller
{
    public function __construct(PlacaMae $placaMae){
        $this->placaMae = $placaMae;
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
     * @param  \App\Http\Requests\StorePlacaMaeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlacaMaeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlacaMae  $placaMae
     * @return \Illuminate\Http\Response
     */
    public function show(PlacaMae $placaMae)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlacaMae  $placaMae
     * @return \Illuminate\Http\Response
     */
    public function edit(PlacaMae $placaMae)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlacaMaeRequest  $request
     * @param  \App\Models\PlacaMae  $placaMae
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlacaMaeRequest $request, PlacaMae $placaMae)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlacaMae  $placaMae
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlacaMae $placaMae)
    {
        //
    }
}
