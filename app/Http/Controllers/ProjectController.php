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
use App\Models\ProjectOverheadsActual;
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
            'budget_number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'profit_ratio' => 'required',
            'quoted_price' => 'required'
        ]);

        $CUSTOMER = Customer::find($request->customer_id);

        $Project = Project::create([
            'customer_id'=>$request->customer_id,
            'customer_name'=>$CUSTOMER->name,
            'code'=>$CUSTOMER->code."-".$request->code,
            'quoted_price'=>$request->quoted_price,
            'budget_revenue'=>$request->quoted_price,
            'budget_number_of_hrs'=>$request->budget_number_of_hrs,
            'budget_cost'=>$request->budget_cost,
            'profit_ratio'=>$request->profit_ratio,
            'created_by_id'=>\Auth::id(),
            'updated_by_id'=>\Auth::id()
        ]);


        //assign jobs to projects
        foreach ($request->job_types as $item){
            ProjectJobType::create([
                'project_id'=>$Project->id,
                'jop_type_id'=>$item
            ]);
        }

        return \redirect('project/'.$Project->id);
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

    /**
     *Project Budget estimation are save in here
     */
    public function finalized(Request $request)
    {
        $HOURS = 0;
        $Project = null;

        $request->validate([
            'number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'quoted_price' => 'required',
            ]);

        $Project = Project::findOrFail($request->project_id);

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
                $HOURS = $HOURS + $item['hrs'];
            }
        }

        $Project->budget_cost = $request->budget_cost;
        $Project->quoted_price = $request->quoted_price;
        $Project->budget_number_of_hrs = $HOURS;
        $Project->budget_revenue = $request->quoted_price;
        $Project->profit_ratio = $request->profit_margin;

        if($Project->actual_revenue==0){
            $Project->actual_revenue = $request->quoted_price;
        }

        $Project->updated_by_id = \Auth::id();
        $Project->save();

        return redirect('project/'.$Project->id)->with('created',true);
    }

    public function actualCost($id)
    {
        $Project = Project::findOrFail($id);
        return view('admin.project.actual_cost',compact('Project'));
    }


    public function actualCostStore(Request $request){

        $actualCost = 0;
        $actualCostByOverhead = 0;

        $request->validate([
            'items' => 'required',
            'project_id' => 'required'
        ]);

        $Project = Project::findOrFail($request->project_id);

        if($Project){
            $actualCost =  $actualCost+$Project->actual_cost;
        }

        foreach ($request->items as $item){
            if($item['cost'] != null){
                ProjectOverheadsActual::create([
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

        if($Project){
            $ProjectActualOverHeads = ProjectOverheadsActual::where('project_id',$Project->id)->get();
            foreach ($ProjectActualOverHeads as $item){
                $actualCostByOverhead = $actualCostByOverhead+$item->cost;
            }
            if($actualCostByOverhead!=0){
                $Project->actual_cost_by_overhead = $actualCostByOverhead;
                $Project->save();
            }

        }

        return redirect('project/'.$Project->id)->with('created',true);



    }



}
