<?php

namespace App\Http\Controllers\Ims;

use App\Models\Ims\Brand;
use App\Models\Ims\Category;
use App\Models\Ims\ItemCode;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use App\Models\Ims\Color;
use App\Models\Ims\Size;
use App\Models\Ims\ItemCodeBatch;
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
        $Brands = Brand::all()->pluck('name','id');
        $Categories = Category::all()->pluck('name','id');
        $ItemCodeBatches = ItemCodeBatch::all()->pluck('code','id');
        $Colors = Color::all()->pluck('code','id');
        $Sizes = Size::all()->pluck('code','id');
        return view('admin.ims.item.create',compact(['Brands','Categories','ItemCodeBatches','Colors','Sizes']));
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
            'selling_price'=>'required'
        ]);

        //selling price and price with taxes
        $SellingPrice = $request->selling_price;
        $UnitPriceWithTax = $SellingPrice;

        if($request->nbt_tax>0 && $request->nbt_tax<=100)
        {
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->nbt_tax/100));
        }

        if($request->vat_tax>0 && $request->vat_tax<=100)
        {
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->vat_tax/100));
        }

        if($request->opening_stock_qty<0)
        {
            $request->opening_stock_qty = 0;
        }

        $Brand = Brand::findOrFail($request->brand_id);



        $ItemCode = ItemCode::create([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'item_code_batch_id'=>$request->item_code_batch_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'description'=>$request->description,
            'unit_cost'=>$request->unit_cost,
            'selling_price'=>$SellingPrice,
            'nbt_tax_percentage'=>$request->nbt_tax,
            'vat_tax_percentage'=>$request->vat_tax,
            'unit_price_with_tax'=>$UnitPriceWithTax,
            'company_id'=>$Brand->company_id,
            'company_division_id'=>$Brand->company_division_id,

            'market_price'=>$request->market_price,
            'min_price'=>$request->min_price,
            'max_price'=>$request->max_price,
        ]);

        //if open stock is available you need to add it to stock
        //check for the existing stock or create a new stock
        if( $request->opening_stock_qty>0 )
        {
            try {
                $Stock = Stock::create(['code'=>'Batch','company_division_id'=>1,'company_id'=>1,'is_open_stock'=>true]);
                $Stock->code = "Batch :".Carbon::now()->year."|".Carbon::now()->month."|".Carbon::now()->day."-000".$Stock->id."-open-stock";
                $Stock->save();

                StockItem::create([
                            'stock_id'=>$Stock->id,
                            'item_code_id'=>$ItemCode->id,
                            'item_code'=>$ItemCode->name,
                            'unit_price'=>$ItemCode->unit_cost,
                            'created_qty'=>$request->opening_stock_qty,//to identify the initial qty for bath item
                            'tol_qty'=>$request->opening_stock_qty,
                            'company_division_id'=>1,
                            'company_id'=>1,
                ]);

            }catch (\Exception $e){

                $ItemCode->delete();
                dd($e->getMessage());
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
        $Brands = Brand::all()->pluck('name','id');
        $Categories = Category::all()->pluck('name','id');
        $Item = ItemCode::findorfail($id);
        $ItemCodeBatches = ItemCodeBatch::all()->pluck('code','id');
        $Colors = Color::all()->pluck('code','id');
        $Sizes = Size::all()->pluck('code','id');
        return view('admin.ims.item.show',compact(['Brands','Item','Categories','ItemCodeBatches','Colors','Sizes']));
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
            'name' => 'required',
            'unit_cost' => 'required',
            'selling_price'=>'required'
        ]);

        $Item = ItemCode::findorfail($id);

        //selling price and price with taxes
        $SellingPrice = $request->selling_price;
        $UnitPriceWithTax = $SellingPrice;

        if($request->nbt_tax>0 && $request->nbt_tax<=100){
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->nbt_tax/100));
        }
        if($request->vat_tax>0 && $request->vat_tax<=100){
            $UnitPriceWithTax = $UnitPriceWithTax+($UnitPriceWithTax*($request->vat_tax/100));
        }
        if($request->opening_stock_qty<0)
        {
            $request->opening_stock_qty = 0;
        }

        $Brand = Brand::findOrFail($request->brand_id);

        $Item->name = $request->name;
        $Item->brand_id = $request->brand_id;
        $Item->category_id = $request->category_id;
        $Item->item_code_batch_id = $request->item_code_batch_id;
        $Item->color_id = $request->color_id;
        $Item->size_id = $request->size_id;
        $Item->description = $request->description;
        $Item->unit_cost = $request->unit_cost;
        $Item->selling_price = $SellingPrice;
        $Item->nbt_tax_percentage = $request->nbt_tax;
        $Item->vat_tax_percentage = $request->vat_tax;
        $Item->unit_price_with_tax = $UnitPriceWithTax;
        $Item->company_id = $Brand->company_id;
        $Item->company_division_id = $Brand->company_division_id;
        $Item->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $Item = ItemCode::findorfail($id);
//        if($Item->stockItem){
//            dd("You can't delete this item. Because this has some stock");
//        }else{
//            $Item->delete();
//            return redirect()->route('item.index');
//        }
    }
}
