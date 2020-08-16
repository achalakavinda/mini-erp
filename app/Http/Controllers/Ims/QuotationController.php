<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\Invoice;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Quotation;
use App\Models\Ims\QuotationItem;
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
                        'quoted_qty'=>$item['qty']
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
