<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerSector;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Project;
use App\Models\ProjectCostType;
use App\Models\ProjectDesignation;
use App\Models\ProjectEmployee;
use App\Models\ProjectJobType;
use App\Models\ProjectOverhead;
use App\Models\ProjectOverheadsActual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\HasCompanyScope;


class ProjectController extends Controller
{
    use HasCompanyScope;

    public function __construct()
    {
        $_string = 'permission:'.config('constant.Permission_Project').'|'.config('constant.Permission_Project_Assigned');
        $this->middleware([$_string]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::CheckPermission([config('constant.Permission_Project_Registry')]);
        $Projects = Project::ownedByCompany()->get();
        return view('admin.project.index',compact('Projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::CheckPermission([config('constant.Permission_Project_Creation')]);

        $Company = Company::userOwnedCompany()->pluck('code', 'id');
        $Customers = Customer::ownedByCompany()->pluck('name','id');
        $JobTypes = JobType::all()->pluck('jobType','id');
        $CustomerSector = CustomerSector::all()->pluck('name','id');

        return view('admin.project.create',compact(['Company','Customers','JobTypes','CustomerSector']));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Project_Creation')]);

         $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'company_id' => 'required|exists:companies,id',
        'job_type' => 'required|exists:job_types,id',
        'budget_number_of_hrs' => 'required|numeric',
        'budget_cost' => 'required|numeric',
        'p_y_quoted_price' => 'required|numeric',
        'profit_ratio' => 'required|numeric|min:10',
        'quoted_price' => 'required|numeric',
        'sector_id' => 'required|exists:customer_sectors,id',
    ]);

    $this->checkCompanyAccess($validated['company_id']);

        //fetch customer information
        $customer = Customer::ownedByCompany()->findOrFail($validated['customer_id']);
        $jobType = JobType::findOrFail($validated['job_type']);
        $sector = CustomerSector::findOrFail($validated['sector_id']);

        //Project Code
        $timeCode = now()->format('yM-d');
        $code = "{$customer->name}-{$jobType->name}{$timeCode}";


        //Check code for unique project code validations
        if (Project::ownedByCompany()->where('code', $code)->exists()) {
            return redirect()->back()->withErrors('Project code must be unique.');
        }

        if( $request->profit_ratio<10 )
        {
            return    \redirect()->back()->withErrors('Minimum mark up 10%');
        }

        $quotedPrice = $validated['budget_cost'] + ($validated['budget_cost'] * ($validated['profit_ratio'] / 100));

        //create project
        $project = Project::create([
        'company_id'            => $validated['company_id'],
        'customer_id'           => $validated['customer_id'],
        'customer_name'         => $customer->name,
        'code'                  => $code,
        'sector_id'             => $validated['sector_id'],
        'sector_name'           => $sector->name,
        'job_type_id'           => $jobType->id,
        'job_type_name'         => $jobType->jobType,
        'quoted_price'          => $quotedPrice,
        'budget_revenue'        => $quotedPrice,
        'budget_number_of_hrs'  => $validated['budget_number_of_hrs'],
        'budget_cost_by_overhead' => $validated['budget_cost'],
        'p_y_quoted_price'      => $validated['p_y_quoted_price'],
        'profit_ratio'          => $validated['profit_ratio'] / 100,
        'status_id'             => 1,
        'created_by_id'         => auth()->id(),
        'updated_by_id'         => auth()->id(),
    ]);

         if (User::CheckPermission(config('constant.Permission_Project_Creation_Assigned'))) {
        ProjectEmployee::create([
            'project_id' => $project->id,
            'user_id'    => auth()->id(),
        ]);
    }

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Web Route /project/{id}/staff
     * View User Project Assigning Interface
     */
    public function staffAllocation($id)
    {
        //check access control default templates
        User::CheckPermission([
            config('constant.Permission_Project_Staff'),
            config('constant.Permission_Project_Staff_Assigned')
        ]);

        $Project = Project::findOrFail($id);

        //validate specific access control
        if( !User::CheckPermission( config('constant.Permission_Project_Staff')) && User::CheckPermission( config('constant.Permission_Project_Staff_Assigned')) ) {
            User::CheckUserForProject($Project);
        }

        return view('admin.project.staff_allocation',compact('Project'));
    }

    /**
     * Web Route /project/{id}/staff/update
     * View User Project Assigning Update [Store | Update]
     */
    public function staffAllocationUpdate(Request $request,$id)
    {
        //validate for users
        $request->validate([
            'items' => 'required',
            ]);

        //check access control default templates
        User::CheckPermission([
            config('constant.Permission_Project_Staff'),
            config('constant.Permission_Project_Staff_Assigned')
        ]);

        $Project = Project::findOrFail($id);

        //validate specific access control
        if( !User::CheckPermission( config('constant.Permission_Project_Staff')) && User::CheckPermission( config('constant.Permission_Project_Staff_Assigned')) ) {
            User::CheckUserForProject($Project);
        }

        foreach ($request->items as $item)
        {
            $ProjectStaff = ProjectEmployee::get()->where('project_id',$Project->id)->where('user_id',$item['user_id'])->first();
            if(isset($item['assigned']))
            {
                if($ProjectStaff){
                    $ProjectStaff->project_id = $Project->id;
                    $ProjectStaff->user_id = $item['user_id'];
                    $ProjectStaff->save();
                }else{
                    ProjectEmployee::create([
                        'project_id'=>$Project->id,
                        'user_id'=>$item['user_id']
                    ]);
                }

            }else{
                if($ProjectStaff){
                    \DB::table('project_employees')->where('project_id',$Project->id)->where('user_id',$item['user_id'])->delete();
                }

            }
        }
        return \redirect()->back();
    }

    public function projectStatusStore(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Project_Setting')]);

        $request->validate([
            'project_status' => 'required',
            'project_id' => 'required'
        ]);

        $Project = Project::findOrFail($request->project_id);
        $Project->status_id = $request->project_status;
        $Project->save();

        return Redirect::back();
    }

    public function projectVariableUpdate(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Project_Setting')]);

        $request->validate([
            'profit_ratio' => 'required',
            'project_id' => 'required'
        ]);

        $Project = Project::findOrFail($request->project_id);

        if($request->profit_ratio < 10 && $Project->profit_ratio != $request->profit_ratio/100 ){
            return \redirect()->back();
        }

        $Project->profit_ratio = $request->profit_ratio/100;
        $Project->save();

        $Project_Budgeted_Work_Cost = 0;
        $Project_Budgeted_OverHead_Cost = 0;

        //project designation
        $Items = ProjectDesignation::where('project_id',$Project->id)->get();
        foreach ($Items as $item)
        {
            //variable hold the total overhead cost
            $Project_Budgeted_Work_Cost = $Project_Budgeted_Work_Cost + ($item->hr*$item->hr_rates);
        }

        $Items = ProjectOverhead::where('project_id',$Project->id)->get();
        foreach ($Items as $item)
        {
            //variable hold the total overhead cost
            $Project_Budgeted_OverHead_Cost = $Project_Budgeted_OverHead_Cost + $item->cost;
        }


        //budget and quoted price calculation
        $BudgetSum = $Project_Budgeted_Work_Cost +$Project_Budgeted_Work_Cost + $Project_Budgeted_OverHead_Cost;
        $QuotedSum = $BudgetSum + ($BudgetSum*$Project->profit_ratio);
        $Project = Project::findOrFail($request->project_id);
        $Project->budget_revenue = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->quoted_price = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->updated_by_id = \Auth::id();//set updated by parameter
        $Project->save();//save the updated values

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::CheckPermission([config('constant.Permission_Project_Show'),
            config('constant.Permission_Project_Registry_Assigned_Show')]);

        $Project = Project::findOrFail($id);

        if( !User::CheckPermission( config('constant.Permission_Project_Show')) && User::CheckPermission( config('constant.Permission_Project_Registry_Assigned_Show')) )
        {
            User::CheckUserForProject($Project);
        }

        return view('admin.project.show',compact('Project'));
    }

    /**
     * Show the form for editing the specified resource
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::CheckPermission([config('constant.Permission_Project_Setting')]);
        if(isset($request->set_delete))
        {
            $Project = Project::find($id)->delete();
        }
        return redirect('project');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *Project Budget estimation are save in here
     */
    public function budgetCost($id)
    {
        User::CheckPermission( [ config('constant.Permission_Project_Budget'), config('constant.Permission_Project_Budget_Assigned') ] );

        $Project = Project::findOrFail($id);

        if( !User::CheckPermission( config('constant.Permission_Project_Budget')) && User::CheckPermission( config('constant.Permission_Project_Budget_Assigned')) )
        {
            User::CheckUserForProject($Project);
        }

        return view('admin.project.budget_cost',compact('Project'));
    }

    /**
     * Actual Cost view
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actualCost($id)
    {
        User::CheckPermission([config('constant.Permission_Actual')]);
        $Project = Project::findOrFail($id);
        return view('admin.project.actual_cost',compact('Project'));
    }

    /**
     * Store Budget Cost
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function budgetCostStore(Request $request)
    {
        User::CheckPermission([ config('constant.Permission_Project_Budget_Creation'), config('constant.Permission_Project_Budget_Creation_Assigned') ]);

        $request->validate([
            'number_of_hrs' => 'required',
            'budget_cost' => 'required',
            'quoted_price' => 'required',
        ]);

        //budget cost variances
        $Project = Project::findOrFail($request->project_id);
        $Project_Budgeted_Work_Cost = 0;
        $Project_Budgeted_Work_Hours = 0;
        $Project_Budgeted_OverHead_Cost = 0;
        $Project_Budgeted_Profit_Margin = 0;

        if( !User::CheckPermission( config('constant.Permission_Project_Budget_Creation')) && User::CheckPermission( config('constant.Permission_Project_Budget_Creation_Assigned')) )
        {
            User::CheckUserForProject($Project);
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
                }
            }

            $Items = ProjectOverhead::where('project_id',$Project->id)->get();
            foreach ($Items as $item)
            {
                //variable hold the total overhead cost
                $Project_Budgeted_OverHead_Cost = $Project_Budgeted_OverHead_Cost + $item->cost;
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
                }
            }

            $Items = ProjectDesignation::where('project_id',$Project->id)->get();
            foreach ($Items as $item)
            {
                //variable hold the total overhead cost
                $Project_Budgeted_Work_Hours = $Project_Budgeted_Work_Hours + $item->hr;
                $Project_Budgeted_Work_Cost = $Project_Budgeted_Work_Cost + ($item->hr*$item->hr_rates);
            }
        }

        //budget and quoted price calculation
        $BudgetSum = $Project_Budgeted_Work_Cost + $Project_Budgeted_Work_Cost + $Project_Budgeted_OverHead_Cost;

        $QuotedSum = 0;

        if($request->profit_margin !=null && $request->profit_margin>0)
        {// this zero validation must be remove if u remove minimum profit margin to 0
            $QuotedSum = $BudgetSum + ($BudgetSum*($request->profit_margin/100));
        }else{
            $QuotedSum = $BudgetSum;
        }

        //update existing project values
        $Project->budget_number_of_hrs = $Project_Budgeted_Work_Hours;//budgeted number of working hours
        $Project->budget_cost_by_work = $Project_Budgeted_Work_Cost;//budgeted staff cost by work
        $Project->budget_cost_by_overhead = $Project_Budgeted_OverHead_Cost;//budgeted project overhead cost

        $Project->budget_revenue = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->quoted_price = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->profit_ratio = $request->profit_margin/100;//expected profit ratio

        $Project->updated_by_id = \Auth::id();//set updated by parameter
        $Project->save();//save the updated values
        //redirect to project estimation page back after submit data
        return redirect()->back()->with('created',true);
    }

    /**
     * Store Cost Store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actualCostStore(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Actual_Creation')]);
        $request->validate([
            'project_id' => 'required'
        ]);

        //this step is use to restrict resubmit values.
        $PROJECTOVERHEAD = \App\Models\ProjectOverheadsActual::where('project_id',$request->project_id)->get();

        if(!$PROJECTOVERHEAD->isEmpty())
        {
            return \redirect()->back();
        }

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

        if(isset($request->cost_row))
        {
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

    /**
     * Staff Designation Allocation view
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editStaffAllocationEstimation($id)
    {
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        $Project = Project::findOrFail($id);
        return view('admin.project.edit_budget_cost',compact('Project'));
    }

    /**
     * Edit Cost Type View
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCostType($id)
    {
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        $Project = Project::findOrFail($id);
        return view('admin.project.edit_cost_type',compact('Project'));
    }

    /**
     * Budget Designation Cost Update
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function editBudgetDesignationCost(Request $request)
    {
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        //Validator for update row
        $Validated = false;
        $Delete = false;

        $request->validate([
            'selected_row_id' => 'required',
            'selected_project_id' => 'required',
            'selected_designation_type_id' => 'required',
            'selected_hr_rates' => 'required',
            'selected_work_hrs' => 'required',
            'selected_total' => 'required',
        ]);

        if(isset($request->selected_row_delete)){
            $Delete = isset($request->selected_row_delete);
        }

        $ProjectDesignation = ProjectDesignation::findorFail($request->selected_row_id);
        $Project = Project::findorFail($request->selected_project_id);

        if($ProjectDesignation)
        {
            if($request->selected_project_id = $ProjectDesignation->project_id && $request->selected_row_id = $ProjectDesignation->id)
            {
                //if any validation after values found.
                $Validated = true;
            }else{
                return \redirect()->back()->withErrors('Error project validation, Please try again!');
            }
        }else{
            return \redirect()->back()->withErrors('Error project designation record not found, Please try again!');
        }

        $RUN = false;

        if($Validated && $Delete){
            //record deleted
            $ProjectDesignation->delete();
            $RUN = true;

        }else if($Validated){
            //Update project designation records
            $ProjectDesignation->hr = $request->selected_work_hrs;
            $ProjectDesignation->hr_rates = $request->selected_hr_rates;
            $ProjectDesignation->total = $request->selected_work_hrs*$request->selected_hr_rates;
            $ProjectDesignation->updated_by_id = \Auth::id();
            //save all records
            $ProjectDesignation->save();
            $RUN = true;
        }

        if($RUN){
            $this->reCalculateProjectBudget($Project);
        }

        return \redirect()->back();
    }

    /**
     * Store Budget Designation Cost
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function StoreNewBudgetDesignationCost(Request $request){
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        //validate post request
        $request->validate([
            'designation_row' => 'required',
            'project_id' => 'required'
        ]);

        $Project = Project::findOrFail($request->project_id);
        $Row = $request->designation_row;

        foreach ($Row as $item)
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
            }
        }

        $this->reCalculateProjectBudget($Project);


        //redirect to project estimation page back after submit data
        return redirect()->back()->with('created',true);
    }

    /**
     * Project Budget Cost Overhead Update
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function editBudgetCostType(Request $request){
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        $Validated = false;
        $Delete = false;

        $request->validate([
            'selected_row_id' => 'required',
            'selected_project_id' => 'required',
            'selected_cost_type' => 'required',
            'selected_cost' => 'required'
        ]);

        if(isset($request->selected_row_delete)){
            $Delete = isset($request->selected_row_delete);
        }

        $ProjectCostType = ProjectOverhead::findOrFail($request->selected_row_id);
        $Project = Project::findorFail($request->selected_project_id);

        if($ProjectCostType)
        {
            if($request->selected_project_id = $ProjectCostType->project_id && $request->selected_row_id = $ProjectCostType->id)
            {
                $Validated = true;
            }else{
                return \redirect()->back()->withErrors('Error project validation, Please try again!');
            }
        }else{
            return \redirect()->back()->withErrors('Error project designation record not found, Please try again!');
        }

        $RUN = false;

        if($Validated && $Delete){
            //record deleted
            $ProjectCostType->delete();
            $RUN = true;
        }else if($Validated){

            $ProjectCostType->project_cost_type = $request->selected_cost_type;
            $ProjectCostType->cost = $request->selected_cost;
            $ProjectCostType->remarks = $request->selected_remark;
            $ProjectCostType->updated_by_id = \Auth::id();
            $ProjectCostType->save();
            $RUN = true;

        }


        if($RUN){
            $this->reCalculateProjectBudget($Project);
        }

        return \redirect()->back();

    }

    /**
     * Store new Budget Overhead Cost
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function StoreNewBudgetCostType(Request $request){
        User::CheckPermission([config('constant.Permission_Project_Budget_Update')]);
        $request->validate([
            'project_id' => 'required',
            'cost_row' => 'required'
        ]);

        $Project = Project::findOrFail($request->project_id);
        $Row = $request->cost_row;

        $RUN = false;

        foreach ($Row as $item)
        {
            if($item['cost_type_name']!= null && $item['cost']!= null && $item['cost']>-1){

                ProjectOverhead::create([
                    'project_id'=>$Project->id,
                    'project_cost_type_id'=>$item['cost_type_id'],
                    'project_cost_type'=>$item['cost_type_name'],
                    'cost'=>$item['cost'],
                    'remarks'=>$item['remark'],
                    'created_by_id'=>\Auth::id(),
                    'updated_by_id'=>\Auth::id()
                ]);
                $RUN = true;
            }

        }

        if($RUN){
            $this->reCalculateProjectBudget($Project);
        }

        return \redirect()->back();
    }

    /**
     * Project Actual Cost Overhead Update
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editActualCostType(Request $request){
        User::CheckPermission([config('constant.Permission_Actual_Update')]);
        $Validated = false;
        $Delete = false;

        $request->validate([
            'selected_row_id' => 'required',
            'selected_project_id' => 'required',
            'selected_cost_type' => 'required',
            'selected_cost' => 'required'
        ]);

        if(isset($request->selected_row_delete)){
            $Delete = isset($request->selected_row_delete);
        }

        $Project = Project::findOrFail($request->selected_project_id);
        $ProjectActualCostType = ProjectOverheadsActual::findOrFail($request->selected_row_id);

        $RUN = false;
        $Validated = true;

        if($Validated && $Delete){
            //record deleted
            $ProjectActualCostType->delete();
            $RUN = true;
        }else if($Validated){

            $ProjectActualCostType->project_cost_type = $request->selected_cost_type;
            $ProjectActualCostType->cost = $request->selected_cost;
            $ProjectActualCostType->remarks = $request->selected_remark;
            $ProjectActualCostType->updated_by_id = \Auth::id();
            $ProjectActualCostType->save();
            $RUN = true;
        }

        if($RUN){

            $ProjectActualOverHeads = ProjectOverheadsActual::where('project_id',$Project->id)->get();
            $ActualCostByWork = 0;

            foreach ($ProjectActualOverHeads as $item){
                $ActualCostByWork = $ActualCostByWork+ $item['cost'];
            }
            $Project->actual_cost_by_overhead = $ActualCostByWork;
            $Project->save();
        }

        return \redirect()->back();
    }

    /**
     * Store new Actual Cost Overhead and recalculate Project Budget
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreNewActualCostType(Request $request){
        User::CheckPermission([config('constant.Permission_Actual_Update')]);
        $request->validate([
            'project_id' => 'required',
            'cost_row' => 'required'
        ]);
        $Run = false;

        $Project = Project::findOrFail($request->project_id);
        $Row = $request->cost_row;

        foreach ($Row as $item){
            if($item['cost_type_name']!= null && $item['cost']!= null && $item['cost']>-1){

                ProjectOverheadsActual::create([
                    'project_id'=>$Project->id,
                    'project_cost_type_id'=>$item['cost_type_id'],
                    'project_cost_type'=>$item['cost_type_name'],
                    'cost'=>$item['cost'],
                    'remarks'=>$item['remark'],
                    'created_by_id'=>\Auth::id(),
                    'updated_by_id'=>\Auth::id()
                ]);
                $Run = true;
            }
        }

        if($Run){

            $ProjectActualOverHeads = ProjectOverheadsActual::where('project_id',$Project->id)->get();
            $ActualCostByWork = 0;

            foreach ($ProjectActualOverHeads as $item){
                $ActualCostByWork = $ActualCostByWork+ $item['cost'];
            }
            $Project->actual_cost_by_overhead = $ActualCostByWork;
            $Project->save();
        }

        return \redirect()->back();

    }

    /**
     * Project Setting view
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings($id){
        User::CheckPermission([config('constant.Permission_Project_Setting')]);
        $Project = Project::findOrFail($id);
        return view('admin.project.settings',compact('Project'));
    }

    /**
     * Project budget recalculation logic
     * @param Project $Project
     */
    public function reCalculateProjectBudget(Project $Project){
        $Project_Budgeted_Work_Hours = 0;
        $Project_Budgeted_Work_Cost = 0;
        $Project_Budgeted_OverHead_Cost = 0;

        //project designation
        $Items = ProjectDesignation::where('project_id',$Project->id)->get();

        foreach ($Items as $item)
        {
            //variable hold the total overhead cost
            $Project_Budgeted_Work_Hours = $Project_Budgeted_Work_Hours + $item->hr;
            $Project_Budgeted_Work_Cost = $Project_Budgeted_Work_Cost + ($item->hr*$item->hr_rates);
        }

        $Items = ProjectOverhead::where('project_id',$Project->id)->get();

        foreach ($Items as $item)
        {
            //variable hold the total overhead cost
            $Project_Budgeted_OverHead_Cost = $Project_Budgeted_OverHead_Cost + $item->cost;
        }

        $BudgetSum = $Project_Budgeted_Work_Cost + $Project_Budgeted_Work_Cost + $Project_Budgeted_OverHead_Cost;
        $QuotedSum = $BudgetSum + ($BudgetSum*$Project->profit_ratio);

        //update existing project values
        $Project->budget_number_of_hrs = $Project_Budgeted_Work_Hours;//budgeted number of working hours
        $Project->budget_cost_by_work = $Project_Budgeted_Work_Cost;//budgeted staff cost by work
        $Project->budget_cost_by_overhead = $Project_Budgeted_OverHead_Cost;//budgeted project overhead cost
        $Project->budget_revenue = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->quoted_price = $QuotedSum;//budget revenue and the quoted price is equal
        $Project->updated_by_id = \Auth::id();//set updated by parameter
        $Project->save();//save the updated values
    }

}
