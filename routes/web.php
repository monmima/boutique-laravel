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

// Route::get('/', function () {
//     return view('index');
// });

// app routes

Route::get('/', "App\Http\Controllers\ProduitController@index");
Route::post('/', "App\Http\Controllers\ProduitController@store");
Route::get('/{entry}/edit', "App\Http\Controllers\ProduitController@edit");
Route::get('/{entry}', "App\Http\Controllers\ProduitController@show");
Route::put('/{entry}', "App\Http\Controllers\ProduitController@update");
Route::delete('/{entry}/delete', "App\Http\Controllers\ProduitController@destroy");

// routes that were there at the beginning

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
