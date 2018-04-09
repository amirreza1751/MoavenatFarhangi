<?php

namespace App\Http\Controllers;

use App\college;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CollegeController extends Controller
{
    public function add(){
        return view('createCollege');
    }
    public function store(Request $request){
        $this->validate(request(), [
           'name' => 'required|unique:colleges,name'
        ]);
        college::create([
            'name' => $request['name']
        ]);

//        Log::info("create college");
//        return college::create([
//            'name' => $request['name']
//        ])->toSql();
        return redirect('/colleges');

    }

    public function index(){
        $colleges = college::all();
        return view('colleges', compact('colleges'));
    }
}
