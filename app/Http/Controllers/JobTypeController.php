<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:Job Type']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::CheckPermission(['Job Type | Registry']);
        $Rows = JobType::all();
        return view('admin.job_type.index',compact('Rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission(['Job Type | Creation']);
        return view('admin.job_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::CheckPermission(['Job Type | Creation']);
        $request->validate([
            'jobType' => 'required | min:3',
        ]);
        try{
            JobType::create([
                'jobType'=>$request->jobType,
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
        User::CheckPermission(['Job Type | Registry']);
        $JobType = JobType::findOrFail($id);
        return view('admin.job_type.edit',compact('JobType'));
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
        User::CheckPermission(['Job Type | Update']);
        $request->validate([
            'jobType' => 'required | min:3',
        ]);

        try{
            $JOBTYPE = JobType::find($id);
            if(!empty($JOBTYPE)){
                $JOBTYPE->jobType = $request->jobType;
                $JOBTYPE->description = $request->description;
                $JOBTYPE->save();
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
