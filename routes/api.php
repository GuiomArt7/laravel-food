<?php

use App\Http\Controllers\AgotadoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReadyController;
use App\Http\Controllers\UsuariosController;
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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    //Almacenar órdenes
    Route::apiResource('/pedidos', PedidoController::class);
    
    Route::apiResource('/categorias', CategoriaController::class);
    Route::apiResource('/ready', ReadyController::class);
    Route::apiResource('/productos', ProductoController::class);
    Route::apiResource('/agotados', AgotadoController::class);
    Route::apiResource('/usuarios', UsuariosController::class);
    Route::post('/registro', [AuthController::class, 'register']);
    
});

//Autenticación
Route::post('/login', [AuthController::class, 'login']);
Route::delete('usuarios/{id}', [AuthController::class, 'destroy']);

