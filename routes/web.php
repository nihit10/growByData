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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductsController@index')->name('product.index');
Route::get('/product/create', 'ProductsController@create')->name('product.create');
Route::post('/product', 'ProductsController@store')->name('product.store');
Route::post('/product', 'ProductsController@store')->name('product.store');
Route::get('/product/{product}/edit', 'ProductsController@edit')->name('product.edit');
Route::put('/product/{product}/update', 'ProductsController@update')->name('product.update');
Route::delete('/product/{product}', 'ProductsController@destroy')->name('product.destroy');

