<?php

namespace App\Http\Controllers\Ims;

use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\PurchaseRequisition;
use App\Models\Ims\PurchaseRequisitionItem;
use App\Models\Ims\CompanyPurchaseOrder;
use App\Models\Ims\CompanyPurchaseOrderItem;
use App\Models\Ims\Grn;
use App\Models\Ims\GrnItem;
use App\Models\Ims\ItemCode;
use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
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
        $PurchaseRequisition = PurchaseRequisition::all();
        return view('admin.ims.purchase-requisition.index',compact(['PurchaseRequisition']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.purchase-requisition.create');
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
            'row.*.item_code_id' => 'required',
            'row.*.unit_price' => 'required',
            'row.*.qty' => 'required',
        ]);

        $date = $request->date? $request->date : Carbon::now();

        $PurchaseRequisition = PurchaseRequisition::create([
            'date'=>$date,
            'company_division_id'=>$this->CompanyDivision->id,
            'supplier_id'=>$request->supplier_id,
            'created_by'=> auth()->user()->id,
            'purchase_requisition_status_id'=> 1
        ]);

        try {
            $total = 0;
            foreach ($request->row as $item)
            {
                $Model = ItemCode::find($item['item_code_id']);

                if($Model && $item['qty'] ){
                    PurchaseRequisitionItem::create([
                        'purchase_requisition_id'=>$PurchaseRequisition->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $total = $total + ($item['unit_price']*$item['qty']);
                }
            }

            $PurchaseRequisition->code = 'COM-PR-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$PurchaseRequisition->id;
            $PurchaseRequisition->total = $total;
            $PurchaseRequisition->save();

        }catch (\Exception $exception)
        {
            $PurchaseRequisition->delete();
            dd($exception->getMessage());
        }

        return redirect('ims/purchase-requisition');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Requisition = PurchaseRequisition::findOrFail($id);
        return view('admin.ims.purchase-requisition.show',compact('Requisition'));
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
            'row.*.item_code_id' => 'required',
            'row.*.unit_price' => 'required',
            'row.*.qty' => 'required',
        ]);

        $PurchaseRequisition = PurchaseRequisition::findOrFail($id);

        if($PurchaseRequisition->posted_to_po){
            $CompanyPurchaseOrder = CompanyPurchaseOrder::where('purchase_requisition_id',$PurchaseRequisition->id)->first();
            return '<a href="'.url('/ims/company-purchase-order/'.$CompanyPurchaseOrder->id).'"/> you already have created a Purchase Order</a>';
        }

        try {
            $total = 0;
            $PurchaseRequisition->items()->delete();
            foreach ($request->row as $item) {
                $Model = ItemCode::find($item['item_code_id']);

                if($Model && $item['qty'] ){
                    PurchaseRequisitionItem::create([
                        'purchase_requisition_id'=>$PurchaseRequisition->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $total = $total + ($item['unit_price']*$item['qty']);
                }
            }

            $PurchaseRequisition->total = $total;
            $PurchaseRequisition->supplier_id = $request->supplier_id;
            $PurchaseRequisition->save();

        } catch (\Exception $e){

        }

        return redirect('ims/purchase-requisition/'.$PurchaseRequisition->id);
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

    /**
     * post company purchase requisition to company purchase orders.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postToPurchase(Request $request){

        $PurchaseRequisition = PurchaseRequisition::findOrFail($request->requisition_id);

        if($PurchaseRequisition->posted_to_po){
            $CompanyPurchaseOrder = CompanyPurchaseOrder::where('',$PurchaseRequisition->id)->first();
            dd('<a href="'.url('/ims/company-purchase-order/'.$CompanyPurchaseOrder->id).'"/> you already have created a Purchase Order</a>');
        }

        $CompanyPurchaseOrder = CompanyPurchaseOrder::create(
            [
                'purchase_requisition_id'=>$PurchaseRequisition->id,
                'supplier_id'=>$request->supplier_id,
                'company_division_id'=>$PurchaseRequisition->company_division_id,
                'created_by'=>Auth::id()
            ]);

        try {
            $total = 0;

            foreach ($PurchaseRequisition->items as $item)
            {
                $Model = ItemCode::find($item->item_code_id);
                $PurchaseRequisitionItem = PurchaseRequisitionItem::find($item->id);

                if($Model && $PurchaseRequisitionItem)
                {
                    CompanyPurchaseOrderItem::create([
                        'company_division_id'=>$Model->company_division_id,
                        'company_purchase_order_id'=>$CompanyPurchaseOrder->id,
                        'purchase_requisition_item_id'=>$PurchaseRequisitionItem->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$PurchaseRequisitionItem->unit_price,
                        'qty'=>$PurchaseRequisitionItem->qty,
                        'remarks'=>$PurchaseRequisitionItem->remarks,
                    ]);

                    $total = $total + ($PurchaseRequisitionItem->qty*$PurchaseRequisitionItem->unit_price);
                }
            }

            $PurchaseRequisition->purchase_requisition_status_id = 2;
            $PurchaseRequisition->posted_to_po = true;
            $PurchaseRequisition->commit = true;
            $PurchaseRequisition->save();

            $CompanyPurchaseOrder->code = 'COM-PO-PPR-'.Carbon::now()->format('y').Carbon::now()->format('m').Carbon::now()->format('d').'-'.$CompanyPurchaseOrder->id;
            $CompanyPurchaseOrder->total = $total;
            $CompanyPurchaseOrder->save();

        }catch (\Exception $e){
            $CompanyPurchaseOrder->delete();
            dd($e->getMessage());
        }

        return redirect('/ims/company-purchase-order/'.$CompanyPurchaseOrder->id);
    }

    public function postToGRN(Request $request)
    {


//        $PurchaseRequisition = PurchaseRequisition::findOrFail($request->requisition_id);
//        $CompanyPurchaseOrder = CompanyPurchaseOrder::findOrFail($PurchaseRequisition->id);
//
//        $Grn = Grn::create([
//            'supplier_id'=>$CompanyPurchaseOrder->supplier_id,
//            'company_division_id'=>$this->CompanyDivision->id,
//            'created_date'=> Carbon::now(),
//            'created_by'=>auth()->user()->id,
//            'code'=>'GRN'
//        ]);
//
//        $TotalAmount = 0;
//
//        try {
//            foreach ($PurchaseRequisition->items as $item) {
//
//                $Model = ItemCode::find($item->item_code_id);
//
//                if($Model){
//
//                    GrnItem::create([
//                        'brand_id'=>$Model->brand_id,
//                        'item_code_id'=>$Model->id,
//                        'grn_id'=>$Grn->id,
//                        'company_division_id'=>$this->CompanyDivision->id,
//                        'item_code'=>$Model->name,
//                        'item_unit_cost_from_table'=>$Model->unit_cost,
//                        'unit_price'=>$item->price,
//                        'created_qty'=>$item->qty,
//                        'total'=>$item->qty * $item->price
//                    ]);
//                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit_price'] ) ;
//                }
//            }
//
//            $PurchaseRequisition->purchase_requisition_status_id = 3;
//            $PurchaseRequisition->save();
//
//            $Grn->code = "GRN-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Grn->id;
//            $Grn->total = $TotalAmount;
//            $Grn->save();
//
//        }catch (\Exception $exception){
//            $Grn->delete();
//            dd($exception->getMessage());
//        }
//        return redirect(url('ims/grn/'.$Grn->id));

    }
}
