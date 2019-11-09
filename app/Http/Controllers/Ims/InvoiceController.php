<?php

namespace App\Http\Controllers\Ims;

use App\Models\CompanyDivision;
use App\Models\Ims\Invoice;
use App\Models\Ims\ItemCode;
use App\Models\Ims\StockItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
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
        $Items = Invoice::all();
        return view('admin.ims.invoice.index',compact(['Items']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.invoice.create');
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
            'order_date' => 'required',
            'company_vat_no' => 'required',
            'dispatched_date' => 'required',
            'delivery_method_id' => 'required',
            'customer_id' => 'required',
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.model_name' => 'required',
            'row.*.qty' => 'required',
        ]);

        $DiscountPercentage = $request->discount_percentage;

        $Invoice = Invoice::create([
            'order_date'=>$request->order_date,
            'purchase_order'=>$request->purchase_order,
            'invoice_no'=>$request->invoice_no,
            'dispatched_date'=>$request->dispatched_date,
            'delivery_method_id'=>$request->delivery_method_id,
            'delivery_address'=>$request->delivery_address,
            'customer_id'=>$request->customer_id,
            'customer_detail'=>$request->customer_detail,
            'special_remarks'=>$request->special_remarks,
            'company_division_id'=>$this->CompanyDivision->id,
        ]);

//        try{
//
//            $Stock = null;
//            $TotalAmount = 0;
//            $TotalSum = 0;
//            $TotalDiscount = $DiscountPercentage;
//
//            foreach ($request->row as $item){
//
//                $Model = ItemCode::find($item['model_id']);
//                $Stock_Item_Same_Unit = StockItem::where(['item_code_id'=>$item['model_id'],'unit_price'=>$item['unit'],'company_division_id'=>$this->CompanyDivision->id])->first();
//                if ($Stock_Item_Same_Unit!=null){
//
//                    $SUM_TOL_QTY = $Stock_Item_Same_Unit->tol_qty;
//                    $SUM_QTY = $Stock_Item_Same_Unit->qty;
//
//                    $Stock_Item_Same_Unit->tol_qty = $SUM_TOL_QTY-$item['qty'];
//                    $Stock_Item_Same_Unit->qty = $SUM_QTY-$item['qty'];
//                    $Stock_Item_Same_Unit->save();
//
//                }else{
//
//                    //if no stock item found need create new stock
//                    if ($Stock == null){
//                        $Stock = Stock::create(['company_division_id'=>1]);
//                    }
//
//                    $Stock_Item_Same_Unit = StockItem::create([
//                        'stock_id'=>$Stock->id,
//                        'brand_id'=>$Model->brand_id,
//                        'item_code_id'=>$Model->id,
//                        'unit_price'=>$item['unit'],
//                        'qty'=>0-$item['qty'],
//                        'open_qty'=>0,
//                        'tol_qty'=>0-$item['qty'],
//                        'company_division_id'=>$this->CompanyDivision->id,
//                    ]);
//
//                }
//
//                InvoiceItem::create([
//                    'invoice_id'=>$Invoice->id,
//                    'brand_id'=>$Stock_Item_Same_Unit->brand_id,
//                    'item_code_id'=>$item['model_id'],
//                    'price'=>$item['unit'],
//                    'qty'=>$item['qty'],
//                    'value'=>$item['qty']*$item['unit'],
//                    'remarks'=>'k',
//                    'company_division_id'=>$this->Company_Division_id
//                ]);
//
//                $TotalAmount = $TotalAmount + ($item['qty']*$item['unit']);
//            }
//
//            if($DiscountPercentage!=null){
//                $TotalSum = $TotalAmount - ($TotalAmount*($DiscountPercentage/100));
//            }else{
//                $TotalSum = $TotalAmount;
//                $DiscountPercentage = 0;
//            }
//
//            $Invoice->amount = $TotalAmount;
//            $Invoice->discount = $DiscountPercentage;
//            $Invoice->total = $TotalSum;
//            $Invoice->save();
//
//        } catch (\Exception $exception){
//
//            $Invoice->delete();
//            return redirect(url('invoice/create'))->with(['error'=>$exception->getMessage()]);
//
//        }

        return redirect(url('invoice').'/'.$Invoice->id.'/print');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Invoice = Invoice::findOrFail($id);
        return view('admin.invoice.show',compact('Invoice'));
    }

    public function print($id)
    {
        $Invoice = Invoice::findOrFail($id);
        return view('admin.invoice.print',compact('Invoice'));
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
        //
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
}
