<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyDivision;
use App\Models\Ims\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Suppliers = Supplier::all();
        return view('admin.supplier.index',compact(['Suppliers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Company = Company::all()->pluck('code','id');
        $CompanyDivision = CompanyDivision::all()->pluck('code','id');
        return view('admin.supplier.create',compact(['Company','CompanyDivision']));
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
            'company_id'=>'required',
            'company_division_id'=>'required',

        ]);

        Supplier::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'web_url'=>$request->web_url,
            'address'=>$request->address,
            'company_id'=>$request->company_id,
            'company_division_id'=>$request->company_division_id,
        ]);

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
        $supplier = Supplier::findorfail($id);
        $Company = Company::all()->pluck('code','id');
        $CompanyDivision = CompanyDivision::all()->pluck('code','id');
        return view('admin.supplier.show',compact(['Company','CompanyDivision','supplier']));
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
            'company_id'=>'required',
            'company_division_id'=>'required',

        ]);

        $supplier = Supplier::findorfail($id);

        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;
        $supplier->web_url = $request->web_url;
        $supplier->address = $request->address;
        $supplier->company_id = $request->company_id;
        $supplier->company_division_id = $request->company_division_id;
        $supplier->save();


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
//        $supplier = Supplier::findorfail($id);
//        $supplier->delete();
//        return redirect()->route('supplier.index');
    }
}
