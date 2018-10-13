<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rows = User::all();
        return view('staff.index',compact('Rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Designation = Designation::all()->pluck('designationType','id');
        return view('staff.create',compact('Designation'));
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
            'emp_no'=>'required | unique:users',
            'cost'=>'required',
            'hr_rates'=>'required',
            'designation_id'=>'required',
            'email'=>'required | unique:users'
        ]);

        User::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'emp_no'=>$request->emp_no,
            'cost'=>$request->cost,
            'hr_rates'=>$request->hr_rates,
            'designation_id'=>$request->designation_id,
            'nic'=>$request->nic,
            'email'=>$request->email,
            'password'=> bcrypt('password')
        ]);

        return redirect('/staff');

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
