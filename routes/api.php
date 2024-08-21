<?php

use App\Http\Controllers\empleadoController;
use App\Http\Controllers\usuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/usuario', [usuarioController::class, 'registrar']);
Route::post('/empleado', [empleadoController::class, 'saveImage']);
Route::get('/buscar', [empleadoController::class, 'buscarEmpleados']);
