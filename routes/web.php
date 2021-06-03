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

// produitCategories routes

Route::get('/categories', "App\Http\Controllers\ProduitCategorieController@index");

// produit routes

Route::get('/', "App\Http\Controllers\ProduitController@index");
Route::post('/', "App\Http\Controllers\ProduitController@store");
Route::get('/{id}/edit', "App\Http\Controllers\ProduitController@edit");
Route::get('/{id}', "App\Http\Controllers\ProduitController@show");
Route::put('/{id}', "App\Http\Controllers\ProduitController@update");
Route::delete('/{id}/delete', "App\Http\Controllers\ProduitController@destroy");

// routes that were there at the beginning

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
