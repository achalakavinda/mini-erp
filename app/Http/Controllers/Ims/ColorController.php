<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ims\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Colors = Color::all();
        return view('admin.ims.color.index',compact('Colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Color::create([
            'code'=>$request->code,
            'description'=>$request->description
        ]);

        return redirect()->route('color.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Color = Color::find($id);
        return view('admin.ims.color.show',compact('Color'));
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
        $Color = Color::findOrFail($id);

        if($Color->items->count() > 0){
            return redirect()->back()->with(['created'=>'error','message'=>'There are already created items for this color']);
        }
        $Color->code = $request->code;
        $Color->description = $request->description;
        $Color->save();

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
        dd($id);
    }
}