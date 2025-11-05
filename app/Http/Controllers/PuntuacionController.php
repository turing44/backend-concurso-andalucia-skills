<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePuntuacionRequest;
use App\Http\Requests\UpdatePuntuacionRequest;
use App\Models\Puntuacion;

class PuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Puntuacion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePuntuacionRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Puntuacion $puntuacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puntuacion $puntuacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePuntuacionRequest $request, Puntuacion $puntuacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puntuacion $puntuacion)
    {
        //
    }
}
