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


use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'InstrumentController@home')->name('home');

Route::get('/catalogue', function () {
    return redirect('/catalogue/1');
});

Route::get('/catalogue/{id}', 'InstrumentController@instruments');

Route::get('/catalogue/{id}/instruments/{index}', 'InstrumentController@instrument_info');

Route::get('/catalogue/{id}/latest/{index}', 'InstrumentController@instrument_info_home');

Route::get('/catalogue/{id}/preview/{index}', 'InstrumentController@instrument_info_preview');

Route::get('/upload', 'UploadController@create');

Route::post('upload', 'UploadController@upload')->name('upload');

Route::get('/shopping_cart', 'CartController@index');

Route::post('/shopping_cart', 'CartController@store');

Route::get('/shopping_cart/increase/{id}', 'CartController@increase');

Route::get('/shopping_cart/decrease/{id}', 'CartController@decrease');

Route::get('/shopping_cart/remove/{id}', 'CartController@remove');

Route::get('/shopping_cart/clear', 'CartController@clear');

Route::get('/shopping_cart/checkout', 'CartController@checkout');

Route::post('/shopping_cart/checkout', 'CartController@validateCheckout');

