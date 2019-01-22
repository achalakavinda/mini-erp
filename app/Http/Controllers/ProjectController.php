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
            'code' => 'required | unique:projects',
            'customer_id' => 'required',
            'job_types' => 'required',
            'budget_number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'profit_ratio' => 'required',
            'quoted_price' => 'required'
        ]);
        //fetch customer information
        $CUSTOMER = Customer::findOrFail($request->customer_id);
        //Project Code
        $code = $CUSTOMER->code."-".$request->code;
        //Check code for unique project code validations
        $CheckCode = Project::where('code',$code)->first();
        if($CheckCode){
            return    \redirect()->back()->withErrors('*Code must be unique');
        }
        //create project
        $Project = Project::create([
            'customer_id'=>$request->customer_id,
            'customer_name'=>$CUSTOMER->name,
            'code'=>$code,
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
        $request->validate([
            'number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'quoted_price' => 'required',
        ]);

        //check administrative overheads requirements
        $CalculateAdministrativeOverheads = isset($request->check_administrative_overhead);
        $AdministrativeOverheadsPercentage = 100;
        //check for preset administrative overheads
        if($request->administrative_overhead_percentage)
        {
            $AdministrativeOverheadsPercentage = $request->administrative_overhead_percentage;
        }

        //budget cost variances
        $Project = Project::findOrFail($request->project_id);
        $Project_Budgeted_Work_Cost = 0;
        $Project_Budgeted_Work_Hours = 0;
        $Project_Budgeted_OverHead_Cost = 0;
        $Project_Budgeted_Profit_Margin = 0;

        //fetch existing project values for calculations
        if($Project!=null)
        {
            $Project_Budgeted_OverHead_Cost = $Project->budget_cost_by_overhead;
            $Project_Budgeted_Work_Cost = $Project->budget_cost_by_work;
        }

        if(isset($request->cost_row))
        {
            foreach ($request->cost_row as $item)
            {
                if($item['cost']!=null && $item['cost']!=0)
                {
                    ProjectOverhead::create([
                        'project_id'=>$Project->id,
                        'project_cost_type_id'=>$item['cost_type_id'],
                        'project_cost_type'=>$item['cost_type_name'],
                        'cost'=>$item['cost'],
                        'remarks'=>$item['remark'],
                        'created_by_id'=>\Auth::id(),
                        'updated_by_id'=>\Auth::id()
                    ]);
                    //variable hold the total overhead cost
                    $Project_Budgeted_OverHead_Cost = $Project_Budgeted_OverHead_Cost + $item['cost'];
                }
            }
        }

        if(isset($request->designation_row))
        {
            foreach ($request->designation_row as $item)
            {
                if($item['hrs']!= null && $item['hrs']>0 && $item['hr_rate']!=null && $item['hr_rate']>0)
                {
                    ProjectDesignation::create([
                        'project_id'=>$Project->id,
                        'project_designation_id'=>$item['designation_id'],
                        'hr'=>$item['hrs'],
                        'hr_rates'=>$item['hr_rate'],
                        'total'=>$item['hrs']*$item['hr_rate'],
                        'created_by_id'=>\Auth::id(),
                        'updated_by_id'=>\Auth::id(),
                    ]);
                    $Project_Budgeted_Work_Hours = $Project_Budgeted_Work_Hours + $item['hrs'];
                    $Project_Budgeted_Work_Cost = $Project_Budgeted_Work_Cost + ($item['hrs']*$item['hr_rate']);
                }
            }
        }

        //budget and quoted price calculation
        $BudgetSum = $Project_Budgeted_Work_Cost + $Project_Budgeted_OverHead_Cost;

        if($CalculateAdministrativeOverheads)
        {
            $val = ($Project_Budgeted_Work_Cost*$AdministrativeOverheadsPercentage);
            $Project_Budgeted_OverHead_Cost = $Project_Budgeted_OverHead_Cost + ($Project_Budgeted_Work_Cost*$AdministrativeOverheadsPercentage);
            $BudgetSum = $Project_Budgeted_Work_Cost+$Project_Budgeted_OverHead_Cost;

            ProjectOverhead::create([
                'project_id'=>$Project->id,
                'project_cost_type'=>"Administrative Overheads",
                'cost'=>$val,
                'remarks'=>'Overhead calculated by Staff cost * Overhead %',
                'created_by_id'=>\Auth::id(),
                'updated_by_id'=>\Auth::id()
            ]);
        }

        $QuotedSum = 0;
        if($request->profit_margin!=null && $request->profit_margin>0)
        {
            $QuotedSum = $BudgetSum + ($BudgetSum*$request->profit_margin);
        }else
            {
            $QuotedSum = $BudgetSum;
        }

        //update existing project values
        $Project->budget_number_of_hrs = $Project_Budgeted_Work_Hours;//budgeted number of working hours
        $Project->budget_cost_by_work = $Project_Budgeted_Work_Cost;//budgeted staff cost by work
        $Project->budget_cost_by_overhead = $Project_Budgeted_OverHead_Cost;//budgeted project overhead cost
        $Project->budget_cost = $BudgetSum;//sum of budgeted cost

        $Project->budget_revenue = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->quoted_price = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->profit_ratio = $request->profit_margin;//expected profit ratio

        if($Project->actual_revenue==0)
        {
            $Project->actual_revenue = $QuotedSum;
        }

        $Project->updated_by_id = \Auth::id();//set updated by parameter
        $Project->save();//save the updated values
        //redirect to project estimation page back after submit data
        return redirect('project/'.$Project->id.'/estimation')->with('created',true);
    }



    public function actualCost($id)
    {
        $Project = Project::findOrFail($id);
        return view('admin.project.actual_cost',compact('Project'));
    }


    public function actualCostStore(Request $request)
    {
        $request->validate([
            'project_id' => 'required'
        ]);

        $actualCost = 0;
        $actualCostByOverhead = 0;

        $Project = Project::findOrFail($request->project_id);

        if($Project)
        {
            $actualCost =  $actualCost+$Project->actual_cost;
        }

        foreach ($request->items as $item)
        {
            if($item['cost'] != null)
            {
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

        foreach ($request->cost_row as $item)
        {
            if($item['cost'] != null)
            {
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

        if($Project)
        {
            $ProjectActualOverHeads = ProjectOverheadsActual::where('project_id',$Project->id)->get();
            foreach ($ProjectActualOverHeads as $item)
            {
                $actualCostByOverhead = $actualCostByOverhead+$item->cost;
            }
            if($actualCostByOverhead!=0)
            {
                $Project->actual_cost_by_overhead = $actualCostByOverhead;
                $Project->save();
            }

        }

        return redirect('project/'.$Project->id.'/actual-cost')->with('created',true);
    }


    public function editStaffAllocationEstimation($id)
    {

    }

    public function editCostType($id)
    {

    }

}
