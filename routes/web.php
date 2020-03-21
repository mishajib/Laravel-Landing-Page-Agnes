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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>'auth', 'namespace'=>'Admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('header', 'HeaderController');
    Route::resource('feature', 'FeaturesController');
    Route::resource('pricing', 'PriceController');
    Route::resource('pricing-feature', 'PriceFeatureController');
});
