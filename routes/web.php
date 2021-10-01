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
Route::get('email',function(){
    $payment = \App\Payment::find(1);
    $payment->notify(new \App\Notifications\AddressNotification);
    return 'done';
});
Route::get('/home', 'HomeController@dashboard')->name('home');
Route::post('ajax/get-account','AjaxController@getAccount')->name('getAccountName');
Route::post('generate/address','PaymentController@generateAddress')->name('generateAddress');
Route::post('deposit/confirmation','PaymentController@depositConfirmation')->name('depositConfirmation');

Route::get('currencies', 'CurrencyController@index')->name('currency.list');
Route::post('currencies/store', 'CurrencyController@store')->name('currency.store');
Route::get('currencies/edit/{currency}', 'CurrencyController@edit')->name('currency.edit');
Route::post('currencies/update/{currency}', 'CurrencyController@update')->name('currency.update');
Route::post('currencies/destroy/{currency}', 'CurrencyController@destroy')->name('currency.destroy');
Route::post('currencies/rates/store/', 'CurrencyController@storeRates')->name('currency.store.rates');
Route::get('currencies/rates', 'CurrencyController@rates')->name('currency.rates');

Route::get('transactions', 'PaymentController@transactions')->name('payment.transactions');
