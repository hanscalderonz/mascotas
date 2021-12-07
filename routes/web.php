<?php

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

Route::resource('usuarios', '\App\Http\Controllers\UsuariosController');
Route::get('/usuarios', '\App\Http\Controllers\UsuariosController@index')->name('usuarios.index');

Route::resource('mascotas', '\App\Http\Controllers\MascotasController');

Route::view('/', 'auth/login')->name('index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');