<?php

namespace App\Http\Controllers\Ims;

use App\Models\Company;
use App\Models\CompanyDivision;
use App\Models\Ims\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brands = Brand::all();
        return view('admin.ims.brand.index',compact('Brands'));
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
        $Brand = Brand::all()->pluck('name','id');
        return view('admin.ims.brand.create',compact(['Company','CompanyDivision','Brand']));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'company_id'=>'required',
            'company_division_id'=>'required'
        ]);

        $CompanyDivision = CompanyDivision::findOrFail($request->company_division_id);

        Brand::create([
            'name'=>$request->name,
            'company_id'=>$CompanyDivision->company_id,
            'company_division_id'=>$CompanyDivision->id,
            'description'=>$request->description,
            'img_url'=>asset('storage/img/brand').'/'.$request->img_url,
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
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->set_delete && $request->set_delete=="value"){
            Brand::find($id)->delete();
            return \redirect()->back();
        }else{
            return \redirect()->back();
        }
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
