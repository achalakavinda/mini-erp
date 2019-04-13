<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\DayType;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.holidays.index');
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
        foreach ($request->row as $item){
            $date = $item['date'];
            $day_type_id = $item['day_type'];
            $description = $item['description'];

            $Day = Day::where('date',$date)->first();
            $DayType = DayType::findOrFail($day_type_id);

            if($Day!= null)
            {
                $Day->type_name = $DayType->name;
                $Day->type_id = $DayType->id;
                $Day->description = $description;
                $Day->date = $date;
                $Day->workable = $DayType->workable;
                $Day->save();

            }else
                {
                Day::create([
                    'type_name'=>$DayType->name,
                    'type_id'=>$DayType->id,
                    'description'=>$description,
                    'date'=>$date,
                    'workable'=>$DayType->workable
                ]);
            }

        }

       return \Redirect::back();
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
