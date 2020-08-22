<?php

namespace App\Http\Controllers;

use App\Models\CaTraining;
use App\Models\CmbLocationDistrict;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\HometownDistrict;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:'.config('constant.Permission_Staff') ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        User::CheckPermission([ config('constant.Permission_Staff_Registry') ]);
        $Employees = Employee::all();
        return view('admin.staff.index',compact('Employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        User::CheckPermission([ config('constant.Permission_Staff_Creation') ]);

        $Designations = Designation::all()->pluck('designationType','id');
        $CA_TRAINGINS = CaTraining::all()->pluck('name','id');
        $CM_LOCATION_DISTRICTS = CmbLocationDistrict::all()->pluck('name','id');
        $HOMETOWN_DISTRICTS = HometownDistrict::all()->pluck('name','id');

        return view('admin.staff.create',compact(['Designations','CA_TRAINGINS','CM_LOCATION_DISTRICTS','HOMETOWN_DISTRICTS']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::CheckPermission([ config('constant.Permission_Staff_Creation') ]);

        $request->validate([
            'name'=>'required',
            'nic'=>'required',
            'designation_id'=>'required',
            'emp_no'=>'required | unique:employees',
            'basic_sal'=>'required',
            'cost'=>'required',
            'hr_rates'=>'required',
            'email'=>'required | unique:users',
        ]);


        try {

            $user =  User::create([
                'created_by'=>\Auth::id(),
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> bcrypt($request->email)
            ]);

            Employee::create([
                'user_id'=>$user->id,
                'created_by'=>\Auth::id(),
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
                'hr_billing_rates'=>$request->hr_billing_rates
            ]);

            $user->assignRole( config('constant.ROLE_SUPER_STAFF') );

        }catch (\Exception $exception){
            return redirect()
                ->back()
                ->with(['created'=>'error','message'=>$exception->getMessage()]);
        }
        return redirect()
            ->back()
            ->with(['created'=>'success','message'=>'Successfully create!']);
    }

    public function resetPassword(Request $request,$id)
    {
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required',
            're_password'=>'required'
        ]);

        $User = User::findOrFail($id);
        $hashedPassword  = $User->password;

        if (\Hash::check($request->old_password, $hashedPassword))
        {

            if($request->new_password === $request->re_password)
            {
                $User->password = bcrypt($request->new_password);
                $User->save();
                return back()->withErrors(['Password Reset!']);
            }else
            {
                return back()->withErrors(['Password are mismatched']);
            }
        }else{
            return back()->withErrors(['Please enter the correct old password!']);
        }
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
    public function profile($id)
    {
        User::CheckPermission([ config('constant.Permission_Profile') ]);
        $User = User::findOrFail($id);
        $Employee = Employee::find($id);

        return view('admin.staff.profile.profile',compact(['User','Employee']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::findOrFail($id);
        $Employee = Employee::where('user_id',$id)->firstorFail();
        $Designations = Designation::all()->pluck('designationType','id');
        $CA_TRAINGINS = CaTraining::all()->pluck('name','id');
        $CM_LOCATION_DISTRICTS = CmbLocationDistrict::all()->pluck('name','id');
        $HOMETOWN_DISTRICTS = HometownDistrict::all()->pluck('name','id');

        return view('admin.staff.edit',compact(['Employee','Designations','CA_TRAINGINS','CM_LOCATION_DISTRICTS','HOMETOWN_DISTRICTS']));
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
        User::CheckPermission([ config('constant.Permission_Staff_Update') ]);
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
