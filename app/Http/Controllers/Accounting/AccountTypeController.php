<?php

namespace App\Http\Controllers\Accounting;

use App\Models\Company;
use App\Models\CompanyDivision;
use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountType;
use App\Models\Accounting\MainAccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AccountTypes = AccountType::all();
        return view('admin.accounting.account-type.index',compact('AccountTypes'));
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
        $AccountTypes = AccountType::all();
        $MainAccountTypes = MainAccountType::all();
        return view('admin.accounting.account-type.create',compact(['Company','CompanyDivision','AccountTypes','MainAccountTypes']));
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
            'main_account_types_id'=>'required',
            'company_id'=>'required',
            'company_division_id'=>'required'
        ]);

        $CompanyDivision = CompanyDivision::findOrFail($request->company_division_id);

        $AccountType = AccountType::create([
            'name'=>$request->name,
            'main_account_types_id'=>$request->main_account_types_id,
            'company_id'=>$CompanyDivision->company_id,
            'company_division_id'=>$CompanyDivision->id,
            'description'=>$request->description
        ]);

        if($request->parent_account_type_id>0){
            $parentAccountType = AccountType::find($request->parent_account_type_id);
            if($parentAccountType){
                $AccountType->name = $parentAccountType->name.' - '.$request->name;
                $AccountType->parent_id = $parentAccountType->id;
                $AccountType->level = $parentAccountType->level+1;
                $AccountType->save();
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
        $AccountType = AccountType::findorfail($id);
        $Company = Company::all()->pluck('code','id');
        $CompanyDivision = CompanyDivision::all()->pluck('code','id');
        $AccountTypes = AccountType::all();
        $MainAccountTypes = MainAccountType::all();
        return view('admin.accounting.account-type.show',compact(['AccountType','Company','CompanyDivision','AccountTypes','MainAccountTypes']));
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
            'main_account_types_id'=>'required',
            'company_id'=>'required',
            'company_division_id'=>'required',
        ]);

        $AccountType = AccountType::findorfail($id);

        $AccountType->name = $request->name;
        $AccountType->main_account_types_id = $request->main_account_types_id;
        $AccountType->company_id = $request->company_id;
        $AccountType->company_division_id = $request->company_division_id;
        $AccountType->description = $request->description;
        $AccountType->save();

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
        //
    }
}