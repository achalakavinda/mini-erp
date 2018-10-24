<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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

    public function GetProjectDetailsByID($id){
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

            $Arr = [
                'status'=>"ok",
                'message'=>"project job types are fetch",
                'customer'=>$PJCUS,
                'project'=>$PJ,
                'job_types'=>$Job_Type
            ];
        }catch (Exception $e){
            $Arr = [
                'status'=>"false",
                'message'=>$e->getMessage(),
                'customer'=>[],
                'project'=>[],
                'job_types'=>[]
            ];
        }

        return $Arr;
    }

}
