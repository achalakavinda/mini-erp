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

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GeneralLedgerController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WorkSheetController;

Route::get('/', function () {
	return redirect('/dashboard');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('staff/profile/{id}', [StaffController::class, 'profile']);
    Route::get('staff/work-sheet', [PageController::class, 'workSheet']);
    Route::post('staff/work-sheet/store', [PageController::class, 'workSheetStore']);
    Route::patch('staff/reset-password/{id}', [StaffController::class, 'resetPassword']);
    Route::resource('staff',StaffController::class);

    Route::post('work-sheet/delete',[WorkSheetController::class,'delete']);
    Route::resource('work-sheet',WorkSheetController::class);

    Route::resource('holidays', HolidayController::class);
    Route::post('send-missing-attendance-email',[AttendanceController::class,'sendEmailIndex']);
    Route::post('send-email-to-missing-attendance',[AttendanceController::class,'sendEmailToMissingAttendance']);


    Route::resource('attendance', AttendanceController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('general-ledger', GeneralLedgerController::class);
    Route::resource('job-type', JobTypeController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('project', ProjectController::class);


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


    Route::prefix('ims')->group(function ()
    {
        Route::get('/','Ims\ImsController@index');
        Route::resource('/brand','Ims\BrandController');
        Route::resource('/category','Ims\CategoryController');
        Route::resource('/item','Ims\ItemController');
        Route::resource('/color','Ims\ColorController');
        Route::resource('/size','Ims\SizeController');
        Route::resource('/item-code-batch','Ims\ItemCodeBatchController');

        Route::resource('/purchase-requisition','Ims\PurchaseRequisitionController');
        Route::resource('/company-purchase-order','Ims\CompanyPurchaseOrderController');
        Route::resource('/grn','Ims\GrnController');

        Route::resource('/stock','Ims\StockController');

        Route::resource('/quotation','Ims\QuotationController');
        Route::resource('/sales-order','Ims\SalesOrderController');

        Route::resource('/invoice','Ims\InvoiceController');
        Route::resource('/jnl','Ims\JnlController');

        Route::resource('/customer-return-note','Ims\CustomerReturnNoteController');

        //sub routes
        Route::post('/purchase-requisition/post-to-purchase','Ims\PurchaseRequisitionController@postToPurchase');
        Route::post('/purchase-requisition/post-to-grn','Ims\PurchaseRequisitionController@postToGRN');
        Route::post('/company-purchase-order/post-to-grn','Ims\CompanyPurchaseOrderController@postToGRN');
        Route::post('/grn/post-to-stock','Ims\GrnController@postToStock');
        Route::post('/quotation/post-to-sales-orders','Ims\QuotationController@postToSalesOrders');
        Route::post('/quotation/post-to-invoice','Ims\QuotationController@postToInvoice');
        Route::post('/sales-order/post-to-invoice','Ims\SalesOrderController@postToInvoice');

        Route::post('/invoice/post-to-return','Ims\InvoiceController@postToReturn');

        Route::get('/invoice/{id}/print','Ims\InvoiceController@print');
        Route::get('/jnl/{id}/print','Ims\JnlController@print');

        Route::get('/grn/{id}/print','Ims\GrnController@print');
        Route::get('/sales-order/{id}/print','Ims\SalesOrderController@print');
        Route::get('/quotation/{id}/print','Ims\QuotationController@print');
        Route::get('/purchase-requisition/{id}/print','Ims\PurchaseRequisitionController@print');
        Route::get('/company-purchase-order/{id}/print','Ims\CompanyPurchaseOrderController@print');
    });

    Route::prefix('accounting')->group(function (){
        Route::resource('/','Accounting\AccountingController');
        Route::resource('/payment','Accounting\PaymentController');
        Route::resource('/account-type','Accounting\AccountTypeController');
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

Route::resource('admin/invoice-settings', 'Admin\\InvoiceSettingsController');
