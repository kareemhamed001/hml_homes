<?php


use Illuminate\Support\Facades\Route;

Route::get('/cover-images', [\App\Http\Controllers\ClientSide\Api\CoverImage\CoverImageController::class, 'index']);
Route::get('/services', [\App\Http\Controllers\ClientSide\Api\Service\ServiceController::class, 'index']);
Route::get('/settings', [\App\Http\Controllers\ClientSide\Api\Settings\SettingsController::class, 'index']);
Route::get('/feedbacks', [\App\Http\Controllers\ClientSide\Api\Feedback\FeedbackController::class, 'index']);
Route::get('/projects', [\App\Http\Controllers\ClientSide\Api\Project\ProjectController::class, 'index']);
Route::post('/projects/register/{id}', [\App\Http\Controllers\ClientSide\Api\Project\ProjectController::class, 'register']);
Route::get('/partners', [\App\Http\Controllers\ClientSide\Api\Partner\PartnerController::class, 'index']);
Route::post('/contact', [\App\Http\Controllers\ClientSide\Api\Contact\ContactController::class, 'store']);


