<?php

/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web", "dashboard" and "auth" middleware group. Now create something great!
|
*/

Route::get('/home', 'DashboardController@index')->name('index');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/profile', 'Admin\ProfileController@update')->name('profile.update');

Route::post('/user/update', 'API\UserController@profile');
Route::post('/user/update/password', 'API\UserController@password');

Route::get('/kyc', 'Admin\KycController@kyc')->name('kyc');
Route::get('/settings', 'Admin\PurchasedController@settings')->name('settings');
Route::get('/history', 'Admin\PurchasedController@history')->name('history');
Route::get('/calculator', 'Admin\PurchasedController@calculator')->name('calculator');
Route::get('/contribute', 'Admin\PurchasedController@index')->name('purchased');
Route::get('/referral', 'Admin\PurchasedController@referral')->name('referral');

