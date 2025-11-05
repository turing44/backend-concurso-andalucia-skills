<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetidorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\ExpertoController;
use App\Http\Controllers\PuntuacionController;
use App\Http\Middleware\RolMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user()->with("especialidad")->get();
})->middleware('auth:sanctum');


Route::middleware(["auth:sanctum", "rol:admin"])->group(function () {
    /* Route::get("/especialidades", [EspecialidadController::class, "index"]);
    Route::post("/especialidades", [EspecialidadController::class, "store"]);
    Route::put("/especialidades/{especialidad}", [EspecialidadController::class, "update"]);
    Route::delete("/especialidades/{especialidad}", [EspecialidadController::class, "destroy"]); */
    Route::apiResource("/especialidades", EspecialidadController::class)
    ->parameters(['especialidades' => 'especialidad']);


    Route::get("/expertos", [ExpertoController::class, "index"]);
    Route::post("/register", [AuthController::class, "register"]);
    Route::delete("/expertos/{user}", [ExpertoController::class, "destroy"]);

    // Dice que solo hace falta editar la especialidad
    Route::put("/expertos/{user}", [ExpertoController::class, "update"]);
});



Route::get("/especialidades/{especialidad}/competidores", [EspecialidadController::class, "getCompetidores"]);

Route::middleware(["auth:sanctum" , "rol:experto"])->group(function () {
    Route::apiResource("/competidores", CompetidorController::class)
            ->parameter("competidores", "competidor");
    Route::apiResource("/puntuaciones", PuntuacionController::class)
            ->parameter("competidores", "competidor");
});




Route::post("/login", [AuthController::class, "login"]);

Route::middleware(["auth:sanctum", "rol:admin,experto"])->group(function() {
    Route::get("/logout", [AuthController::class, "logout"]);
});
