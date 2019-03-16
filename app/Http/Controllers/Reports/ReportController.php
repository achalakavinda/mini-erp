<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //report landing page
    public function index(){
        return view('admin.reports.index');
    }

    //worksheet report
    public function ViewWorkSheetReport(){
        return view('admin.reports.worksheet_report');
    }

}
