<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\Invoice;
use App\Models\Ims\InvoiceItem;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Quotation;
use App\Models\Ims\QuotationItem;
use App\Models\Ims\SalesOrder;
use App\Models\Ims\SalesOrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuotationController extends Controller
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
        $Items = Quotation::all();
        return view('admin.ims.quotation.index',compact(['Items']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.quotation.create');
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
        $date = $request->date?$request->date:Carbon::now();


        $Quotation = Quotation::create([
            'company_division_id'=>$this->CompanyDivision->id,
            'customer_id'=>$request->customer_id,
            'created_by'=>\Auth::id(),
            'code'=>'Quo',
            'date'=>$date,
            'remarks'=>$request->remarks
        ]);

        try {

            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model){

                    QuotationItem::create([
                        'quotation_id'=>$Quotation->id,
                        'item_code_id'=>$Model->id,
                        'company_division_id'=>$this->CompanyDivision->id,

                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'quoted_price'=>$item['unit'],
                        'quoted_qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
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

            $Quotation->code = 'Quo-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$Quotation->id;
            $Quotation->amount = $TotalAmount;
            $Quotation->discount = $DiscountPercentage;
            $Quotation->total = $Amount;
            $Quotation->save();


        }catch (\Exception $exception){
            $Quotation->delete();
            dd($exception->getMessage());
        }

        return redirect(url('ims/quotation/'.$Quotation->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Quotation = Quotation::findOrFail($id);
        return view('admin.ims.quotation.show',compact('Quotation'));
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

        $Quotation = Quotation::findOrFail($id);

        if($Quotation->posted_to_sales_order){
            return '<a href="'.url('/ims/quotation/'.$Quotation->id).'"/> you already have created a Sales Order</a>';
        }
        elseif($Quotation->posted_to_invoice){
            return '<a href="'.url('/ims/quotation/'.$Quotation->id).'"/> you already have created an Invoice</a>';
        }

        $DiscountPercentage = $request->discount_percentage;
        $Amount = 0;
        $TotalAmount = 0;
        $date = $request->date?$request->date:Carbon::now();
        
        try {
            $total = 0;
            $Quotation->items()->delete();
            foreach ($request->row as $item) {
                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty'] ){
                    QuotationItem::create([
                        'quotation_id'=>$Quotation->id,
                        'item_code_id'=>$Model->id,
                        'company_division_id'=>$this->CompanyDivision->id,

                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'quoted_price'=>$item['unit'],
                        'quoted_qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
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
            $Quotation->company_division_id = $this->CompanyDivision->id;
            $Quotation->customer_id = $request->customer_id;
            $Quotation->created_by = \Auth::id();
            $Quotation->code = 'Quo-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$Quotation->id;
            $Quotation->date = $date;
            $Quotation->remarks = $request->remarks;
            $Quotation->amount = $TotalAmount;
            $Quotation->discount = $DiscountPercentage;
            $Quotation->total = $Amount;
            $Quotation->save();

        } catch (\Exception $e){

        }

        return redirect('ims/quotation/'.$Quotation->id);
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

    public function postToSalesOrders(Request $request){

        $Quotation = Quotation::findOrFail($request->quotation_id);

        $SalesOrder = SalesOrder::create([
            'quotation_id'=>$Quotation->id,
            'customer_id'=>$Quotation->customer_id,
            'company_division_id'=>$Quotation->company_division_id,
            'code'=>'SO',
            'date'=>$Quotation->date,
            'remarks'=>$Quotation->remarks,
            'amount'=>$Quotation->amount,
            'discount'=>$Quotation->discount,
            'total'=>$Quotation->total,
        ]);

        try {

            foreach ($Quotation->items as $item) {

                $Model = ItemCode::find($item->item_code_id);

                if($Model){

                    SalesOrderItem::create([
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$item->item_code_id,
                        'sales_order_id'=>$SalesOrder->id,
                        'company_division_id'=>$this->CompanyDivision->id,

                        'item_code'=>$Model->name,
                        'unit_price'=>$item->quoted_price,
                        'qty'=>$item->quoted_qty,
                        'total'=>$item->quoted_price * $item->quoted_qty,
                        'remarks'=>$item->remarks,
                    ]);

                }
            }

            $Quotation->posted_to_sales_order = true;
            $Quotation->save();


        }catch (\Exception $exception){
            $SalesOrder->delete();
            dd($exception->getMessage());
        }

        return redirect(url('ims/quotation/'.$Quotation->id));
        
    }
    
    public function postToInvoice(Request $request){
        
        $Quotation = Quotation::findOrFail($request->quotation_id);

        $Invoice = Invoice::create([
            'company_division_id'=>$Quotation->company_division_id,
            'code'=>'Inv',
            'customer_id'=>$Quotation->customer_id,
            'remarks'=>$Quotation->remarks,
            'amount'=>$Quotation->amount,
            'discount'=>$Quotation->discount,
            'total'=>$Quotation->total,
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

            foreach ($Quotation->items as $item)
            {

                $Model = ItemCode::find($item->item_code_id);

                    $Stock_Item = StockItem::create([
                        'stock_id'=>$Stock->id,
                        'invoice_item_id'=>$Invoice->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->quoted_price,
                        'created_qty'=>0,
                        'tol_qty'=>-$item->quoted_qty,
                        'total'=>-$item->quoted_price * $item->quoted_qty,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'company_id'=>1,
                    ]);

                    InvoiceItem::create([
                        'invoice_id'=>$Invoice->id,
                        'item_code_id'=>$Model->id,
                        'stock_item_id'=>$Stock_Item->id,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->quoted_price,
                        'qty'=>$item->quoted_qty,
                        'total'=>$item->quoted_qty * $item->quoted_price,
                        'company_division_id'=>$this->Company_Division_id
                    ]);

            }

            $Stock->total = -$Quotation->total;
            $Stock->save();

            $Quotation->posted_to_invoice = true;
            $Quotation->save();

        } catch (\Exception $exception){
            $Invoice->delete();
            dd($exception->getMessage());
            return redirect(url('ims/invoice/create'))->with(['error'=>$exception->getMessage()]);
        }

        return redirect(url('ims/invoice/'.$Invoice->id));
    }
}