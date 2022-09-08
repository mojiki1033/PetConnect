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

Route::get('/', 'PetController@index');

Route::get('/pets/create', 'PetController@create');

Route::get('/pets/{pet}', 'PetController@show');

Route::post('/pets', 'PetController@store');

Route::get('/pets/{pet}/edit', 'PetController@edit');

Route::put('/pets/{pet}', 'PetController@update');

Route::delete('/pets/{pet}', 'PetController@delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
