<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get("survey", [\App\Http\Controllers\SurveyController::class, "index"])
        ->name("survey.index");

    Route::get("survey/create", [\App\Http\Controllers\SurveyController::class, "create"])
        ->name("survey.create");

    Route::post("survey/store", [\App\Http\Controllers\SurveyController::class, "store"])
        ->name("survey.store");

    Route::get("survey/{survey}/edit", [\App\Http\Controllers\SurveyController::class, "edit"])
        ->name("survey.edit");

    Route::patch("survey/{survey}", [\App\Http\Controllers\SurveyController::class, "update"])
        ->name("survey.update");

    Route::get("survey/{survey}/delete", [\App\Http\Controllers\SurveyController::class, "delete"])
        ->name("survey.delete");

    Route::get("survey-attempt/create", [\App\Http\Controllers\SurveyAttemptController::class, "create"])
        ->name("survey-attempt.create");
});
