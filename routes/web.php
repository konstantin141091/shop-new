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

//pages
Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/contacts', 'IndexController@contacts')->name('contacts');
Route::get('/delivery', 'IndexController@delivery')->name('delivery');
Route::get('/return_policy', 'IndexController@returnPolicy')->name('return_policy');
Route::get('/use_agreement', 'IndexController@useAgreement')->name('use_agreement');

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
    Route::get('/search/value', 'ProductController@search')->name('search');
});
