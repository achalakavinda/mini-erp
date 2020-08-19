<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ims\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sizes = Size::all();
        return view('admin.ims.size.index',compact('Sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Size::create([
            'code'=>$request->code,
            'description'=>$request->description
        ]);

        return redirect()->route('size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Size = Size::find($id);
        return view('admin.ims.size.show',compact('Size'));
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
        $Size = Size::findOrFail($id);

        if($Size->items->count() > 0){
            return redirect()->back()->with(['error'=>'error','message'=>'There are already created items for this size']);
        }
        $Size->code = $request->code;
        $Size->description = $request->description;
        $Size->save();

        return redirect()->back()->with(['created'=>'success','message'=>'Successfully Updated!']);
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