<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginPage']);
