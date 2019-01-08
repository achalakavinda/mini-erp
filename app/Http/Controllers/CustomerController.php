<?php

namespace App\Http\Controllers;

use App\Models\CusSector;
use App\Models\CusService;
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
        return view('admin.customer.index',compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
           'code'=>'required'
        ]);

        $Customer = null;

        try{

            $Customer = Customer::create([
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
                'location'=>$request->location,
                'description'=>$request->description,
                'created_by'=>\Auth::id(),
                'updated_by'=>\Auth::id()
            ]);

            if($request->service_id){
                foreach ($request->service_id as $item){

                    CusService::create([
                        'customer_id'=> $Customer->id,
                        'service_id'=>$item
                    ]);
                }
            }

            if($request->sector_id){
                foreach ($request->sector_id as $item){
                CusSector::create([
                    'customer_id'=> $Customer->id,
                    'sector_id'=>$item
                ]);
            }}

        }catch (\Exception $exception){
            return redirect()->back()->with(['created'=>'error','message'=>$exception->getMessage()]);
        }
            return redirect()->back()->with(['created'=>'success','message'=>'Successfully created!']);
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
        return view('admin.customer.show',compact('Customer'));
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
            'name'=>'required',
            'code'=>'required'
        ]);

        try{

            $Customer = Customer::find($id);

            if(!empty($Customer)){
                $Customer->name = $request->name;
                $Customer->code = $request->code;
                $Customer->contact = $request->contact;
                $Customer->email = $request->email;
                $Customer->file_no = $request->file_no;
                $Customer->address_1=$request->address_1;
                $Customer->address_2=$request->address_2;
                $Customer->address_3=$request->address_3;
                $Customer->fax_number=$request->fax_number;
                $Customer->secretary_id=$request->secretary_id;
                $Customer->date_of_incorporation=$request->date_of_incorporation;
                $Customer->tin_no=$request->tin_no;
                $Customer->vat_no=$request->vat_no;
                $Customer->ceo=$request->ceo;
                $Customer->ceo_contact=$request->ceo_contact;
                $Customer->ceo_email=$request->ceo_email;
                $Customer->cfo=$request->cfo;
                $Customer->cfo_contact=$request->cfo_contact;
                $Customer->cfo_email=$request->cfo_email;
                $Customer->website=$request->website;
                $Customer->service_id=$request->service_id;
                $Customer->sector_id=$request->sector_id;
                $Customer->location=$request->location;
                $Customer->description=$request->description;
                $Customer->updated_by=\Auth::id();
                $Customer->save();
            }else{
                return redirect()->back()->with(['created'=>'error','message'=>"Please check fields again!"]);
            }

        }catch (\Exception $exception){
            return redirect()->back()->with(['created'=>'error','message'=>$exception->getMessage()]);
        }
        return redirect()->back()->with(['created'=>'success','message'=>'Successfully updated!']);

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
