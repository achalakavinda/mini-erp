<?php

namespace App\Http\Controllers\Ims;

use App\Models\CompanyDivision;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Stocks = \DB::table('stock_items')
            ->select(\DB::raw('sum(stock_items.created_qty) as created_qty, sum(stock_items.tol_qty) as tol_qty, sum(stock_items.total) as total,stock_items.item_code_id'))
            ->groupBy('stock_items.item_code_id')
            ->get();

        $StockBatch = Stock::all();

        return view('admin.ims.stock.index',compact(['Stocks','StockBatch']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.stock.create');
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
            'row'=>'required',
            'row.*.model_id' => 'required',
            'row.*.qty' => 'required',
            'row.*.unit_price' => 'required'
        ]);

        $Total = 0;

        $Stock = Stock::create([
                'code'=>'Batch',
                'company_id'=>1
            ]);

        foreach ($request->row as $item)
        {
            try {
                if( $item['model_id']>0 && $item['qty']>0)
                {
                    $Model = ItemCode::find($item['model_id']);
                    if($Model)
                    {
                     StockItem::create([
                            'stock_id'=>$Stock->id,
                            'item_code_id'=>$Model->id,
                            'item_code'=>$Model->name,
                            'item_unit_cost_from_table'=>$Model->unit_cost,
                            'unit_price'=>$item['unit_price'],
                            'created_qty'=>$item['qty'],//to identify the initial qty for bath item
                            'tol_qty'=>$item['qty'],
                            'company_id'=>1,
                            'total'=> $item['qty'] * $item['unit_price']
                        ]);
                        $Total = $Total + ($item['qty']*$item['unit_price']);
                    }
                }
            }catch (\Exception $e){
                $Stock->delete();
                dd($e->getMessage());
            }
        }

        $Stock->code = "Stock :".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Stock->id;
        $Stock->total = $Total;
        $Stock->save();

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
        //
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
