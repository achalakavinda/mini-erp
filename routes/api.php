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

//to get project details without customer array
Route::get('project/{id}/job-types','ApiController@GetProjectJobTypeById');

///to get project all details
Route::get('project/{id}/user/{user_id}/date/{date}','ApiController@GetProjectDetailsByID');

//to get designation details [ use in budgeting]
Route::get('designation/{id}','ApiController@GetDesignation');
Route::get('staff/designation/{id}','ApiController@getStaffByDesignation');