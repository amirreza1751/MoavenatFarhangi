<?php

namespace App\Http\Controllers\API;

use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $user_id = Auth('api')->user()->id;
        $project_id = $request['project_id'];
        foreach ($request['factors'] as $factor)
        {
            Result::create([
                'grade' => $factor['grade'],
                'is_final_judge' => 0,
                'project_id' => $project_id,
                'factor_id' => $factor['factor_id'],
                'user_id'=> $user_id
            ]);
        }

    }

    public function final_judge(Request $request)
    {
        $request = $request->all();
        $project_id = $request['project_id'];
        $user_id = auth('api')->user()->id;
        foreach ($request['factors'] as $factor)
        {
            Result::create([
                'grade' => $factor['grade'],
                'is_final_judge' => 1,
                'project_id' => $project_id,
                'factor_id' => $factor['factor_id'],
                'user_id'=> $user_id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
