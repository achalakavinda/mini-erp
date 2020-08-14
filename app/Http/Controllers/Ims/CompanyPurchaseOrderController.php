<?php

namespace App\Http\Controllers\Ims;

use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\CompanyPurchaseOrder;
use App\Models\Ims\CompanyPurchaseOrderItem;
use App\Models\Ims\Grn;
use App\Models\Ims\GrnItem;
use App\Models\Ims\ItemCode;
use Illuminate\Http\Request;

class CompanyPurchaseOrderController extends Controller
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
        $CompanyPurchaseOrder = CompanyPurchaseOrder::all();
        return view('admin.ims.company-purchase-order.index',compact(['CompanyPurchaseOrder']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.company-purchase-order.create');
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
            'row.*.unit_price' => 'required'
        ]);

        $date = $request->delivery_date? $request->delivery_date : Carbon::now();

        $CompanyPurchaseOrder = CompanyPurchaseOrder::create([
            'po_id'=>$request->po_id,
            'location'=>$request->location,
            'delivery_address'=>$request->delivery_address,
            'delivery_date'=>$date,
            'supplier_id'=>$request->supplier_id,
        ]);

        try {

            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty']){

                    CompanyPurchaseOrderItem::create([
                        'company_purchase_order_id'=>$CompanyPurchaseOrder->id,
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$Model->id,
                        'price'=>$Model->unit_cost,
                        'qty'=>$item['qty'],
                        'company_division_id'=>$Model->company_division_id,
                    ]);

                }
            }



        }catch (\Exception $exception){
            $CompanyPurchaseOrder->delete();
            dd($exception->getMessage());
        }
        return redirect(url('ims/company-purchase-order/'.$CompanyPurchaseOrder->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CompanyPurchaseOrder = CompanyPurchaseOrder::findOrFail($id);
        return view('admin.ims.company-purchase-order.show',compact('CompanyPurchaseOrder'));
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

    public function postToGRN(Request $request){
        $CompanyPurchaseOrder = CompanyPurchaseOrder::findOrFail($request->CompanyPurchaseOrder_id);
    
        $Grn = Grn::create([
            'supplier_id'=>$CompanyPurchaseOrder->supplier_id,
            'company_division_id'=>$this->CompanyDivision->id,
            'created_date'=> Carbon::now(),
            'created_by'=>auth()->user()->id,
            'code'=>'GRN'
        ]);

        $TotalAmount = 0;

        try {

            foreach ($CompanyPurchaseOrder->items as $item) {

                $Model = ItemCode::find($item->item_code_id);

                if($Model){

                    GrnItem::create([
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$Model->id,
                        'grn_id'=>$Grn->id,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->price,
                        'created_qty'=>$item->qty,
                        'total'=>$item->qty * $item->price
                    ]);

                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit_price'] ) ;
                }
            }


            $Grn->code = "GRN-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Grn->id;
            $Grn->total = $TotalAmount;
            $Grn->save();

        }catch (\Exception $exception){
            $Grn->delete();
            dd($exception->getMessage());
        }
        return redirect(url('ims/grn/'.$Grn->id));
    }
}