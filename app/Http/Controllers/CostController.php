<?php

namespace App\Http\Controllers;

use App\cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function store(Request $request){
        for($i=1;$i<=$request['number_of_inputs'];$i++){
//            $staff = executiveStaff::where('student_id', $request['student_id'.$i])->first();
//            if ($staff == null){
                 cost::create([
                    'subject' => $request['subject'.$i],
                    'unit' => $request['unit'.$i],
                    'cost' => $request['cost'.$i],
                    'requested_cost' => $request['requested_cost'.$i],
                    'approved_cost' => $request['approved_cost'.$i],
                     'project_id' => $request['project_id']
                ]);
//            }
//            else{
//                staffProject::create([
//                    'staff_id' => $staff->id,
//                    'project_id' => $request['project_id'],
//                    'post' => $request['post'.$i],
//                ]);
//            }
        }
        return redirect('/home');
//        return $request->all();
    }
}
