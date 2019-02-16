<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user_permission = auth()->user()->hasAnyPermission('Dashboard');
        if($user_permission){
            return view('dashboard');
        }else{
            return view('staff-dashboard');
        }
    }
}
