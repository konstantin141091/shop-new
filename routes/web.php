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


Auth::routes(['verify' => true]);

//pages
Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/contacts', 'IndexController@contacts')->name('contacts');
Route::get('/delivery', 'IndexController@delivery')->name('delivery');
Route::get('/return_policy', 'IndexController@returnPolicy')->name('return_policy');
Route::get('/use_agreement', 'IndexController@useAgreement')->name('use_agreement');
Route::get('/cart', 'IndexController@cart')->name('cart');

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

//for order
Route::group([
    'prefix' => 'order',
    'as' => 'order.'
], function () {
    Route::get('/create', 'OrderController@create')->name('create');
    Route::post('/store', 'OrderController@store')->name('store');
});

// for account
Route::group([
    'prefix' => 'account',
    'as' => 'account.',
    'middleware' => 'auth'
], function() {
    Route::get('/', 'AccountController@index')->name('index');
    Route::post('/update', 'AccountController@update')->name('update');

    Route::get('/orders', 'AccountController@orders')->name('orders');
    Route::get('/orders/{order}', 'AccountController@orderShow')->name('order.show');
});
