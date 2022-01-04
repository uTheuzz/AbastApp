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

Route::get('/dashboard', 'App\Http\Controllers\AbastecimentoController@index')->middleware(['auth'])->name('dashboard');
Route::post('/abastecimento/new', 'App\Http\Controllers\AbastecimentoController@store');
Route::get('/abastecimento/{id}/edit', 'App\Http\Controllers\AbastecimentoController@edit');
Route::put('/abastecimento/{id}', 'App\Http\Controllers\AbastecimentoController@update');
Route::delete('/abastecimento/{id}', 'App\Http\Controllers\AbastecimentoController@destroy');

// User routes
Route::get('/usuarios', 'App\Http\Controllers\UserController@index')->name('usuarios');
Route::get('/usuarios/new', 'App\Http\Controllers\UserController@create');
Route::post('/usuarios/new', 'App\Http\Controllers\UserController@store');
Route::get('/usuarios/{id}/edit', 'App\Http\Controllers\UserController@edit');
Route::put('/usuarios/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/usuarios/{id}', 'App\Http\Controllers\UserController@destroy');

Route::get('/relatorio', 'App\Http\Controllers\RelatorioController@index')->name('relatorio');

// Vehicles routes
Route::get('/veiculos', 'App\Http\Controllers\VehiclesController@index')->name('veiculos');
Route::get('/veiculos/new', 'App\Http\Controllers\VehiclesController@create');
Route::post('/veiculos/new', 'App\Http\Controllers\VehiclesController@store');
Route::get('/veiculos/{id}/edit', 'App\Http\Controllers\VehiclesController@edit');
Route::put('/veiculos/{id}', 'App\Http\Controllers\VehiclesController@update');
Route::delete('/veiculos/{id}', 'App\Http\Controllers\VehiclesController@destroy');


require __DIR__.'/auth.php';

