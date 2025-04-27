<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_LIST')]);
        $Categories = Category::all();
        return view('admin.interfaces.category.index',compact(['Categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_CREATE')]);
        return view('admin.interfaces.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_CREATE')]);
        $this->validate($request, [
            'name' => 'required'
        ]);

        $parent_id  = null;

        if($request->blog_id){
            $Category = Category::find($request->blog_id);
            if($Category){
                $parent_id = $Category->id;
            }
        }


        Category::create([
            'name'=>$request->name,
            'parent_id'=>$parent_id,
            'slug'=>str::slug($request->name,'-'),
        ]);

        return redirect('/system/category/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_READ')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_UPDATE')]);
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
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_UPDATE')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::CheckPermission([config('aclConstants.Permissions.PERMISSION_CATEGORY_DELETE')]);
    }
}
