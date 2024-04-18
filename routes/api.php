<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreweryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/login', [AuthController::class, 'login']);

Route::get('/brewery', [BreweryController::class, 'index'])->middleware('auth:sanctum');
Route::get('/brewery/{breweryId}', [BreweryController::class, 'show'])->middleware('auth:sanctum');