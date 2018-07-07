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

Route::get('/', 'HomeController@home')->name('home');
Route::get('testing-section', 'TestController')->name('testing-section');
Route::get('user/login/{token}', 'Auth\LoginController@activateUser')->name('user.login');
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('/users/fallback', function () {
    if (!session()->has('status') && !session()->has('error'))
        return redirect()->route('home');

    return view('auth.fallback');
})->name('auth.fallback');

Route::get('/faqs', function () {
    return view('pages.faqs');
})->name('faqs');

Route::get('/privacy-policy', function () {
    return view('pages.policies');
})->name('privacy-policy');

Route::get('/terms-and-conditions', function () {
    return view('pages.terms');
})->name('terms-and-conditions');

Route::get('/test', 'TestController');
