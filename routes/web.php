<?php

use App\Http\Controllers\Indicated\IndicatedController;
use App\Http\Controllers\Indicated\UserIndicatedController;
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

Route::get('/', [IndicatedController::class, 'index'])->name('index');


Route::prefix('/indicateds')
     ->name('indicateds.')
     ->group(function () {
        
        Route::get('view-create', [IndicatedController::class, 'viewCreate'])->name('view-create');
        Route::post('create', [IndicatedController::class, 'create'])->name('create');

        Route::post('update', [IndicatedController::class, 'update'])->name('update');

        Route::get('destroy/{id}', [IndicatedController::class, 'destroy'])->name('destroy');

        Route::get('list-indicated/{id}', [UserIndicatedController::class, 'index'])->name('list-indicated');
     });


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);