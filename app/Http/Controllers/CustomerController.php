<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Customer::all();
        return view('customer.index',compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
           'name'=>'required',
           'code'=>'required',
           'contact'=>'required',
        ]);

        Customer::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'file_no'=>$request->file_no,
            'address_1'=>$request->address_1,
            'address_2'=>$request->address_2,
            'address_3'=>$request->address_3,
            'fax_number'=>$request->fax_number,
            'secretary_id'=>$request->secretary_id,
            'date_of_incorporation'=>$request->date_of_incorporation,
            'tin_no'=>$request->tin_no,
            'vat_no'=>$request->vat_no,
            'ceo'=>$request->ceo,
            'ceo_contact'=>$request->ceo_contact,
            'ceo_email'=>$request->ceo_email,
            'cfo'=>$request->cfo,
            'cfo_contact'=>$request->cfo_contact,
            'cfo_email'=>$request->cfo_email,
            'website'=>$request->website,
            'service_id'=>$request->service_id,
            'sector_id'=>$request->sector_id,
            'location'=>$request->location,
            'description'=>$request->description
        ]);

        return redirect('customer/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Customer = Customer::find($id);
        return view('customer.show',compact('Customer'));
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
