<?php

use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\VisitController;
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

Route::get('/', function () {
    return redirect()->route('ejecutives.index');
});

// Route::resource('ejecutivos', ExecutiveController::class);
Route::get('/ejecutivos', [ExecutiveController::class, 'index'])->name('ejecutivos.index');
Route::get('/ejecutivos/{id}/edit', [ExecutiveController::class, 'edit'])->name('ejecutivos.edit');
Route::post('/ejecutivos', [ExecutiveController::class, 'store'])->name('ejecutivos.store');
Route::post('/ejecutivos/update/{id}', [ExecutiveController::class, 'update'])->name('ejecutivos.update');

Route::get('/visitas', [VisitController::class, 'index'])->name('visitas.index');
Route::get('/visitas/{id}/edit', [VisitController::class, 'edit'])->name('visitas.edit');
Route::post('/visitas', [VisitController::class, 'store'])->name('visitas.store');
Route::post('/visitas/update/{id}', [VisitController::class, 'update'])->name('visitas.update');

