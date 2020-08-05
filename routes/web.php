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

    Route::get('/dashboard','DashboardController@index');

    Route::get('/staff/profile/{id}','StaffController@profile');


    Route::get('/staff/work-sheet', 'PageController@workSheet');
    Route::post('/staff/work-sheet/store', 'PageController@workSheetStore');

    Route::post('work-sheet/delete','WorkSheetController@delete');
    Route::resource('work-sheet', 'WorkSheetController');

    Route::resource('holidays', 'HolidayController');

    Route::post('send-missing-attendance-email','AttendanceController@sendEmailIndex');
    Route::post('send-email-to-missing-attendance','AttendanceController@sendEmailToMissingAttendance');

    Route::resource('attendance', 'AttendanceController');

    Route::resource('customer', 'CustomerController');
    Route::resource('supplier','SupplierController');
    Route::resource('general-ledger','GeneralLedgerController');

    Route::patch('staff/reset-password/{id}', 'StaffController@resetPassword');
    Route::resource('staff', 'StaffController');

    Route::resource('job-type', 'JobTypeController');

    Route::resource('designation','DesignationController');

    Route::resource('project','ProjectController');

     Route::prefix('project')->group(function () {
            Route::get('/{id}/actual-cost','ProjectController@actualCost');
            Route::get('/{id}/budget-cost','ProjectController@budgetCost');
            Route::get('/{id}/staff','ProjectController@staffAllocation');
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
            Route::patch('/{id}/staff/update','ProjectController@staffAllocationUpdate');
     });

    Route::prefix('spread-sheet')->group(function () {
        Route::get('/','SpreadSheet\SpreadSheetController@index');
        Route::get('/view-staff-spread-sheet-import','SpreadSheet\SpreadSheetController@ViewStaffSpreadSheetImport');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/','Reports\ReportController@index');
        Route::get('/view-work-sheet-report','Reports\ReportController@ViewWorkSheetReport');
        Route::get('/view-employee-wise-work-sheet-report','Reports\ReportController@ViewEmployeeWiseWorkSheetReport');
        Route::get('/view-customer-wise-work-sheet-report','Reports\ReportController@ViewCustomerWiseWorkSheetReport');
        Route::get('/view-job-type-wise-work-sheet-report','Reports\ReportController@ViewJobTypeWiseWorkSheetReport');
    });


    Route::prefix('ims')->group(function () {
        Route::get('/','Ims\ImsController@index');
        Route::get('/invoice/{id}/print','Ims\InvoiceController@print');
        Route::resource('/brand','Ims\BrandController');
        Route::resource('/item','Ims\ItemController');
        Route::resource('/invoice','Ims\InvoiceController');
        Route::resource('/quotation','Ims\QuotationController');
        Route::resource('/stock','Ims\StockController');
    });

    Route::group(['middleware' => ['permission:Settings']], function () {
        Route::get('settings','SettingController@index');
        Route::prefix('settings')->group(function () {
            Route::get('/','SettingController@index');
            Route::Resource('/access-control/permissions','PermissionsController');
            Route::Resource('/access-control/roles','RolesController');
            Route::Resource('/access-control/user-management','UserManagementController');
        });
    });

});
