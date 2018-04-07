<?php

namespace App\Http\Controllers;

use App\forum;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index(){
        $projects = project::with('forum')->get();
        $role =  Auth::user()->role()->first()->name;
        return view('projects', compact('projects', 'role'));
    }

    public function store(Request $request)
    {
        $forum = forum::where('name', $request['forum_name'])->first();
//        $date_time = $request['start_date'] . " " . $request['start_time'];

        $project = Project::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'place' => $request['place'],
            'level' => $request['level'],
            'capacity' => $request['capacity'],
            'master' => $request['master'],
            'start_date' => DB::raw("gdatestr('". $request['start_date'] ."')"),
            'start_time' => $request['start_time'],
            'end_date' => DB::raw("gdatestr('". $request['end_date'] ."')"),
            'end_time' => $request['end_time'],
            'total_hours' => $request['total_hours'],
//            'cost' => $request['cost'],
//            'start_date' => $request['start_date'], ////////////////////////////////////////////
//            'end_date' => $request['end_date'],
//            'total_hours' => $request['total_hours'],
            'forum_id' => $forum->id,
            'purpose' => $request['purpose'],
            'sideway_programs' => $request['sideway_programs'],
            'detailed_programs' => $request['detailed_programs'],
            'innovation' => $request['innovation'],
            'sponsors' => $request['sponsors'],
            'description' => $request['description'],
            'letter_number' => $request['letter_number'],
            'manager_sign' => $request['manager_sign'],
            'expert_sign' => $request['expert_sign'],
        ]);
//            DB::raw("UPDATE `projects` SET `start_date`= gdatestr('$date_time') WHERE (`id`='$project->id')");
//        for ($i = 1; $i < sizeof($request); $i++){
//            cost::create([
//                'subject' => $request[$i]['subject'],
//                'unit' => $request[$i]['unit'],
//                'cost' => $request[$i]['cost'],
//                'requested_cost' => $request[$i]['requested_cost'],
//                'approved_cost' => $request[$i]['approved_cost'],
//                'project_id' => $project->id,
//            ]);
//        }
//        $request = $request->toArray();
//        return $request->all();
//        return $request['project']->all();
//        return response()->json('"a" : {\"project\" : [{\"name\":\"anjoman SE\", \"manager\":\"mamad\", \"number\":\"09121260587\", \"college_id\":\"1\"}, {\"name\":\"anjoman SE\", \"manager\":\"mamad\", \"number\":\"09121260587\", \"college_id\":\"1\"}]}',  200);

        return view('createStaff' , compact('project'));
    }
    public function test(Request $request){
        $test =  Auth::user()->role()->first()->name;
        return $test;
    }
    public function add(Request $request){
        $forums = forum::all();
        return view('createProject', compact('forums'));
    }
    public function show($id){
//        $project = project::where('id', $id)->first();
        $project = project::with('forum','costs', 'executiveStaff')->where('id', $id)->get(['name', DB::raw('pdate(start_date) as start_date') , 'forum_id', 'id', 'type', DB::raw('pdate(end_date) as end_date'), 'place','purpose','sideway_programs','detailed_programs','innovation','sponsors','description','letter_number','manager_sign','expert_sign','level','capacity','cost','final_cost','suggest_form','final_report','documentation','grade','master','forum_id','start_time','end_time','total_hours' ])->first();
//        $project = project::all('name', DB::raw('pdate(start_date)'))->first();
        $forums = forum::all();
        return view('editProject', compact('project', 'forums'));
//        return $project;
    }


}
