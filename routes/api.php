<?php

use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('jogadores', JogadoresController::class);
});

Route::controller(UsersController::class)->group(function(){
    Route::post('/login', 'login');
});