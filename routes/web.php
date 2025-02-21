<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('person')->name('person')->group(function () {
    Route::get('/', [PersonController::class,'index'])->name('.index');
    Route::get('/create', [PersonController::class,'create'])->name('.create');
    Route::post('/', [PersonController::class,'store'])->name('.store');
    Route::get('/{id}/edit', [PersonController::class,'edit'])->name('.edit');
    Route::put('/{id}', [PersonController::class,'update'])->name('.update');
    Route::delete('/{id}', [PersonController::class,'destroy'])->name('.destroy');
    });
