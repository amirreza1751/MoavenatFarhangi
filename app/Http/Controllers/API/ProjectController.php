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

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return forum[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $projects = project::all();
        return $projects;
    }
    public function index_cost(Project $project)
    {
        return response()->json($project->costs(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {

        $project = Project::create($request->all());

        return response()->json($project,200);
    }

    public function add_cost(Request $request)
    {

        $cost = cost::create($request->all());
        return response()->json($cost,200);
    }


    public function update_cost(cost $cost,Request $request)
    {
        $cost->update($request->all());
        return response()->json($cost,200);
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

        return response()->json($record,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $project;
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
        return response()->json($project,200);
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
        $project->delete();
        return response()->json($project,200);
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
