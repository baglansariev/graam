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

Route::prefix('admin')->group(function () {
    Route::get('/home', 'Admin\HomeController@index')->name('home');

    Route::prefix('user')->group(function () {
        Route::resource('documents', 'User\DocumentsController');
        Route::resource('details', 'User\DetailsController');
    });
});