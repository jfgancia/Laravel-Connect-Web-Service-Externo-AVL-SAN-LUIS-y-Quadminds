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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// Vehículos
Route::post('/vehiculos', 'VehiculosController@store')->middleware('auth');
Route::get('/vehiculos/create', 'VehiculosController@create')->middleware('auth');
Route::get('/vehiculos/{vehiculo}/edit', 'VehiculosController@edit')->middleware('auth');
Route::put('/vehiculos/{vehiculo}', 'VehiculosController@update')->middleware('auth');
Route::delete('/vehiculos/{vehiculo}', 'VehiculosController@destroy')->middleware('auth');



Route::get('/foo', function()
{
    $exitCode = Artisan::call('sync:vehiculos');
})->middleware('auth');