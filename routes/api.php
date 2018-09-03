<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/btc', 'HomeController@btc');
Route::post('/btc_eth', 'HomeController@btc_eth');
Route::post('/ltc', 'HomeController@ltc');
Route::post('/ltc_eth', 'HomeController@ltc_eth');
Route::post('/eth', 'HomeController@eth');
Route::post('/eth_eth', 'HomeController@eth_eth');
Route::post('/dash', 'HomeController@dash');
Route::post('/dash_eth', 'HomeController@dash_eth');

Route::post('/verify/eth/address', 'ETHController');
Route::post('/verify/referral/address', 'REFController');
Route::post('/subscribe', 'SubscribeController@index');
Route::post('/contactUs', 'SubscribeController@contactUs');

Route::post('savenewsletter', 'SubscribeController@save');
Route::post('savenewsletteremail', 'SubscribeController@saveemail')->name("savenewsletteremail");


Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/image/upload', 'Admin\AvatarController');
    Route::post('/file/upload', 'Admin\PoolAddressFileController@index');

    Route::get('/contract/address/{crypto}', 'Admin\PoolAddressFileController@allocateAddress');

    Route::get('/purchase/config', 'API\RatesController@purchaseConfig');

    Route::get('/kyc/data', 'API\RatesController@kyc');
    Route::post('/kyc/admin', 'API\UserController@uploadKYC');
    Route::post('/transactionHistorybtc', 'API\TransactionHisController@btc_transaction');
    Route::post('/transactionHistoryltc', 'API\TransactionHisController@ltc_transaction');
    Route::post('/transactionHistorydash', 'API\TransactionHisController@dash_transaction');
    Route::post('/transactionHistoryeth', 'API\TransactionHisController@eth_transaction');

    Route::post('/user/update', 'API\UserController@profile');
    Route::post('/user/update/oauth', 'API\UserController@oauth');
    Route::post('/user/update/password', 'API\UserController@password');
});
