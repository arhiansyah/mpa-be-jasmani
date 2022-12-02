<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('exercise', App\Http\Controllers\API\ExerciseAPIController::class);
Route::resource('training', App\Http\Controllers\API\TrainingAPIController::class);
Route::resource('group-training', App\Http\Controllers\API\GroupTrainingAPIController::class);
Route::resource('exercise-session', App\Http\Controllers\API\ExerciseSessionAPIController::class);
Route::resource('level', App\Http\Controllers\API\LevelAPIController::class);
Route::resource('calendar-jasmani', App\Http\Controllers\API\CalendarJasmaniAPIController::class);
Route::resource('sprint-gender', App\Http\Controllers\API\SprintGradeAPIController::class);
Route::get('calendar-jasmani-title/{title}', [\App\Http\Controllers\API\CalendarJasmaniAPIController::class, 'showTitle']);
Route::get('sprint-grade-result', [\App\Http\Controllers\API\SprintGradeAPIController::class, 'grade']);
Route::get('workout-grade-result', [\App\Http\Controllers\API\WorkoutAPIController::class, 'grade']);
Route::get('swim-grade-result', [\App\Http\Controllers\API\SwimAPIController::class, 'grade']);
