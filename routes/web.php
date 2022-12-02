<?php

use App\Http\Controllers\Admin\CalendarJasmaniController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\ExerciseSessionController;
use App\Http\Controllers\Admin\GroupTrainingController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RunningProgramController;
use App\Http\Controllers\Admin\SportGradeController;
use App\Http\Controllers\Admin\SprintGradeController;
use App\Http\Controllers\Admin\SprintMenController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Models\ExerciseSession;
use App\Models\GroupTraining;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

//showImage
Route::get('image/{filename}', [ImageController::class, 'showImage'])->where('filename', '.*')->name('showimage');

Route::middleware(['auth'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/user', UserController::class);
    Route::resource('/program', ProgramController::class);
    Route::resource('/exercise', ExerciseController::class);
    Route::resource('/exercise-session', ExerciseSessionController::class);
    Route::resource('/training', TrainingController::class);
    Route::resource('/group-training', GroupTrainingController::class);
    Route::resource('/running-program', RunningProgramController::class);
    Route::resource('/curriculum', CurriculumController::class);
    Route::resource('/calendar', CalendarJasmaniController::class);
    Route::group(['prefix' => 'grade'], function () {
        Route::resource('/sports', SportGradeController::class);
    });
    Route::post('/calendar-crud-ajax', [CalendarJasmaniController::class, 'calendarEvents']);
});
