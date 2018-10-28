<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JobType;
use App\Models\Project;
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

    public function GetProjectDetailsByID($id,$user_id){
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

            $WORKSHEETRECORD = \App\Models\WorkSheet::where(['date'=>date("Y-m-d"),'user_id'=>$user_id])->get();

            $WORKARRAY =[];

            if(!empty($WORKSHEETRECORD)){
                foreach ($WORKSHEETRECORD as $row){
                    $arr = [
                        'id'=>$row->id,
                        'date'=>$row->date,
                        'from'=>$row->from,
                        'to'=>$row->to,
                        'project_id'=>$row->project_id,
                        'job_type_id'=>$row->job_type_id,
                        'company'=>Customer::find($row->customer_id)->name,
                        'job_type_name'=>JobType::find($row->job_type_id)->jobType,
                        'project_value'=>Project::find($row->project_id)->code,
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

}
