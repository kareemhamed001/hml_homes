<?php


use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\ClientSide\HomeController::class, 'index'])->name('home');
Route::get('/exclusiveProperties', [\App\Http\Controllers\ClientSide\HomeController::class, 'exclusiveProperties'])->name('clientSide.exclusiveProperties.index');
Route::get('/projects/{id}', [\App\Http\Controllers\ClientSide\HomeController::class, 'projectsItem'])->name('clientSide.projects.show');
