<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ims\CustomerReturnNote;
use App\Models\Ims\CustomerReturnNoteItem;
use App\Models\Ims\Stock;
use App\Models\Ims\StockItem;
use App\Models\Ims\Invoice;
use App\Models\Ims\InvoiceItem;

class CustomerReturnNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CustomerReturnNotes = CustomerReturnNote::all();
        return view('admin.ims.customer-return-note.index',compact(['CustomerReturnNotes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CustomerReturnNote = CustomerReturnNote::findOrFail($id);
        return view('admin.ims.customer-return-note.show',compact('CustomerReturnNote'));
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
            'row.*.return_qty' => 'required',
        ]);

        $CustomerReturnNote = CustomerReturnNote::findOrFail($id);
        $DiscountPercentage = $CustomerReturnNote->discount;
        $TotalAmount = 0;
        $TotalSum = 0;
        $TotalDiscount = $DiscountPercentage;

        foreach ($request->row as $item) {

            $CustomerReturnNoteItem = CustomerReturnNoteItem::find($item['return_note_item_id']);

            $CustomerReturnNoteItem->return_qty = $item['return_qty'];
            $CustomerReturnNoteItem->save();

            $InvoiceItem = InvoiceItem::find($CustomerReturnNoteItem->invoice_item_id);

            $ReturnInvoiceItem = InvoiceItem::create([
                'invoice_id'=>$InvoiceItem->invoice_id,
                'item_code_id'=>$InvoiceItem->item_code_id,
                'stock_item_id'=>$InvoiceItem->stock_item_id,
                'item_unit_cost_from_table'=>$InvoiceItem->item_unit_cost_from_table,
                'unit_price'=>$InvoiceItem->unit_price,
                'qty'=>-$item['return_qty'],
                'total'=>-$item['return_qty']*$InvoiceItem->unit_price,
                'company_division_id'=>$InvoiceItem->company_division_id
            ]);
            
            $StockItem = StockItem::find($CustomerReturnNoteItem->stock_item_id);

            $ReturnStockItem = StockItem::create([
                'stock_id'=>$StockItem->stock_id,
                'invoice_item_id'=>$StockItem->invoice_item_id,
                'item_code_id'=>$StockItem->item_code_id,
                'item_code'=>$StockItem->item_code,
                'item_unit_cost_from_table'=>$StockItem->item_unit_cost_from_table,
                'unit_price'=>$StockItem->unit_price,
                'created_qty'=>$item['return_qty'],//to identify the initial qty for bath item
                'tol_qty'=>$item['return_qty'],
                'total'=>$item['return_qty']*$StockItem->unit_price,
                'company_division_id'=>$StockItem->company_division_id,
                'company_id'=>1,
            ]);
            
            $Stock = Stock::findOrFail($StockItem->stock_id);

            $Stock->total = $Stock->total+$ReturnStockItem->total;
            $Stock->save();

            $ReturnInvoiceItem->stock_item_id = $ReturnStockItem->id;
            $ReturnInvoiceItem->save();

            $ReturnStockItem->invoice_item_id = $ReturnInvoiceItem->id;
            $ReturnStockItem->save();

            $TotalAmount = $TotalAmount + ( $item['return_qty'] * $InvoiceItem->unit_price) ;
            
        }
        if($DiscountPercentage>0){
            $TotalSum = $TotalAmount - ($TotalAmount*($DiscountPercentage/100));
        }else{
            $TotalSum = $TotalAmount;
            $DiscountPercentage = 0;
        }

        $Invoice = Invoice::findOrFail($CustomerReturnNote->invoice_id);
        $Invoice->amount = $Invoice->amount-$TotalAmount;
        $Invoice->discount = $DiscountPercentage;
        $Invoice->total = $Invoice->total-$TotalSum;
        $Invoice->save();

        return redirect(url('ims/customer-return-note/'.$CustomerReturnNote->id));
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