<?php

namespace App\Http\Controllers\API;

use App\cost;
use App\executiveStaff;
use App\forum;
use App\project;
use App\staffProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Swagger\Annotations\Response;

class APIProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return forum[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
//        $result = array();
//        $projects = project::all();
//        foreach ($projects as $project){
//            $costs=$project->costs;
//            $test = compact($costs, $project);
//            array_push($result, $test);
//        }
//
//        return response()->json($result);
        $projects = project::all();
//        $projects = project::has('costs')->with('costs')->first();
//
//        for ($i = 0; $i < sizeof($projects); $i++){
//            echo $projects[$i]['name'];
//        }


        return $projects;

    }
    public function index_cost(Request $request)
    {
        $project = project::findorFail($request->project_id)->costs;
        return response()->json($project);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
//        $staffs = $request['staffs']->all();
//        $costs = $request['costs']->all();
//
//        $request = $request->all();

        $project = Project::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'place' => $request['place'],
            'level' => $request['level'],
            'capacity' => $request['capacity'],
            'cost' => $request['cost'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'total_hours' => $request['total_hours'],
            'forum_id' => $request['forum_id'],
            'purpose' => $request['purpose'],
            'sideway_programs' => $request['sideway_programs'],
            'detailed_programs' => $request['detailed_programs'],
            'innovation' => $request['innovation'],
            'sponsors' => $request['sponsors'],
            'sponsor_type' => $request['sponsor_type'],
            'letter_number' => $request['letter_number'],
            'manager_sign' => $request['manager_sign'],
            'expert_sign' => $request['expert_sign'],
        ]);
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

        return redirect('/api/projects');
    }

    public function add_cost(Request $request)
    {

        cost::create([
            'subject' => $request['subject'],
            'unit' => $request['unit'],
            'requested_cost' => $request['requested_cost'],
            'approved_cost' => $request['approved_cost'],
            'cost' => $request['cost'],
            'project_id'=>$request['project_id']
        ]);
        return redirect('/api/projects/costs');
    }


    public function update_cost(cost $cost,Request $request)
    {
        $cost->update($request->all());
        return redirect('/api/costs');

    }

    /**
     * @param Request $request
     * @return null
     */
    public function search(Request $request)
    {

        $search = $request['search'];
        $record = null;
        if (is_numeric($search)) {
            $record = project::findorFail($search);
        }
        else{
            $search = "%". $search. "%";
            $record = project::where('name', 'like' , $search)
                ->orWhere('type', 'like' , $search)
                ->orWhere('place', 'like' , $search)
                ->orWhere('purpose', 'like' , $search)
                ->orWhere('sideway_programs', 'like' , $search)
                ->orWhere('detailed_programs', 'like' , $search)
                ->orWhere('innovation', 'like' , $search)
                ->orWhere('sponsors', 'like' , $search)
                ->orWhere('sponsor_type', 'like' , $search)
                ->orWhere('letter_number', 'like' , $search)
                ->orWhere('manager_sign', 'like' , $search)
                ->orWhere('expert_sign', 'like' , $search)
                ->orWhere('level', 'like' , $search)
                ->orWhere('cost', 'like' , $search)
                ->get();
        }

        return $record;
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param project $project
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(project $project, Request $request)
    {
        $project->update($request->all());
        return redirect('/api/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param project $project
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param project $forum
     * @internal param int $id
     */
    public function destroy(project $project)
    {
        $staff_projects = staffProject::where('project_id', $project->id)->get();
        foreach ($staff_projects as $staff_project) {
            $executive_staffs = executiveStaff::where('id', $staff_project->staff_id)->get();
            foreach ($executive_staffs as $executive_staff) {
                if (!isset($executive_staff->forum_id)) {
                    $ids_to_delete = array(
                        'id' => $project->id
                    );
                    DB::table('staff_projects')->whereIn('project_id', $ids_to_delete)->delete();
                    $ids_to_delete2 = array(
                        'id' => $executive_staff->id
                    );
                    DB::table('executive_staffs')->whereIn('id', $ids_to_delete2)->delete();
                }
            }
        }
        $ids_to_delete = array(
            'id' => $project->id
        );
        DB::table('staff_projects')->whereIn('project_id', $ids_to_delete)->delete();
        $project->delete();
        return redirect('/api/projects');
    }

    public function add_staff(Request $request)
    {
        $exe_id = executiveStaff::create([
            'fname' => $request['fname'],
            'lname' => $request['lname']
        ]);
        staffProject::create([
            'post' => $request['post'],
            'staff_id' => $exe_id->id,
            'project_id' => $request['project_id'],
        ]);
        return redirect('/api/projects');
    }

    public function show_staff(Request $request)
    {
        if (!($request->has('project_id')) || $request->project_id == 0) {
            return response()->json('wrong id,bad request', 400);
        }
        $projecs = DB::table('projects')
            ->join('staff_projects', 'project_id', '=', 'projects.id')
            ->join('executive_staffs', 'executive_staffs.id', '=', 'staff_projects.staff_id')
            ->select('executive_staffs.*', 'staff_projects.post')
            ->get();

        return response()->json($projecs);
    }

    public function destroy_staff(Request $request)
    {
        $staff_project = staffProject::where('staff_id', $request->staff_id)->where('project_id', $request->project_id)->first()->delete();

        $executive_staffs = executiveStaff::where('id', $request->staff_id)->first();
        if (!isset($executive_staffs->forum_id)) {
            $executive_staffs->delete();
        }
        return response()->json($staff_project);
    }
}
