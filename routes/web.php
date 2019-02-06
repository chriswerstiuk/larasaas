<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
	// Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::prefix('account')->namespace('Account')->name('account.')->group(function () {
    	// Account
    	Route::get('/', 'AccountController@index')->name('index');

    	// Account Profile
    	Route::get('/profile', 'ProfileController@index')->name('profile.index');
    	Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

    	// Account Password
    	Route::get('/password', 'PasswordController@index')->name('password.index');
    	Route::patch('/password/{user}', 'PasswordController@update')->name('password.update');

    	// Account Deactivate
    	Route::get('/deactivate', 'DeactivateController@index')->name('deactivate.index');
    	Route::patch('/deactivate/{user}', 'DeactivateController@update')->name('deactivate.update');
    });
});
