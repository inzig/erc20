<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "admin" middleware group. Now create something great!
|
*/

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'Admin\AdminController@index')->name('index');
Route::post('/notification/read/{id}', 'Admin\AdminController@readNoty');

Route::post('/pools/{type}', 'Admin\AdminController@pools');
Route::get('/user/pools/{id}', 'Admin\AdminController@poolUpdate');
Route::post('/user/pools/{id}', 'Admin\AdminController@updatedPool');
Route::post('/earning-increments', 'Admin\AdminController@increments');

Route::get('/user/tokens', 'Admin\AdminController@create');
Route::post('/user/tokens', 'Admin\AdminController@tokens');
Route::patch('/user/tokens', 'Admin\AdminController@add');
Route::get('/user/tokens/{id}', 'Admin\AdminController@edit');
Route::post('/user/tokens/{id}', 'Admin\AdminController@update');
Route::post('/user/update/timer', 'Admin\AdminController@updateTimer')->name('update-timer');

Route::post('/bonus/add', 'Admin\AdminController@bonusAdd')->name('bonus.add');
Route::post('/bonus/edit/{bonus}', 'Admin\AdminController@bonusUpdate')->name('bonus.update');
Route::delete('/bonus/edit/{bonus}', 'Admin\AdminController@bonusDelete');


Route::get('/team', 'Admin\MembersController@index')->name('team');
Route::post('/team', 'Admin\MembersController@teamMembers');
Route::get('/team/create', 'Admin\MembersController@create');
Route::patch('/team/add', 'Admin\MembersController@add');
Route::get('/team/edit/{id}', 'Admin\MembersController@edit');
Route::post('/team/edit/{id}', 'Admin\MembersController@update');
Route::delete('/team/{id}', 'Admin\MembersController@destroy');

Route::get('/advisor', 'Admin\AdvisorsController@index')->name('advisor');
Route::post('/advisor', 'Admin\AdvisorsController@teamMembers');
Route::get('/advisor/create', 'Admin\AdvisorsController@create');
Route::patch('/advisor/add', 'Admin\AdvisorsController@add');
Route::get('/advisor/edit/{id}', 'Admin\AdvisorsController@edit');
Route::post('/advisor/edit/{id}', 'Admin\AdvisorsController@update');
Route::delete('/advisor/{id}', 'Admin\AdvisorsController@destroy');




Route::get('/roadmap', 'Admin\RoadmapController@index')->name('roadmap');
Route::post('/roadmap', 'Admin\RoadmapController@roadmaplist');
Route::get('/roadmap/create', 'Admin\RoadmapController@create');
Route::patch('/roadmap/add', 'Admin\RoadmapController@add');
Route::get('/roadmap/edit/{id}', 'Admin\RoadmapController@edit');
Route::post('/roadmap/edit/{id}', 'Admin\RoadmapController@update');
Route::delete('/roadmap/{id}', 'Admin\RoadmapController@destroy');

Route::get('/partner', 'Admin\PartnersController@index')->name('partner');
Route::post('/partner', 'Admin\PartnersController@partnersList');
Route::get('/partner/create', 'Admin\PartnersController@create');
Route::patch('/partner/add', 'Admin\PartnersController@add');
Route::get('/partner/edit/{id}', 'Admin\PartnersController@edit');
Route::post('/partner/edit/{id}', 'Admin\PartnersController@update');
Route::delete('/partner/{id}', 'Admin\PartnersController@destroy');

Route::get('/mediaPartner', 'Admin\MediaPartnersController@index')->name('mediaPartner');
Route::post('/mediaPartner', 'Admin\MediaPartnersController@mediaPartnersList');
Route::get('/mediaPartner/create', 'Admin\MediaPartnersController@create');
Route::patch('/mediaPartner/add', 'Admin\MediaPartnersController@add');
Route::get('/mediaPartner/edit/{id}', 'Admin\MediaPartnersController@edit');
Route::post('/mediaPartner/edit/{id}', 'Admin\MediaPartnersController@update');
Route::delete('/mediaPartner/{id}', 'Admin\MediaPartnersController@destroy');

Route::get('/platform', 'Admin\PlatformController@index')->name('platform');
Route::post('/platform', 'Admin\PlatformController@platformlist');
Route::get('/platform/create', 'Admin\PlatformController@create');
Route::patch('/platform/add', 'Admin\PlatformController@add');
Route::get('/platform/edit/{id}', 'Admin\PlatformController@edit');
Route::post('/platform/edit/{id}', 'Admin\PlatformController@update');


Route::get('/kyc', 'Admin\KycController@index')->name('kyc');
Route::post('/kyc', 'Admin\KycController@kycList');
Route::get('/kyc/create', 'Admin\KycController@create');
Route::patch('/kyc/add', 'Admin\KycController@add');
Route::get('/kyc/edit/{id}', 'Admin\KycController@edit');
Route::post('/kyc/edit/{id}', 'Admin\KycController@update');
Route::delete('/kyc/{id}', 'Admin\KycController@destroy');

// Transaction routes
Route::get('/transactions/{type}', 'Admin\TransactionsController@index')->name('transactions');
Route::post('/transactions/{type}', 'Admin\TransactionsController@getListing');

Route::get('/manual/transactions', 'Admin\TransactionsController@manualIndex')->name('manual');
Route::post('/manual/transactions', 'Admin\TransactionsController@getManualListing');
Route::post('/manual/transactions/{id}', 'Admin\TransactionsController@approveManualListing')->name('manual.update');
// End Transaction routes


// Users routes
Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/{type}/{id}', 'UserController@show')->name('users.show');
Route::post('users', 'UserController@store')->name('users.get');
Route::patch('users/{id}', 'UserController@update')->name('users.update');
Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');

// End Users routes



Route::get('/tokensale', 'Admin\TokenSaleController@index')->name('tokensale');
Route::post('/tokensale', 'Admin\TokenSaleController@tokenSaleList');
Route::get('/tokensale/create', 'Admin\TokenSaleController@create');
Route::patch('/tokensale/add', 'Admin\TokenSaleController@add');
Route::get('/tokensale/edit/{id}', 'Admin\TokenSaleController@edit');
Route::post('/tokensale/update/{id}', 'Admin\TokenSaleController@update');



Route::get('/other', 'Admin\OtherController@index')->name('other');
Route::post('/other', 'Admin\OtherController@otherList');
Route::get('/other/create', 'Admin\OtherController@create');
Route::patch('/other/add', 'Admin\OtherController@add');
Route::get('/other/edit/{id}', 'Admin\OtherController@edit');
Route::post('/other/edit/{id}', 'Admin\OtherController@update');
Route::delete('/other/{id}', 'Admin\OtherController@destroy');

Route::get('/subscribe', 'Admin\SubscribersController@index')->name('subscribe');
Route::post('/subscribe', 'Admin\SubscribersController@subscribersList');
Route::delete('/subscribe/{id}', 'Admin\SubscribersController@destroy');


Route::get('/settings', 'Admin\SettingController@index')->name('setting');
Route::get('setting/{id}', 'Admin\SettingController@show');
Route::post('settings/{type}', 'Admin\SettingController@store');
Route::post('setting/{type}', 'Admin\SettingController@update');

Route::get('/referrals', 'Admin\ReferralController@index')->name('referrals');
Route::post('/referrals', 'Admin\ReferralController@getTransactions');
Route::post('/referral/{reward}', 'Admin\ReferralController@update')->name('referral.update');
