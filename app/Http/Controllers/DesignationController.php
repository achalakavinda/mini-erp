<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Designation']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::CheckPermission(['Designation | Registry']);
        $Rows = Designation::all();
        return view('admin.designation.index',compact('Rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission(['Designation | Creation']);
        return view('admin.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::CheckPermission(['Designation | Creation']);
        $request->validate([
            'designationType' => 'required | min:3',
            'avg_hr_rate' => 'required',
        ]);
        try{
            Designation::create([
                'designationType'=>$request->designationType,
                'avg_hr_rate'=>$request->avg_hr_rate,
                'description'=>$request->description
            ]);

        }catch (\Exception $exception){
            return redirect()->back()->with(['created'=>'error','message'=>$exception->getMessage()]);
        }
        return redirect()->back()->with(['created'=>'success','message'=>'Successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::CheckPermission(['Designation | Registry']);
        $Designation = Designation::findOrFail($id);
        return view('admin.designation.edit',compact('Designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::CheckPermission(['Designation | Update']);
        $Designation = Designation::findOrFail($id);
        return view('admin.designation.edit',compact('Designation'));
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
        User::CheckPermission(['Designation | Update']);
        $request->validate([
            'designationType' => 'required | min:3',
            'avg_hr_rate' => 'required',
        ]);
        try {
            $DESIGNATION = Designation::findOrFail($id);
            if (!empty($DESIGNATION)) {
                $DESIGNATION->designationType = $request->designationType;
                $DESIGNATION->description = $request->description;
                $DESIGNATION->avg_hr_rate = $request->avg_hr_rate;
                $DESIGNATION->save();
            }else{
                return redirect()->back()->with(['created'=>'error','message'=>'Designation type cannot be empty!']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['created'=>'error','message'=>$exception->getMessage()]);
        }
        return redirect()->back()->with(['created'=>'success','message'=>'Successfully updated!']);
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
