<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cliente;
use App\Http\Controllers\Locacao;
use App\Http\Controllers\Marca;
use App\Http\Controllers\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });


Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    Route::apiResource('locacao', LocacaoController::class);
    Route::apiResource('cliente', ClienteController::class);
    Route::apiResource('marca', MarcaController::class);
    Route::apiResource('modelo', ModeloController::class);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']) ;
    Route::post('logout', [AuthController::class, 'logout']) ;
});

Route::post('login', [AuthController::class, 'login'])->name('login');