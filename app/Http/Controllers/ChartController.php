<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function showCharts(){
        $counter['amuzeshi'] = project::where('type', 'آموزشی')->get()->count();
        $counter['tarviji'] = project::where('type', 'ترویجی')->get()->count();
        return view('charts', compact('counter'));
    }
}
