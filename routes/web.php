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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    /**
     * Service routes
     */
    Route::resource('service','ServiceController');
    Route::get('get-services','ServiceController@getServices')->name('get-services');
    Route::get('service/delete/{service}','ServiceController@destroy');
    Route::get('update-service/{service}','ServiceController@edit');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('get-users', 'UsersController@getUsers')->name('get-users');
    Route::get('create-user','UsersController@create');
    Route::get('/update-user/{user}','UsersController@edit');
    Route::post('/employee-update/{agent}','UsersController@update');

    Route::get('/area-user/delete/{user}', 'LocationController@destroyAreaAgent');

    Route::get('/user/delete/{user}', 'UsersController@destroy');
    Route::get('account-activation/{user}', 'UsersController@verifyEmail');
    Route::get('user-profile','UsersController@getUserProfile');
    Route::get('employee-profile','UsersController@getUserProfile');
    Route::post('profile-update/{user}','UsersController@updateProfile');
});

