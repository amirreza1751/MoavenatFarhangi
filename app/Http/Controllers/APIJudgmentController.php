<?php

namespace App\Http\Controllers\API;

use App\executiveStaff;
use App\project;
//use App\referee;
use App\standard;
use App\subScore;
use App\subScoreL2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function MongoDB\BSON\toJSON;

session_start();

class APIJudgmentController extends Controller
{


    public function standard_index()
    {
        $standard = standard::all();

        return $standard;
    }

    public function grade_index(Request $request)
    {
        if (isset($_SESSION['role_id'])) {
            $role_id = $_SESSION['role_id'];
            if ($_SESSION['role_id'] == 1) {//role_id=1 sardavar mibashad
                $result = DB::table('projects')
                    ->join('standards', 'standards.project_id', '=', 'projects.id')->where('projects.id', $request->project_id)
                    ->join('sub_scores', 'sub_scores.standard_id', '=', 'standards.id')
                    ->join('sub_score_l2s', 'sub_score_l2s.sub_score_id', '=', 'sub_scores.id')
                    ->join('users', 'users.id', '=', 'standards.user_id')
                    ->select('projects.name', 'standards.st_name', 'standards.final_score',
                        'users.name', 'users.student_number', 'users.lname', 'sub_scores.subject',
                        'sub_scores.coefficient', 'sub_scores.sub_score', 'sub_score_l2s.subject_l2',
                        'sub_score_l2s.coefficient_l2', 'sub_score_l2s.sub_score_l2')
                    ->get();
            }

        }


        return $result;
//        return $_SESSION['role_id'];
    }
    public function grade_index_referee(Request $request)
    {
        //first way
        $result = DB::table('projects')
            ->join('standards', 'standards.project_id', '=', 'projects.id')->where('projects.id', $request->project_id)->where('standards.user_id',$_SESSION['user_id'])
            ->join('sub_scores', 'sub_scores.standard_id', '=', 'standards.id')
            ->join('sub_score_l2s', 'sub_score_l2s.sub_score_id', '=', 'sub_scores.id')
            ->select('projects.*', 'standards.st_name', 'standards.final_score', 'sub_scores.subject', 'sub_scores.coefficient', 'sub_scores.sub_score', 'sub_score_l2s.subject_l2', 'sub_score_l2s.coefficient_l2', 'sub_score_l2s.sub_score_l2')
            ->get();
        //second way
//        $result = DB::select('select * from projects, standards, sub_scores, sub_score_l2s
//                        where
//                        projects.id = :project_id
//                        and standards.project_id = projects.id
//                        and standards.user_id = :user_id
//                        and sub_scores.standard_id = standards.id
//                        and sub_score_l2s.sub_score_id = sub_scores.id', ['project_id' => $request->project_id, 'user_id' => $request->user_id]);


        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function set_grade(Request $request)
    {

        $standard = standard::create([
            'st_name' => $request['st_name'],
            'final_score' => $request['final_score'],
            'project_id' => $request['project_id'],
            'user_id' => $request['user_id']

        ]);


        $sub_score = subScore::create([
            'subject' => $request['subject'],
            'coefficient' => $request['coefficient'],
            'sub_score' => $request['sub_score'],
            'standard_id' => $standard->id
        ]);

        subScoreL2::create([
            'subject' => $request['subject_l2'],
            'coefficient' => $request['coefficient_l2'],
            'sub_score' => $request['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        $role_id = "";
        if (isset($_SESSION['role_id'])) {
            $role_id = $_SESSION['role_id'];
            if ($_SESSION['role_id'] == 1) {
                $project = project::find($request->project_id)->first();
                $project->grade = $request['grade'];
                $project->save();
            }
        }
//        return redirect('/api/standards');
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
     * @param college $college
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update_grade( Request $request)
    {
        return redirect('/api/colleges');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        $college->delete();
        return redirect('/api/colleges');
    }


    public function test_method( Request $request){

    }
}
