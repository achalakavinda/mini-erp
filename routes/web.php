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
	return redirect('/dashboard');
});

Auth::routes();



Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('/customer', 'CustomerController');

    Route::resource('/staff', 'StaffController');

    Route::get('/staff/profile/{id}', 'StaffController@profile');

    Route::resource('work-sheet', 'WorkSheetController');

    Route::resource('job-type', 'JobTypeController');

    Route::resource('designation','DesignationController');

    Route::resource('project','ProjectController');

    Route::get('project/{id}/estimation','ProjectController@estimation');

    Route::post('project/finalized ','ProjectController@finalized');


    Route::get('settings','SettingController@index');

    Route::group(['middleware' => ['role:super-admin']], function () {
        // super-admin is a role in the role table
        // anything can be changed to anything
    });

});