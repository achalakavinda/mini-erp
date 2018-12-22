<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JobType;
use App\Models\Project;
use App\Models\ProjectCostType;
use App\Models\ProjectDesignation;
use App\Models\ProjectEmployee;
use App\Models\ProjectJobType;
use App\Models\ProjectOverhead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return view('admin.project.index',compact('Rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
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
            'number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'qouted_price' => 'required',
        ]);


        $CUSTOMER = Customer::find($request->customer_id);

        $Project = Project::create([
            'customer_id'=>$request->customer_id,
            'code'=>$request->code." - ".$CUSTOMER->code,
            'budget_cost'=>$request->budget_cost,
            'quoted_price'=>$request->qouted_price,
            'created_by_id'=>\Auth::id(),
            'updated_by_id'=>\Auth::id(),

        ]);


        //assign jobs to projects
        foreach ($request->job_types as $item){
            ProjectJobType::create([
                'project_id'=>$Project->id,
                'jop_type_id'=>$item
            ]);
        }
        return $this->estimation($Project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Project = Project::findOrFail($id);
        return view('admin.project.show',compact('Project'));
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

        if(isset($request->set_delete)){
            $Project = Project::find($id)->delete();
        }

        return redirect('project');
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

    public function estimation($id)
    {
        $Project = Project::findOrFail($id);
        return view('admin.project.estimation',compact('Project'));
    }

    public function finalized(Request $request)
    {

        $request->validate([
            'number_of_hrs' => 'required',
            'qouted_price' => 'required'
            ]);

        $Project = Project::find($request->project_id);

        if(isset($request->cost_row)){
            foreach ($request->cost_row as $item){

                ProjectOverhead::create([
                    'project_id'=>$Project->id,
                    'project_cost_type_id'=>$item['cost_type_id'],
                    'project_cost_type'=>$item['cost_type_name'],
                    'cost'=>$item['cost'],
                    'remarks'=>$item['remark'],
                    'created_by_id'=>\Auth::id(),
                    'updated_by_id'=>\Auth::id()
                ]);

            }
        }

        if(isset($request->designation_row)){
            foreach ($request->designation_row as $item) {
                ProjectDesignation::create([
                    'project_id'=>$Project->id,
                    'project_designation_id'=>$item['designation_id'],
                    'hr'=>$item['hrs'],
                    'hr_rates'=>$item['hr_rate'],
                    'total'=>$item['hrs']*$item['hr_rate'],
                    'created_by_id'=>\Auth::id(),
                    'updated_by_id'=>\Auth::id(),
                ]);
            }
        }

        $Project->budget_cost=$request->budget_cost;
        $Project->quoted_price=$request->qouted_price;
        $Project->profit_ratio=$request->profit_margin;
        $Project->updated_by_id = \Auth::id();
        $Project->save();

        return redirect('project/'.$Project->id)->with('created',true);
    }
}
