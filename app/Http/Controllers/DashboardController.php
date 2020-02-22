<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard');
//
//        if(Auth::user()->can(config('constant.Permission_Work_Sheet'))){
//            return redirect('/work-sheet/create');
//        }else if (Auth::user()->can(config('constant.Permission_Minor_Staff_Work_Sheet'))){
//            return redirect('/staff/work-sheet');
//        }else{
//            return redirect('/staff/profile/'.Auth::id());
//        }
    }
}
