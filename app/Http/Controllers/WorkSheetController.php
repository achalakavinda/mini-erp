<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\WorkSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WorkSheet = WorkSheet::all();
        return view('work_sheet.index',compact('WorkSheet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('work_sheet.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ROWS = $request->row;

        $request->validate([
            'project_id' => 'required',
            'user_id' => 'required',
            'user_id' => 'required',
            'date' => 'required',
            'row' => 'required'
        ]);



        foreach ($ROWS as $row){

            $diffInMin = $this->timeDiff($row['from'],$row['to']);
            $work_hr = $this->convertToHoursMins($diffInMin);

            $time_slot_id= -999;

            if(!empty($row['time_slot_id'])){
                $time_slot_id= $row['time_slot_id'];
            }

            WorkSheet::create([
                'date'=>$request->date,
                'customer_id'=>$row['company'],
                'user_id'=>$request->user_id,
                'project_id'=>$request->project_id,
                'job_type_id'=>$row['job_type_id'],
                'time_slot_id'=>$time_slot_id,
                'from'=>$row['from'],
                'to'=>$row['to'],
                'work_hrs'=>$work_hr,
                'hr_rate'=>1,
                'hr_cost'=>1,
                'remark'=>$row['remark']
            ]);

        }

        return redirect()->back();


    }





    public function timeDiff($from,$to){
        $startTime = Carbon::parse($to);
        $finishTime = Carbon::parse($from);
        return $totalDuration = $finishTime->diffInMinutes($startTime);
    }

    function convertToHoursMins($time) {
        $format = '%02d:%02d';
        if ($time < 1) {
            return;
        }
        $hours = $time / 60;
        return $hours;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
