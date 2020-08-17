<?php

namespace App\Http\Controllers\Ims;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\ItemCode;
use App\Models\Ims\SalesOrder;
use App\Models\Ims\SalesOrderItem;
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
            'date' => 'required',
            'customer_id' => 'required',
            'row' => 'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit' => 'required',
        ]);

        $DiscountPercentage = $request->discount_percentage;
        $Amount = 0;
        $TotalAmount = 0;

        $SalesOrder = SalesOrder::create([
            'customer_id'=>$request->customer_id,
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
                        'unit_price'=>$Model->unit_cost,
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
        return view('admin.ims.sale-order.show',compact('SalesOrder'));
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
