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
            'date_joined'=>'required',
            'nic'=>'required',
            'designation_id'=>'required',
            'emp_no'=>'required | unique:users',
            'cost'=>'required',
            'hr_rates'=>'required',
            'designation_id'=>'required',
            'email'=>'required | unique:users'
        ]);

        User::create([
            'name'=>$request->name,
            'date_joined'=>$request->date_joined,
            'mobile'=>$request->mobile,
            'residence'=>$request->residence,
            'hometown_district_id'=>$request->hometown_district_id,
            'hometown_city'=>$request->hometown_city,
            'cmb_location_district'=>$request->cmb_location_district,
            'cmb_city'=>$request->cmb_city,
            'address'=>$request->address,
            'emp_no'=>$request->emp_no,
            'epf_no'=>$request->epf_no,
            'designation_id'=>$request->designation_id,
            'email'=>$request->email,
            'nic'=>$request->nic,
            'ca_agree_no'=>$request->ca_agree_no,
            'ca_training_period_from'=>$request->ca_training_period_from,
            'ca_training_period_to'=>$request->ca_training_period_to,
            'ca_training'=>$request->ca_training,
            'basic_sal'=>$request->basic_sal,
            'epf_cost'=>$request->epf_cost,
            'etf_cost'=>$request->etf_cost,
            'allowance_cost'=>$request->allowance_cost,
            'gratuity_cost'=>$request->gratuity_cost,
            'other_cost'=>$request->other_cost,
            'cost'=>$request->cost,
            'hr_rates'=>$request->hr_rates,
            'hr_billing_rates'=>$request->hr_billing_rates,
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
     * show profile
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id){

        $User = User::findOrFail($id);
        return view('staff.profile.profile',compact('User'));
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
        return redirect()->back()->with('created',true);
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
