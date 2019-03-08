<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateArray = [Carbon::now()->format('Y-m-d')];

        $from = Input::get('from');
        $to = Input::get('to');

        if($from!=null && $to!=null)
        {
            $to = Carbon::parse($to);
            if(!$to->lessThanOrEqualTo(Carbon::now())){
                return \Redirect::back()->withErrors(['Invalid Range..']);
            }
            $dateArray=$this->getDatesFromRange($from,$to);
        }
        $Users = User::all();
        return view('admin.attendance.index',compact(['dateArray','Users']));
    }

    public function sendEmailIndex(Request $request){
        $request->validate([
            'row'=>'required'
        ]);
        $Rows = $request->row;
        return view('admin.attendance.sendEmailIndex',compact('Rows'));
    }

    public function sendEmailToMissingAttendance(Request $request){
        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new \DateInterval('P1D');
        $realEnd = new \DateTime($end);
        $realEnd->add($interval);
        $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
        foreach($period as $date) {
            $array[] = $date->format($format);
        }
        return $array;
    }

}
