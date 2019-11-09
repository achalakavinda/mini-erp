<?php

namespace App\Http\Controllers\Ims;

use App\Models\Ims\Brand;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = ItemCode::all();
        return view('admin.ims.item.index',compact('Items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BrandModel = \App\Models\Ims\Brand::all();
        return view('admin.ims.item.create',compact(['BrandModel']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * item code price tag consider nbt taxes and vat taxes
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'unit_cost' => 'required',
            'selling_price'=>'required',
            'nbt_tax'=>'required',
            'vat_tax'=>'required',
            'opening_stock_qty'=>'required'
        ]);

        //selling price and price with taxes
        $SellingPrice = $request->selling_price;
        $UnitPriceWithTax = $SellingPrice;

        if($request->nbt_tax>0 && $request->nbt_tax<=100){
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->nbt_tax/100));
        }
        if($request->vat_tax>0 && $request->vat_tax<=100){
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->vat_tax/100));
        }
        if($request->opening_stock_qty<0){
            $request->opening_stock_qty = 0;
        }

        $Brand = Brand::findOrFail($request->brand_id);

        $ItemCode = ItemCode::create([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'description'=>$request->description,
            'unit_cost'=>$request->unit_cost,
            'selling_price'=>$SellingPrice,
            'nbt_tax_percentage'=>$request->nbt_tax,
            'vat_tax_percentage'=>$request->vat_tax,
            'unit_price_with_tax'=>$UnitPriceWithTax,
            'opening_stock_qty'=>$request->opening_stock_qty,
            'company_id'=>$Brand->company_id,
            'company_division_id'=>$Brand->company_division_id,
        ]);

        //if open stock is available you need to add it to stock
        //check for the existing stock or create a new stock
        if( $request->opening_stock_qty>0 )
        {
            $Stock_Item = StockItem::where('item_code_id',$ItemCode->id)->first();

            if($Stock_Item == null){

                $Stock = Stock::create([
                    'name'=>'Stock-'.Carbon::now(),
                    'company_division_id'=>$Brand->company_division_id,
                    'company_id'=>$Brand->company_id]
                );

                StockItem::create([
                    'stock_id'=>$Stock->id,
                    'brand_id'=>$ItemCode->brand_id,
                    'item_code_id'=>$ItemCode->id,
                    'item_code'=>$ItemCode->name,
                    'unit_price'=>$UnitPriceWithTax,
                    'qty'=>0,
                    'open_qty'=>$request->opening_stock_qty,
                    'tol_qty'=>$request->opening_stock_qty,
                    'company_id'=>$Brand->company_id,
                    'company_division_id'=>$Brand->company_division_id,
                ]);
            }
        }

        return redirect()->back();
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
