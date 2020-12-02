<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

//to get project details without customer array
Route::get('project/{id}/job-types','ApiController@GetProjectJobTypeById');

Route::get('work-code/{id}','ApiController@GetWorkCodeById');

///to get project all details
Route::get('project/{id}/user/{user_id}/date/{date}','ApiController@GetProjectDetailsByID');

//to get designation details [ use in budgeting]
Route::get('designation/{id}','ApiController@GetDesignation');
Route::get('staff/designation/{id}','ApiController@getStaffByDesignation');

Route::get('/item-code-for-invoices/{id}',function ($id){
    $Model = \Illuminate\Support\Facades\DB::table('stock_items')
        ->select(DB::raw('sum(tol_qty) as qty'))
        ->where('item_code_id','=',$id)
        ->get();
    $ITEM_QTY = 0;
    foreach ($Model as $item){
        $ITEM_QTY = $ITEM_QTY+$item->qty;
    }
    $Model = \App\Models\Ims\ItemCode::find($id);
    return ['item'=>$Model,'qty'=>$ITEM_QTY];
});

/***
 * END POINT GET STOCK ITEM QUANTITY
 *
 * Usage
 *  1. Company Purchase Requisition Create
 *  2. Company Purchase Requisition Update
 *  3. Company Purchase Order Create
 *  4. Company Purchase Order Update
*/
Route::get('/item-code/{id}/stock',function ($id){
    return DB::select('call getItemStockQtyByItemId(?)',[$id]);
});

//api endpoint for the invoices
Route::get('/invoice-for-payment/{id}',function ($id){

    $PaymentItems = \Illuminate\Support\Facades\DB::table('payment_items')
    ->where('invoice_id','=',$id)
    ->get();

    $DUE_AMOUNT = 0;
    $AMOUNT = 0;

    $Model = \App\Models\Ims\Invoice::find($id);

    if($PaymentItems->count() >0){
        foreach ($PaymentItems as $item){
            $AMOUNT = $AMOUNT + $item->amount;
        }
        $DUE_AMOUNT = $Model->total - $AMOUNT;
    }else{
        $DUE_AMOUNT = $Model->total;
    }


    return ['invoice'=>$Model,'payed_amount'=>$AMOUNT,'due_amount'=>$DUE_AMOUNT];
});

Route::get('/customer-for-invoices/{id}',function ($id){
    return \App\Models\Customer::find($id);
});

Route::get('/supplier-for-invoices/{id}',function ($id){
    return \App\Models\Supplier::find($id);
});
