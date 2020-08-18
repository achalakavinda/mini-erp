<?php

namespace App\Http\Controllers\Ims;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Invoice;
use App\Models\Ims\InvoiceItem;
use App\Models\Ims\SalesOrder;
use App\Models\Ims\SalesOrderItem;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public $Company_Division_id = 1;

    public $CompanyDivision;

    public function __construct()
    {
        $this->CompanyDivision = CompanyDivision::get()->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = SalesOrder::all();
        return view('admin.ims.sales-order.index',compact(['Items']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.sales-order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit' => 'required',
        ]);

        $DiscountPercentage = $request->discount_percentage;
        $Amount = 0;
        $TotalAmount = 0;
        $date = $request->date? $request->date : Carbon::now();
        
        $SalesOrder = SalesOrder::create([
            'customer_id'=>$request->customer_id,
            'date'=>$date,
            'company_division_id'=>$this->CompanyDivision->id,
            'code'=>'SO',
            'remarks'=>$request->remarks
        ]);

        try {

            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model){

                    SalesOrderItem::create([
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$Model->id,
                        'sales_order_id'=>$SalesOrder->id,
                        'company_division_id'=>$this->CompanyDivision->id,

                        'item_code'=>$Model->name,
                        'unit_price'=>$item['unit'],
                        'qty'=>$item['qty'],
                        'total'=>$item['unit']*$item['qty']
                    ]);

                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit']) ;
                }
            }

            if($DiscountPercentage>0){
                $Amount = $TotalAmount - ($TotalAmount*($DiscountPercentage/100));
            }else{
                $Amount = $TotalAmount;
                $DiscountPercentage = 0;
            }

            $SalesOrder->code = "SO-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$SalesOrder->id;
            $SalesOrder->amount = $TotalAmount;
            $SalesOrder->discount = $DiscountPercentage;
            $SalesOrder->total = $Amount;
            $SalesOrder->save();


        }catch (\Exception $exception){

            $SalesOrder->delete();
            dd($exception->getMessage());
        }

        return redirect(url('ims/sales-order/'.$SalesOrder->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SalesOrder = SalesOrder::findOrFail($id);
        return view('admin.ims.sales-order.show',compact('SalesOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit' => 'required',
        ]);

        $SalesOrder = SalesOrder::findOrFail($id);

        if($SalesOrder->posted_to_invoice){
            return '<a href="'.url('/ims/sales-order/'.$SalesOrder->id).'"/> you already have created an Invoice</a>';
        }

        $DiscountPercentage = $request->discount_percentage;
        $Amount = 0;
        $TotalAmount = 0;
        $date = $request->date? $request->date : Carbon::now();

        try {
            
            $SalesOrder->items()->delete();
            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model){

                    SalesOrderItem::create([
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$Model->id,
                        'sales_order_id'=>$SalesOrder->id,
                        'company_division_id'=>$this->CompanyDivision->id,

                        'item_code'=>$Model->name,
                        'unit_price'=>$item['unit'],
                        'qty'=>$item['qty'],
                        'total'=>$item['unit']*$item['qty']
                    ]);

                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit']) ;
                }
            }

            if($DiscountPercentage>0){
                $Amount = $TotalAmount - ($TotalAmount*($DiscountPercentage/100));
            }else{
                $Amount = $TotalAmount;
                $DiscountPercentage = 0;
            }

            $SalesOrder->customer_id = $request->customer_id;
            $SalesOrder->date = $date;
            $SalesOrder->company_division_id = $this->CompanyDivision->id;
            $SalesOrder->remarks = $request->remarks;
            $SalesOrder->code = "SO-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$SalesOrder->id;
            $SalesOrder->amount = $TotalAmount;
            $SalesOrder->discount = $DiscountPercentage;
            $SalesOrder->total = $Amount;
            $SalesOrder->save();


        }catch (\Exception $exception){

            $SalesOrder->delete();
            dd($exception->getMessage());
        }

        return redirect(url('ims/sales-order/'.$SalesOrder->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postToInvoice(Request $request){
        
        $SalesOrder = SalesOrder::findOrFail($request->sales_order_id);
        
        $Invoice = Invoice::create([
            'company_division_id'=>$SalesOrder->company_division_id,
            'code'=>'Inv',
            'customer_id'=>$SalesOrder->customer_id,
            'remarks'=>$SalesOrder->remarks,
            'amount'=>$SalesOrder->amount,
            'discount'=>$SalesOrder->discount,
            'total'=>$SalesOrder->total,
        ]);

        try{

            $Stock = Stock::create([
                'code'=>'Batch',
                'company_division_id'=>$this->CompanyDivision->id,
                'company_id'=>1,
                'invoice_id'=>$Invoice->id
            ]);


            $Stock->code = "Batch-".Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day."-000".$Stock->id;
            $Stock->save();

            $Invoice->code = "Inv-".Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day."-000".$Invoice->id;
            $Invoice->save();

            foreach ($SalesOrder->items as $item)
            {

                $Model = ItemCode::find($item->item_code_id);

                    $Stock_Item = StockItem::create([
                        'stock_id'=>$Stock->id,
                        'invoice_item_id'=>$Invoice->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->unit_price,
                        'created_qty'=>0,
                        'tol_qty'=>-$item->qty,
                        'total'=>-$item->unit_price * $item->qty,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'company_id'=>1,
                    ]);

                    InvoiceItem::create([
                        'invoice_id'=>$Invoice->id,
                        'item_code_id'=>$Model->id,
                        'stock_item_id'=>$Stock_Item->id,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->unit_price,
                        'qty'=>$item->qty,
                        'total'=>$item->qty * $item->unit_price,
                        'company_division_id'=>$this->Company_Division_id
                    ]);

            }

            $Stock->total = -$SalesOrder->total;
            $Stock->save();

            $SalesOrder->posted_to_invoice = true;
            $SalesOrder->save();

        } catch (\Exception $exception){
            $Invoice->delete();
            dd($exception->getMessage());
            return redirect(url('ims/invoice/create'))->with(['error'=>$exception->getMessage()]);
        }

        return redirect(url('ims/invoice/'.$Invoice->id));
    }

}