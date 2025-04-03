<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rolController;
use App\Models\Rol;
use App\Http\Controllers\usuarioController;
use App\Models\Usuario;

Route::get('/roles', [rolController::class, 'index']);
Route::post('/roles', [rolController::class, 'store']);
Route::put('/roles/{id}', [rolController::class, 'update']);
Route::patch('/roles/{id}', [rolController::class, 'updatePartial']);
Route::delete('/roles/{id}', [rolController::class, 'destroy']);


Route::post('/usuarios', [usuarioController::class, 'store']);
Route::get('/usuarios', [usuarioController::class, 'index']);
Route::post('/almacenar', [usuarioController::class, 'almacenar']);
