<?php

namespace App\Http\Controllers\SpreadSheet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpreadSheetController extends Controller
{
    //spread sheet landing page
    public function index(){

        return view('admin.spread_sheet.index');
    }
}
