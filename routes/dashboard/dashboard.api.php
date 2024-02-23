<?php


use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {


    Route::resource('services', \App\Http\Controllers\Dashboard\Api\Service\ServiceController::class, ['except' => 'edit', 'create', 'update']);
    Route::post('/services/{id}', [\App\Http\Controllers\Dashboard\Api\Service\ServiceController::class, 'update']);

    Route::resource('projects', \App\Http\Controllers\Dashboard\Api\Project\ProjectController::class, ['except' => 'edit', 'create', 'update']);
    Route::post('/projects/{id}', [\App\Http\Controllers\Dashboard\Api\Project\ProjectController::class, 'update']);
    Route::get('/projects/{id}/customers',[\App\Http\Controllers\Dashboard\Api\Project\ProjectController::class,'customers'])->name('dashboard.web.Projects.customers');

    Route::resource('cover-images', \App\Http\Controllers\Dashboard\Api\CoverImage\CoverImageController::class, ['except' => 'edit', 'create', 'update']);
    Route::post('/cover-images/{id}', [\App\Http\Controllers\Dashboard\Api\CoverImage\CoverImageController::class, 'update']);

    Route::get('/settings', [\App\Http\Controllers\Dashboard\Api\Settings\SettingsController::class, 'index']);
    Route::post('/settings', [\App\Http\Controllers\Dashboard\Api\Settings\SettingsController::class, 'store']);

    Route::resource('feedbacks', \App\Http\Controllers\Dashboard\Api\Feedback\FeedbackController::class, ['except' => 'edit', 'create', 'update']);
    Route::post('/feedbacks/{id}', [\App\Http\Controllers\Dashboard\Api\Feedback\FeedbackController::class, 'update']);


    Route::resource('partners', \App\Http\Controllers\Dashboard\Api\Partner\PartnerController::class, ['except' => 'edit', 'create', 'update']);
    Route::post('/partners/{id}', [\App\Http\Controllers\Dashboard\Api\Partner\PartnerController::class, 'update']);

    Route::resource('contacts', \App\Http\Controllers\Dashboard\Api\Contact\ContactController::class, ['only' => ['index', 'destroy']]);

    Route::get('/overview', [\App\Http\Controllers\Dashboard\Api\DashboardController::class, 'overview']);
});
