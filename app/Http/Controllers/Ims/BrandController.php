<?php

namespace App\Http\Controllers\Ims;

use App\Models\Company;
use App\Models\CompanyDivision;
use App\Models\Ims\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
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
        $Brands = Brand::all();
        return view('admin.ims.brand.create',compact(['Company','CompanyDivision','Brands']));
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

        $Brand = Brand::create([
            'name'=>$request->name,
            'company_id'=>$CompanyDivision->company_id,
            'company_division_id'=>$CompanyDivision->id,
            'description'=>$request->description
        ]);

        if($request->file('img_url'))
        {
            $image = $request->file('img_url');
            $Store = Storage::put('/images/system/brands/'.$Brand->id.'', $image);

            if($Store){
                $Brand->img_url = '/storage/'.$Store;
                $Brand->save();
            }
        }

        if($request->parent_brand_id>0) {
            $parentBrand = Brand::find($request->parent_brand_id);
            if($parentBrand){
                $Brand->name = $parentBrand->name.' - '.$request->name;
                $Brand->parent_id = $parentBrand->id;
                $Brand->level = $parentBrand->level+1;
                $Brand->save();
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
        $Brand = Brand::findorfail($id);
        $Company = Company::all()->pluck('code','id');
        $CompanyDivision = CompanyDivision::all()->pluck('code','id');
        $Brands = Brand::all();
        return view('admin.ims.brand.show',compact(['Brand','Company','CompanyDivision','Brands']));
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
        $request->validate([
            'name'=>'required',
            'company_id'=>'required',
            'company_division_id'=>'required',
            'description'=>'required',
            'img_url'=>'required',
        ]);

        $Brand = Brand::findorfail($id);

        $Brand->name = $request->name;
        $Brand->company_id = $request->company_id;
        $Brand->company_division_id = $request->company_division_id;
        $Brand->description = $request->description;
        $Brand->save();

        $image = $request->file('img_url');
        if($Brand->img_url != null){
            Storage::deleteDirectory('/images/system/brands/'.$Brand->id.'');
        }
        $Store = Storage::put('/images/system/brands/'.$Brand->id.'', $image);

        if($Store){
            $Brand->img_url = '/storage/'.$Store;
            $Brand->save();
        }
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
//        $Brand = Brand::findorfail($id);
//        if($Brand->img_url != null){
//            Storage::deleteDirectory('/images/system/brands/'.$Brand->id.'');
//        }
//        $Brand->delete();
//        return redirect()->route('brand.index');

//        if($Brand->itemCodes->count() > 0){
//
//        }else{
//            if($Brand->img_url != null){
//                Storage::deleteDirectory('/images/system/brands/'.$Brand->id.'');
//            }
//            $Brand->delete();
//            return redirect()->route('brand.index');
//        }
    }
}
