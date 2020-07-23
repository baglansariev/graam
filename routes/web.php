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


Route::get('/test', 'Helpers\ApiTesterController@index');
Route::get('/test', 'Helpers\ApiTesterController@index');

Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('home');

        Route::prefix('user')->group(function () {
            Route::resource('documents', 'User\DocumentsController');
            Route::resource('details', 'User\DetailsController');
            Route::resource('deals', 'User\DealController');
        });
    });
});

Route::prefix('ajax')->group(function () {
    Route::get('offers/product/{name}/{type}/{weight}', 'Ajax\OffersController@getOffers');
});
Route::prefix('form/send')->group(function () {
    Route::get('/sell-app', 'Modules\FeedbackFormController@sendSellApp')->name('sell-app');
    Route::get('/own-price', 'Modules\FeedbackFormController@sendOwnPrice')->name('own-price');
});