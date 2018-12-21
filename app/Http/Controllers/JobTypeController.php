<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
