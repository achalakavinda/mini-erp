<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{


    public function workSheet(){
        $PageController = true;
        return view('admin.work_sheet.create',compact(['PageController']));
    }

    public function workSheetStore(Request $request){
        $Worksheet = new WorkSheetController();
        $Worksheet->store($request);
        return redirect()->back()->with('created');
    }

}
