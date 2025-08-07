<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CusSector;
use App\Models\CusService;
use App\Models\Location;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HasCompanyScope;

class LocationController extends Controller
{
    use HasCompanyScope;

    public function __construct()
    {
        $this->middleware(['permission:'.config('constant.Permission_Customer')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::CheckPermission([config('constant.Permission_Customer_Registry')]);
        $Locations = Location::ownedByCompany()->paginate(10);
        return view('admin.location.index',compact('Locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission([config('constant.Permission_Customer_Creation')]);
        $Company = Company::userOwnedCompany()->pluck('code', 'id');
        return view('admin.location.create',compact('Company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Customer_Creation')]);
        
        $validated = $request->validate([
           'name'=>'required',
           'email'=>'required',
           'code'=>'nullable',
            'dob'=>'nullable',
            'contact'=>'nullable',
            'contact_1'=>'nullable',
            'contact_2'=>'nullable',
            'contact_3'=>'nullable',
            'file_no'=>'nullable',
            'address_1'=>'nullable',
            'address_2'=>'nullable',
            'address_3'=>'nullable',
            'fax_number'=>'nullable',
            'secretary_id'=>'nullable',
            'date_of_incorporation'=>'nullable',
            'tin_no'=>'nullable',
            'vat_no'=>'nullable',
            'nic'=>'nullable',
            'passport'=>'nullable',
            'ceo'=>'nullable|string',
            'ceo_contact'=>'nullable',
            'ceo_email'=>'nullable',
            'cfo'=>'nullable',
            'cfo_contact'=>'nullable',
            'cfo_email'=>'nullable',
            'website'=>'nullable',
            'location'=>'nullable',
            'description'=>'nullable',
            'company_id' => 'required|exists:companies,id',
        ]);

        $this->checkCompanyAccess($request->company_id);

        $validated['created_by'] = Auth::id();
        $validated['updated_by'] = Auth::id();

        try{

            $Customer = Customer::create($validated);

            if($request->service_id){
                foreach ($request->service_id as $item){
                    CusService::create([
                        'customer_id'=> $Customer->id,
                        'service_id'=>$item
                    ]);
                }
            }

            if($request->sector_id){
                foreach ($request->sector_id as $item){
                CusSector::create([
                    'customer_id'=> $Customer->id,
                    'sector_id'=>$item
                ]);
            }}

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
        User::CheckPermission([config('constant.Permission_Customer_Registry')]);
        $Customer = Customer::find($id);
        return view('admin.customer.show',compact('Customer'));
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
        User::CheckPermission([config('constant.Permission_Customer_Update')]);

        $request->validate([
            'name'=>'required',
        ]);

        try{

            $Customer = Customer::find($id);

            if(!empty($Customer)){
                $Customer->name = $request->name;
                $Customer->code = $request->code;
                $Customer->contact = $request->contact;
                $Customer->email = $request->email;
                $Customer->file_no = $request->file_no;
                $Customer->address_1=$request->address_1;
                $Customer->address_2=$request->address_2;
                $Customer->address_3=$request->address_3;
                $Customer->contact_1=$request->contact_1;
                $Customer->contact_2=$request->contact_2;
                $Customer->contact_3=$request->contact_3;
                $Customer->fax_number=$request->fax_number;
                $Customer->secretary_id=$request->secretary_id;
                $Customer->date_of_incorporation=$request->date_of_incorporation;
                $Customer->tin_no=$request->tin_no;
                $Customer->vat_no=$request->vat_no;
                $Customer->nic = $request->nic;
                $Customer->passport=$request->passport;
                $Customer->dob=$request->dob;
                $Customer->ceo=$request->ceo;
                $Customer->ceo_contact=$request->ceo_contact;
                $Customer->ceo_email=$request->ceo_email;
                $Customer->cfo=$request->cfo;
                $Customer->cfo_contact=$request->cfo_contact;
                $Customer->cfo_email=$request->cfo_email;
                $Customer->website=$request->website;
                $Customer->service_id=$request->service_id;
                $Customer->sector_id=$request->sector_id;
                $Customer->location=$request->location;
                $Customer->description=$request->description;
                $Customer->updated_by=\Auth::id();
                $Customer->save();
            }else{
                return redirect()->back()->with(['created'=>'error','message'=>"Please check fields again!"]);
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
