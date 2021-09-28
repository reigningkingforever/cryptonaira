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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('currencies', 'CurrencyController@index')->name('currency.list');
Route::post('currencies/store', 'CurrencyController@store')->name('currency.store');
Route::get('currencies/edit/{currency}', 'CurrencyController@edit')->name('currency.edit');
Route::post('currencies/update/{currency}', 'CurrencyController@update')->name('currency.update');
Route::post('currencies/destroy/{currency}', 'CurrencyController@destroy')->name('currency.destroy');
