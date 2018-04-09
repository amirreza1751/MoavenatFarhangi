<?php

namespace App\Http\Controllers;

use App\executiveStaff;
use App\staffProject;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function store(Request $request){
        for($i=1;$i<=$request['number_of_inputs'];$i++){
            $staff = executiveStaff::where('student_id', $request['student_id'.$i])->first();
            if ($staff == null){
                $newStaff = executiveStaff::create([
                    'fname' => $request['name'.$i],
                    'student_id' => $request['student_id'.$i],
                    'phone_number' => $request['phone_number'.$i],
                    'field' => $request['field'.$i],
                ]);
                staffProject::create([
                    'staff_id' => $newStaff->id,
                    'project_id' => $request['project_id'],
                    'post' => $request['post'.$i],
                ]);
            }
            else{
                staffProject::create([
                    'staff_id' => $staff->id,
                    'project_id' => $request['project_id'],
                    'post' => $request['post'.$i],
                ]);
            }
        }
        return view('createCost')->with('project_id', $request['project_id']);
    }


    public function forum_staff_store(Request $request){
        for($i=1;$i<=$request['number_of_inputs'];$i++){
            $staff = executiveStaff::where('student_id', $request['student_id'.$i])->first();
            if ($staff == null){
                $newStaff = executiveStaff::create([
                    'fname' => $request['name'.$i],
                    'student_id' => $request['student_id'.$i],
                    'phone_number' => $request['phone_number'.$i],
                    'field' => $request['field'.$i],
                    'votes' => $request['vote'.$i],
                    'forum_post' => $request['post'.$i],
                    'forum_id' => $request['forum_id'],
                ]);

            }
            else{
                $staff->votes = $request['vote'.$i];
                $staff->forum_post = $request['post'.$i];
                $staff->forum_id = $request['forum_id'];
                $staff->save();
            }
        }
        return redirect('/forums');
    }
}
