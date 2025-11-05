<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class ExpertoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = User::where("rol", "experto")->with("especialidad")->get();
       
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // esto es register
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->especialidad_id = $request->input("especialidad_id");
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
