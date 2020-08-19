<?php

namespace App\Http\Controllers\Ims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ims\ItemCodeBatch;

class ItemCodeBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ItemCodeBatches = ItemCodeBatch::all();
        return view('admin.ims.item-code-batch.index',compact('ItemCodeBatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ims.item-code-batch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ItemCodeBatch::create([
            'code'=>$request->code,
            'description'=>$request->description
        ]);

        return redirect()->route('item-code-batch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ItemCodeBatch = ItemCodeBatch::find($id);
        return view('admin.ims.item-code-batch.show',compact('ItemCodeBatch'));
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
        $ItemCodeBatch = ItemCodeBatch::findOrFail($id);

        if($ItemCodeBatch->items->count() > 0){
            return redirect()->back()->with(['created'=>'error','message'=>'There are already created items for this Batch']);
        }
        $ItemCodeBatch->code = $request->code;
        $ItemCodeBatch->description = $request->description;
        $ItemCodeBatch->save();

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
        $ItemCodeBatch = ItemCodeBatch::findOrFail($id);
        
        if($ItemCodeBatch->items->count() > 0){
            return redirect()->back()->with(['created'=>'error','message'=>'There are already created items for this Batch']);
        }

        $ItemCodeBatch->delete();
        return redirect()->route('color.index')->with(['created'=>'success','message'=>'Successfully Deleted!']);
    }
}