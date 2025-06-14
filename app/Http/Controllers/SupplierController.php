<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyDivision;
use App\Models\Ims\Supplier;
use Illuminate\Http\Request;
use App\Traits\HasCompanyScope;

class SupplierController extends Controller
{
     use HasCompanyScope;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Suppliers = Supplier::ownedByCompany()->paginate(10);
        return view('admin.supplier.index',compact(['Suppliers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $Company = Company::whereIn('id', $this->companyIds())->pluck('code', 'id');

        return view('admin.supplier.create',compact(['Company']));
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
            'name' => 'required',
            'company_id' => 'required',
        ]);
       
       if (!in_array($request->company_id, $this->companyIds())) {
            abort(403, 'Unauthorized company access.');
        }

        Supplier::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'web_url' => $request->web_url,
            'address' => $request->address,
            'company_id' => $request->company_id,
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
         $supplier = Supplier::ownedByCompany()->findOrFail($id);

        $Company = Company::whereIn('id', $this->companyIds())->pluck('code', 'id');

        return view('admin.supplier.show', compact('Company', 'supplier'));
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
