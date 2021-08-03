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


Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

//for categories
Route::group([
    'prefix' => 'category',
    'as' => 'category.'
], function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{category}', 'CategoryController@show')->name('show');
});

//for products
Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/{product}', 'ProductController@show')->name('show');
});
