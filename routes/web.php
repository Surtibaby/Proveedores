<?php

use App\Http\Controllers\HomeControllers;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeControllers::class, 'index'])->name('dashboard');
    Route::resource('datos-basicos', 'App\Http\Controllers\DatosBasicosControllers');
    Route::resource('cuentas-bancarias', 'App\Http\Controllers\CuentasControllers');
    Route::resource('validador-registro', 'App\Http\Controllers\ValidadorRegistroControllers');
    Route::resource('negociacion', 'App\Http\Controllers\NegociacionControllers');
});
