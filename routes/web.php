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

Route::get('/clients', 'ClientController@index')->name('clients.index');
Route::post('/orders', 'OrderController@sendOrder')->name('orders.sendOrder');
Route::get('/vendors', 'VendorController@index')->name('vendors.index');
Route::get('/vendors/{id}', 'VendorController@show')->name('vendors.show');
