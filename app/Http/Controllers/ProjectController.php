<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JobType;
use App\Models\Project;
use App\Models\ProjectEmployee;
use App\Models\ProjectJobType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rows = Project::all();

        return view('project.index',compact('Rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            'code' => 'required',
            'customer_id' => 'required',
            'job_types' => 'required',
            'details' => 'required',
        ]);

        $CUSTOMER = Customer::find($request->customer_id);

        $Project = Project::create([
            'customer_id'=>$request->customer_id,
            'code'=>$request->code." - ".$CUSTOMER->code,
            'budget_cost'=>$request->budget_cost,
            'quoted_price'=>$request->qouted_price,
        ]);

        $tempJobTypeID = 0;
        //assign jobs to projects
        foreach ($request->job_types as $item){
            $tempJobTypeID = $item;
            ProjectJobType::create([
                'project_id'=>$Project->id,
                'jop_type_id'=>$item
            ]);
        }

        //
        foreach ($request->details as $item){
            ProjectEmployee::create([
                'project_id'=>$Project->id,
                'job_type_id'=>$tempJobTypeID,
                'user_id'=>$item['employee_id'],
                'paying_hrs'=>$item['paying_hrs'],
                'volunteer_hrs'=>$item['volunteer_hrs'],
            ]);
        }


        return redirect('project/create')->with('created',true);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Projects = Project::findOrFail($id);
        return view('project.edit',compact('Projects'));
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
