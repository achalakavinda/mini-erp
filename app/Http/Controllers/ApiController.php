<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Designation;
use App\Models\JobType;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkCodes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function GetProjectJobTypeByID($id){
        try{
            $PJ = \App\Models\Project::find($id);
            $PJT = \App\Models\ProjectJobType::where('project_id',$id)->get();
            $Job_Type =[];
            foreach ($PJT as $project){
                $Job_Type [] = \App\Models\JobType::select(['id','jobType'])->find($project->jop_type_id);
            }

            $Arr = [
                'status'=>"ok",
                'message'=>"project job types are fetch",
                'project'=>$PJ,
                'job_types'=>$Job_Type
            ];
        }catch (Exception $e){
            $Arr = [
                'status'=>"false",
                'message'=>$e->getMessage(),
                'project'=>[],
                'job_types'=>[]
            ];
        }

        return $Arr;
    }

    public function GetProjectDetailsByID($id,$user_id,$date){
        try{
            $PJ = \App\Models\Project::find($id);
            $PJT = \App\Models\ProjectJobType::where('project_id',$id)->get();
            $PJCUS = [];
            if(!empty($PJ)){
                $PJCUS = Customer::select(['id','name','code'])->find($PJ->customer_id);
            }
            $Job_Type =[];
            foreach ($PJT as $project){
                $Job_Type [] = \App\Models\JobType::select(['id','jobType'])->find($project->jop_type_id);
            }
            $DATE_VAR = date_format(date_create($date),"Y-m-d");
            $WORKSHEETRECORD = \App\Models\WorkSheet::where(['date'=>$DATE_VAR,'user_id'=>$user_id])->get();

            $WORKARRAY =[];

            if(!empty($WORKSHEETRECORD)){
                foreach ($WORKSHEETRECORD as $row){
                    $IN_CUM = Customer::find($row->customer_id);
                    $IN_JOB = JobType::find($row->job_type_id);
                    if($IN_CUM){
                        $IN_CUM = $IN_CUM->name;
                    }
                    if($IN_JOB){
                        $IN_JOB = $IN_JOB->jobType;
                    }

                    $PJTNAME = null;
                    if($row->project_id == null){
                        $PJTNAME = WorkCodes::find($row->work_code_id)->name;
                    }else{

                        $PJTNAME = Project::find($row->project_id);
                        if($PJTNAME==null){
                            $PJTNAME = 'Project Deleted';
                        }else{
                            $PJTNAME = $PJTNAME->code;
                        }
                    }

                    $arr = [
                        'id'=>$row->id,
                        'date'=>$row->date,
                        'from'=>$row->from,
                        'to'=>$row->to,
                        'project_id'=>$row->project_id,
                        'job_type_id'=>$row->job_type_id,
                        'company'=>$IN_CUM,
                        'job_type_name'=>$IN_JOB,
                        'project_value'=>$PJTNAME,
                        'remark'=>$row->remark
                    ];
                    $WORKARRAY[] = $arr;
                }
            }

            $Arr = [
                'status'=>"ok",
                'message'=>"project job types are fetch",
                'customer'=>$PJCUS,
                'project'=>$PJ,
                'job_types'=>$Job_Type,
                'worksheet'=>$WORKARRAY
            ];
        }catch (Exception $e){
            $Arr = [
                'status'=>"false",
                'message'=>$e->getMessage(),
                'customer'=>[],
                'project'=>[],
                'job_types'=>[],
                'worksheet'=>[]
            ];
        }

        return $Arr;
    }

    public function GetDesignation($id){
        $arr = [];

        try{
            $designation = Designation::findOrFail($id);
            $arr = [
                'status'=>"ok",
                'designation'=>$designation
            ];

        }catch (\Exception $e){

            $arr = [
                'status'=>"ok",
                'designation'=>[]
            ];

        }

        return $arr;
    }

    //        api/staff/designation
    public function getStaffByDesignation($id){
        $arr = [];
        try{
            $staff = User::where('designation_id',$id)->select(['id','name','hr_rates','designation_id'])->get();
            $arr = [
                'status'=>"ok",
                'designation'=>$staff
            ];

        }catch (\Exception $e){

            $arr = [
                'status'=>"ok",
                'designation'=>[],
                'msg'=>$e->getMessage()
            ];

        }

        return $arr;
    }

}
