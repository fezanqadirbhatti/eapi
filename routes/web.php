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
Auth::routes();
Route::get('admin/{page?}', 'AdminController@index')->name('{page?}');
Route::get('/{page?}/{data?}', 'PageController@index');

Route::Resource('/products', 'ProductController');
Route::Resource('/products/{product}/review','ReviewController');