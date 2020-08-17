<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyDivision;
use App\Models\Ims\Brand;
use App\Models\Ims\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();
        return view('admin.ims.category.index',compact('Categories'));
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
        $Categories = Category::all();
        return view('admin.ims.category.create',compact(['Company','CompanyDivision','Categories']));
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
            'company_division_id'=>'required'
        ]);

        $CompanyDivision = CompanyDivision::findOrFail($request->company_division_id);

        $Category = Category::create([
            'name'=>$request->name,
            'company_id'=>$CompanyDivision->company_id,
            'company_division_id'=>$CompanyDivision->id,
            'description'=>$request->description
        ]);

        if($request->file('img_url')){
            $image = $request->file('img_url');
            $Store = Storage::put('/images/system/brands/'.$Category->id.'', $image);

            if($Store){
                $Category->img_url = '/storage/'.$Store;
                $Category->save();
            }
        }

        if($request->parent_id>0){
            $parentCategory = Category::find($request->parent_id);
            if( $parentCategory ){
                $Category->name = $parentCategory->name.' - '.$request->name;
                $Category->parent_id = $parentCategory->id;
                $Category->level = $parentCategory->level+1;
                $Category->save();
            }
        }

        return redirect('ims/category/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::findorfail($id);
        $Company = Company::all()->pluck('code','id');
        $CompanyDivision = CompanyDivision::all()->pluck('code','id');
        $Categories = Category::all();
        return view('admin.ims.category.show',compact(['Category','Company','CompanyDivision','Categories']));
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
