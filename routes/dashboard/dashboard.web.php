<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return redirect()->route('dashboard.web.covers.index');
})->name('dashboard.web.index');
Route::get('/cover-page',[\App\Http\Controllers\Dashboard\Web\Cover\CoverController::class,'index'])->name('dashboard.web.covers.index');
//Route::get('/services',[\App\Http\Controllers\Dashboard\Web\Service\ServiceController::class,'index'])->name('dashboard.web.services.index');
Route::get('/projects/create',[\App\Http\Controllers\Dashboard\Web\Project\ProjectController::class,'create'])->name('dashboard.web.Projects.create');
Route::get('/projects/{id}/edit',[\App\Http\Controllers\Dashboard\Web\Project\ProjectController::class,'edit'])->name('dashboard.web.Projects.edit');
Route::get('/projects/{id}/customers',[\App\Http\Controllers\Dashboard\Web\Project\ProjectController::class,'customers'])->name('dashboard.web.Projects.customers');

Route::get('/off-plans',[\App\Http\Controllers\Dashboard\Web\OffPlan\OffPlanController::class,'index'])->name('dashboard.web.off-plans.index');
Route::get('/exclusive-properties',[\App\Http\Controllers\Dashboard\Web\ExclusiveProperty\ExclusivePropertyController::class,'index'])->name('dashboard.web.exclusive-properties.index');
Route::get('/feedbacks',[\App\Http\Controllers\Dashboard\Web\Feedback\FeedbackController::class,'index'])->name('dashboard.web.feedbacks.index');
Route::get('/about-us',[\App\Http\Controllers\Dashboard\Web\About\FeedbackController::class,'index'])->name('dashboard.web.about-us.index');
Route::get('/partners',[\App\Http\Controllers\Dashboard\Web\Partner\PartnerController::class,'index'])->name('dashboard.web.partners.index');
Route::get('/contact-us',[\App\Http\Controllers\Dashboard\Web\Contact\ContactController::class,'index'])->name('dashboard.web.contact-us.index');
