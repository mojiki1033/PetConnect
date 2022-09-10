<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

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

Route::controller(PetController::class)->group(function () {
    
    Route::get('/pets', 'index');

    Route::get('/pets/create', 'create');

    Route::post('/pets', 'store');

    Route::get('/pets/{pet}', 'show');

    Route::get('/pets/{pet}/edit', 'edit');

    Route::put('/pets/{pet}', 'update');

    Route::delete('/pets/{pet}', 'delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
