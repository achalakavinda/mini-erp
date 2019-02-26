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

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/staff/profile/{id}', function ($id){
            $User = \App\Models\User::findOrFail($id);
            return view('admin.staff.profile.profile',compact('User'));
        });

    Route::get('/staff/work-sheet', 'PageController@workSheet');

    Route::post('/staff/work-sheet/store', 'PageController@workSheetStore');

    Route::post('work-sheet/delete','WorkSheetController@delete');
    Route::resource('work-sheet', 'WorkSheetController');

    Route::resource('holidays', 'HolidayController');

    Route::resource('attendance', 'AttendanceController');

    Route::resource('customer', 'CustomerController');

    Route::resource('staff', 'StaffController');

    Route::resource('job-type', 'JobTypeController');

    Route::resource('designation','DesignationController');

    Route::resource('project','ProjectController');

     Route::prefix('project')->group(function () {
            Route::get('/{id}/actual-cost','ProjectController@actualCost');
            Route::get('/{id}/budget-cost','ProjectController@budgetCost');
            Route::get('/{id}/estimation/edit/staff-allocation-estimation','ProjectController@editStaffAllocationEstimation');
            Route::get('/{id}/estimation/edit/cost-type','ProjectController@editCostType');
            Route::get('/{id}/settings','ProjectController@settings');
            Route::post('/status','ProjectController@projectStatusStore');
            Route::post('/variable-update','ProjectController@projectVariableUpdate');
            Route::post('/budget-cost','ProjectController@budgetCostStore');
            Route::post('/actual-cost','ProjectController@actualCostStore');
            Route::post('/edit-budget-designation-cost','ProjectController@editBudgetDesignationCost');
            Route::post('/store-new-budget-designation-cost','ProjectController@StoreNewBudgetDesignationCost');
            Route::post('/edit-budget-cost-type','ProjectController@editBudgetCostType');
            Route::post('/store-new-budget-cost-type','ProjectController@StoreNewBudgetCostType');
            Route::post('/edit-actual-cost-type','ProjectController@editActualCostType');
            Route::post('/store-new-actual-cost-type','ProjectController@StoreNewActualCostType');
     });

    Route::group(['middleware' => ['permission:Settings']], function () {
        Route::get('settings','SettingController@index');
        Route::prefix('settings')->group(function () {
            Route::get('/','SettingController@index');
            Route::get('/access-control/permissions','PermissionsController@index');
            Route::Resource('/access-control/roles','RolesController');
            Route::Resource('/access-control/user-management','UserManagementController');
        });
    });

});
