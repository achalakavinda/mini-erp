<?php

namespace App\Http\Controllers\Ims;

use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CompanyDivision;
use App\Models\Ims\Grn;
use App\Models\Ims\GrnItem;
use App\Models\Ims\ItemCode;
use Illuminate\Http\Request;

class GrnController extends Controller
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
        $Grn = Grn::all();
        return view('admin.ims.grn.index',compact(['Grn']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.grn.create');
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

        $Grn = Grn::create([
            'company_division_id'=>$this->CompanyDivision->id,
            'supplier_id'=>$request->supplier_id,
            'created_by'=>auth()->user()->id,
            'code'=>'GRN',
            'date'=> $date,
        ]);

        try {
            $TotalAmount = 0;

            foreach ($request->row as $item)
            {
                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty'] && $item['unit_price'] )
                {
                    GrnItem::create([
                        'grn_id'=>$Grn->id,
                        'item_code_id'=>$Model->id,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);
                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit_price'] ) ;
                }
            }


            $Grn->code = "GRN-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Grn->id;
            $Grn->total = $TotalAmount;
            $Grn->save();

        }catch (\Exception $exception){
            $Grn->delete();
        }

        return redirect(url('ims/grn/'.$Grn->id));
    }

    public function postToStock(Request $request)
    {
        $request->validate([
            'grn_id' => 'required'
        ]);

        $Grn = Grn::findOrFail($request->grn_id);

        if(Stock::where('grn_id',$Grn->id)->first())
        {
            dd("You have already posted GRN to Stock....");
        }

        $Stock = Stock::create(
            [
                'grn_id'=>$Grn->id,
                'code'=>'Batch',
                'company_division_id'=>1,
                'company_id'=>1
            ]);

        $Total = 0;
        try {

            foreach ($Grn->items as $item)
            {
                $Model = ItemCode::find($item->item_code_id);
                if($Model)
                {
                    StockItem::create([
                        'stock_id'=>$Stock->id,
                        'grn_item_id'=>$item->id,
                        'item_code_id'=>$Model->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item->unit_price,
                        'created_qty'=>$item->qty,//to identify the initial qty for bath item
                        'tol_qty'=>$item->qty,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'company_id'=>1,
                        'total'=> $item->qty * $item->unit_price
                    ]);
                    $Total = $Total + ($item->qty * $item->unit_price);
                }
            }

            $Stock->code = "Stock :".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Stock->id;
            $Stock->total = $Total;
            $Stock->save();

            $Grn->posted_to_stock = true;
            $Grn->save();

        }catch (\Exception $e){
            $Stock->delete();
            dd($e->getMessage());
        }

        return redirect('ims/stock');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Grn = Grn::findOrFail($id);
        return view('admin.ims.grn.show',compact('Grn'));
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

        $Grn = Grn::findOrFail($id);

        if($Grn->posted_to_stock){
            return '<a href="'.url('/ims/grn/'.$Grn->id).'"/> you already have created a Stock</a>';
        }

        $date = $request->date? $request->date : Carbon::now();

        try {
            $TotalAmount = 0;
            $Grn->items()->delete();
            foreach ($request->row as $item) {

                $Model = ItemCode::find($item['model_id']);

                if($Model && $item['qty'] && $item['unit_price'] ){

                    GrnItem::create([
                        'grn_id'=>$Grn->id,
                        'item_code_id'=>$Model->id,
                        'company_division_id'=>$this->CompanyDivision->id,
                        'item_code'=>$Model->name,
                        'item_unit_cost_from_table'=>$Model->unit_cost,
                        'unit_price'=>$item['unit_price'],
                        'qty'=>$item['qty'],
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $TotalAmount = $TotalAmount + ( $item['qty'] * $item['unit_price'] ) ;
                }
            }

            $Grn->company_division_id = $this->CompanyDivision->id;
            $Grn->supplier_id = $request->supplier_id;
            $Grn->created_by = auth()->user()->id;
            $Grn->date = $date;
            $Grn->code = "GRN-".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Grn->id;
            $Grn->total = $TotalAmount;
            $Grn->save();

        }catch (\Exception $exception){
            $Grn->delete();
            dd($exception->getMessage());
        }
        return redirect(url('ims/grn/'.$Grn->id));
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

    public function print($id)
    {
        $Grn = Grn::findOrFail($id);
        return view('admin.ims.grn.print',compact('Grn'));
    }
}