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
            'supplier_id' => 'required',
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit_price' => 'required'
        ]);

        $date = $request->date? $request->date : Carbon::now();

        $CompanyPurchaseOrder = CompanyPurchaseOrder::create([
            'supplier_id'=>$request->supplier_id,
            'created_by'=> auth()->user()->id,
            'date'=>$date,
        ]);

        try {
            $total = 0;
            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty']){

                    CompanyPurchaseOrderItem::create([
                        'company_purchase_order_id'=>$CompanyPurchaseOrder->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $total = $total + ($item['unit_price']*$item['qty']);

                }
            }
            $CompanyPurchaseOrder->code = 'COM-PO-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$CompanyPurchaseOrder->id;
            $CompanyPurchaseOrder->total = $total;
            $CompanyPurchaseOrder->save();

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
        $request->validate([
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit_price' => 'required'
        ]);

        $CompanyPurchaseOrder = CompanyPurchaseOrder::findOrFail($id);

        if($CompanyPurchaseOrder->posted_to_grn){
            return '<a href="'.url('/ims/company-purchase-order/'.$CompanyPurchaseOrder->id).'"/> you already have created a GRN</a>';
        }

        $date = $request->date? $request->date : Carbon::now();

        try {
            $total = 0;
            $CompanyPurchaseOrder->items()->delete();
            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty']){

                    CompanyPurchaseOrderItem::create([
                        'company_purchase_order_id'=>$CompanyPurchaseOrder->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $total = $total + ($item['unit_price']*$item['qty']);

                }
            }

            $CompanyPurchaseOrder->supplier_id = $request->supplier_id;
            $CompanyPurchaseOrder->created_by = auth()->user()->id;
            $CompanyPurchaseOrder->date = $date;
            $CompanyPurchaseOrder->code = 'COM-PO-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$CompanyPurchaseOrder->id;
            $CompanyPurchaseOrder->total = $total;
            $CompanyPurchaseOrder->save();

        }catch (\Exception $exception){
            $CompanyPurchaseOrder->delete();
            dd($exception->getMessage());
        }
        return redirect(url('ims/company-purchase-order/'.$CompanyPurchaseOrder->id));
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
            'created_by'=>auth()->user()->id,
            'company_purchase_order_id'=>$CompanyPurchaseOrder->id,
            'code'=>'GRN',
            'date'=> Carbon::now()
        ]);

        $TotalAmount = 0;

        try {

            foreach ($CompanyPurchaseOrder->items as $item) {

                $Model = ItemCode::find($item->item_code_id);
                $PurchaseOrderItem = CompanyPurchaseOrderItem::find($item->id);

                if($Model && $PurchaseOrderItem){

                    GrnItem::create([
                        'grn_id'=>$Grn->id,
                        'item_code_id'=>$Model->id,
                        'company_purchase_order_item_id'=>$PurchaseOrderItem->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$PurchaseOrderItem->unit_price,
                        'qty'=>$PurchaseOrderItem->qty,
                        'remarks'=>$PurchaseOrderItem->remarks
                    ]);

                    $TotalAmount = $TotalAmount + ( $PurchaseOrderItem->qty * $PurchaseOrderItem->unit_price ) ;
                }
            }

            $CompanyPurchaseOrder->commit = true;
            $CompanyPurchaseOrder->posted_to_grn = true;
            $CompanyPurchaseOrder->save();

            $Grn->code = "GRN-PO-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Grn->id;
            $Grn->total = $TotalAmount;
            $Grn->save();


        }catch (\Exception $exception){
            $Grn->delete();
            dd($exception->getMessage());
        }

        return redirect(url('ims/grn/'.$Grn->id));
    }

    public function print($id)
    {
        $CompanyPurchaseOrder = CompanyPurchaseOrder::findOrFail($id);
        return view('admin.ims.company-purchase-order.print',compact('CompanyPurchaseOrder'));
    }
}