<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetidorRequest;
use App\Http\Requests\UpdateCompetidorRequest;
use App\Models\Competidor;
use Illuminate\Http\Response;

class CompetidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidad_id = auth()->user()->especialidad_id;
        return Competidor::where("especialidad_id", $especialidad_id)->with("especialidad")->get();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetidorRequest $request)
    {

        $request->validated();

        $competidor = Competidor::create([
            "nombre" => $request->input("nombre"),
            "centro" => $request->input("centro"),
            "especialidad_id" => auth()->user()->especialidad_id,
        ]);

        return response()->json($competidor, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($competidor)
    {
        $especialidadExperto = auth()->user()->especialidad_id;

        return Competidor::where("especialidad_id", $especialidadExperto)->with("especialidad")
                ->findOrFail($competidor)
                ;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetidorRequest $request, Competidor $competidor)
    {
        return $competidor->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($competidor)
    {
        return response()->json(
            Competidor::find($competidor)->delete(), 204
        );
    }
}
