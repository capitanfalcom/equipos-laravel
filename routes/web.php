<?php

use App\Http\Controllers\EquipoController;
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

/* Route::get('/equipos', function () {
    return view('equipos.index');
}); */

Route::group(['prefix'=>'equipos'], function () {
    Route::get('', [EquipoController::class, 'index']);
    Route::post('guardar', [EquipoController::class, 'store'])->name('guardarEquipo');
    Route::post('borrar', [EquipoController::class, 'destroy'])->name('borrarEquipo');
    Route::post('actualizar', [EquipoController::class, 'update'])->name('updateEquipo');


});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
