<?php

use App\Http\Controllers\FirmaController;
use App\Http\Controllers\PracownikController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/firmy',FirmaController::class);
Route::apiResource('/pracownicy',PracownikController::class);