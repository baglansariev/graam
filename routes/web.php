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

Route::get('/', 'Pages\HomeController@index');

Auth::routes();


Route::get('/api-test', 'Helpers\CurrencyController@apiTest');
Route::middleware('auth')->group(function() {
    Route::get('/personal', 'User\DealController@index')->name('personal');
    Route::get('/personal/discount', 'User\UserController@discount')->name('personal-discount');
    Route::get('/personal/archive', 'User\UserController@archive')->name('personal-archive');
    Route::get('/personal/docs', 'User\DocumentsController@index')->name('personal-docs');
    Route::get('/personal/info', 'User\UserController@info')->name('personal-info');

    Route::get('/personal/test', 'User\UserController@test')->name('personal-test');
    Route::get('/user-transactions', 'User\DealController@getUserTransactions');
});


Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function () {
       Route::get('/deals', 'Admin\HomeController@index')->name('all-deals');
        Route::get('/transactions', 'Admin\HomeController@getAllTransactions');


        Route::prefix('user')->group(function () {

            Route::get('/', 'User\UserController@index');

            Route::resource('documents', 'User\DocumentsController')->name('*', 'documents');
            Route::resource('details', 'User\DetailsController');
            Route::resource('deals', 'User\DealController');
            Route::put('update/{id}', 'User\UserController@update')->name('user.update');
        });
    });
});

Route::prefix('ajax')->group(function () {
    Route::get('offers/product/{name}/{type}/{weight}/{sell_type}', 'Ajax\OffersController@getOffers');
    Route::get('get-gold-rate', 'Ajax\MetalRateController@getGoldRate');
});
Route::prefix('form/send')->group(function () {
    Route::get('/sell-app', 'Modules\FeedbackFormController@sendSellApp')->name('sell-app');
    Route::get('/own-price', 'Modules\FeedbackFormController@sendOwnPrice')->name('own-price');
});
