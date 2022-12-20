<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\UsuarioController;

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

Route::resource('usuarios', UsuarioController::class);
Route::resource('publicaciones', PublicacionesController::class);


//get usuarios.index as main page
Route::get('/', function () {
    return redirect()->route('usuarios.index');
});

