<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEspecialidadRequest;
use App\Http\Requests\UpdateEspecialidadRequest;
use App\Models\Competidor;
use App\Models\Especialidad;
use Illuminate\Http\Response;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Especialidad::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEspecialidadRequest $request)
    {
        $especialidad = Especialidad::create($request->validated());

        return response()->json($especialidad, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEspecialidadRequest $request, Especialidad $especialidad)
    {
        $especialidad->update($request->validated());

        return response()->json($especialidad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidad $especialidad)
    {
        $especialidad->delete();
    }

    public function getCompetidores(Especialidad $especialidad) {
        return $especialidad->competidores;
    }
}
