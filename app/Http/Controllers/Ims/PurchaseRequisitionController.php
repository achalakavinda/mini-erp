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
        return view('admin.ims.requisition.index',compact(['PurchaseRequisition']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.requisition.create');
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
            'row.*.qty' => 'required',
        ]);

        $date = $request->date? $request->date : Carbon::now();

        $PurchaseRequisition = PurchaseRequisition::create([
            'date'=>$date,
            'company_division_id'=>$this->CompanyDivision->id,
            'user_id'=> auth()->user()->id,
        ]);

        try {

            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['item_code_id']);

                if($Model && $item['qty'] ){

                    PurchaseRequisitionItem::create([
                        'purchase_requisition_id'=>$PurchaseRequisition->id,
                        'brand_id'=>$Model->brand_id,
                        'item_code_id'=>$Model->id,
                        'price'=>$item['unit'],
                        'qty'=>$item['qty'],
                        'stock_in_hand'=>$item['stock_in_hand'],
                        'company_division_id'=>$this->CompanyDivision->id,
                    ]);

                }
            }


        }catch (\Exception $exception){
            $PurchaseRequisition->delete();
            dd($exception->getMessage());
        }
        return redirect(url('ims/requisition/'.$PurchaseRequisition->id));
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
        return view('admin.ims.requisition.show',compact('Requisition'));
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

    public function postToPurchase(Request $request){
        
    }
}