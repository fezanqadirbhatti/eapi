<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function () {
    return \App\Http\Resources\User::collection(\App\User::all());
});
Route::apiResource('/category', 'CategoryController');
Route::apiResource('/product','ProductController');
Route::prefix('products')->group(function() {
    Route::get('/category/{category}','ProductController@getByCategoryId')->name('product-category');
    Route::apiResource('/{product}/reviews','ReviewController');
});