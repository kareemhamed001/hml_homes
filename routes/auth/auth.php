<?php

use Illuminate\Support\Facades\Route;


Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/check-token', [\App\Http\Controllers\Auth\LoginController::class, 'checkValidToken']);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

