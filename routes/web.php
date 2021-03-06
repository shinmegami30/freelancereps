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

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::post('/dashboard', 'HomeController@send_admin')->name('dashboard.send_admin')->middleware('auth');

Route::get('members/import', ['as' => 'members.import', 'uses' => 'MembersController@import'])->middleware('auth');
Route::get('members/export', ['as' => 'members.export', 'uses' => 'MembersController@export'])->middleware('auth');
Route::post('members/run_import', 'MembersController@run_import')->name('members.run_import')->middleware('auth');
Route::get('members/mass_remove', 'MembersController@mass_remove')->name('members.mass_remove')->middleware('auth');
Route::get('members/search', 'MembersController@search')->name('members.search')->middleware('auth');

Route::get('user/mass_remove', 'UserController@mass_remove')->name('user.mass_remove')->middleware('auth');
Route::get('user/search', 'UserController@search')->name('user.search')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('members', 'MembersController');
	
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

