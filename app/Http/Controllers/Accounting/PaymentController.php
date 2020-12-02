<?php

namespace App\Http\Controllers\Accounting;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Payment;
use App\Models\Accounting\PaymentItem;
use App\Models\Ims\Invoice;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Payments = Payment::all();
        return view('admin.accounting.payment.index',compact(['Payments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounting.payment.create');
    }


    public function storeCustomerPayment(Request $request)
    {
        return $this->store($request);
    }

    public function storeInvoicePayment(Request $request)
    {
        return $this->store($request);
    }

    public function storeSupplierPayment(Request $request)
    {
        return $this->store($request);
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
            'row.*.model_name' => 'required',
            'row.*.amount' => 'required',
        ]);

        $Payment = Payment::create([
            'payment_type'=>'collection',
            'code' => "PAY",
            'date'=>Carbon::now(),
            'commit'=>false,
            'created_by'=>auth()->user()->id,
        ]);

        try {
            $TotalAmount = 0;
            foreach ( $request->row as $item ) {
                //find the created invoice
                $Model = Invoice::find($item['model_id']);// invoice id
                if($Model){
                    PaymentItem::create([
                        'payment_id'=>$Payment->id,
                        'invoice_id'=>$Model->id,
                        'total_amount'=>$item['amount'],
                        'payed_amount'=>$item['amount'],
                        'remain_amount'=>0,
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);
                }
            }

            $Payment->code = "PAY-".Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day."-000".$Payment->id;
            $Payment->save();

        }catch (\Exception $exception){
            $Payment->delete();
            dd($exception->getMessage());
        }

        return redirect(url('accounting/payment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Payment = Payment::findOrFail($id);
        return view('admin.accounting.payment.show',compact('Payment'));
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
            'row.*.model_name' => 'required',
            'row.*.amount' => 'required',
        ]);

        $Payment = Payment::findOrFail($id);

        try {
            $TotalAmount = 0;
            $Payment->items()->delete();
            foreach ($request->row as $item) {

                $Model = Invoice::find($item['model_id']);
                $PaymentItems = PaymentItem::where('invoice_id','=',$Model->id)->get();
                $FullAmount = 0;

                if($PaymentItems->count() >0){

                    foreach ($PaymentItems as $PaymentItem){
                        $FullAmount =  $FullAmount + $PaymentItem->amount;
                    }

                }
                $FullAmount = $FullAmount + $item['amount'];
                if($Model){

                    PaymentItem::create([
                        'payment_id'=>$Payment->id,
                        'invoice_id'=>$Model->id,
                        'amount'=>$item['amount'],
                        'remain_amount'=>0,
                        'due_amount'=>$Model->total - $FullAmount,
                        'remarks'=>$item['remark']?$item['remark']:null
                    ]);

                    $TotalAmount = $TotalAmount + $item['amount'];
                }
            }
            $Payment->date = Carbon::now();
            $Payment->created_by = auth()->user()->id;
            $Payment->code = "PAY-".Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day."-000".$Payment->id;
            $Payment->total = $TotalAmount;
            $Payment->save();

        }catch (\Exception $exception){
            $Payment->delete();
            dd($exception->getMessage());
        }

        return redirect(url('accounting/payment/'.$Payment->id));
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
