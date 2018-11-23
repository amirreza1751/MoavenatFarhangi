<?php

namespace App\Http\Controllers\API;

use App\college;
use App\forum;
use App\executiveStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return forum[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $forums = Forum::all();
        return $forums;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $forum = Forum::create($request->all());

        return response()->json(['status'=>200 ,'forum'=>$forum]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(forum $forum)
    {
        return $forum;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param forum $forum
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Forum $forum, Request $request)
    {
        $forum->update($request->all());
        return response()->json(['status'=>200 ,'forum'=>$forum]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param forum $forum
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param forum $college
     * @internal param int $id
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();
        return response()->json(['status'=>200]);
    }

    public function add_staff(Request $request)
    {
        $es=executiveStaff::create($request->all());
        return $es;
    }

    public function show_staff(forum $forum)
    {
        $staffs=$forum->executive_staff();
        return response()->json($staffs, 200);
    }

    public function destroy_staff(executiveStaff $executiveStaff) // remove staff from forum
    {
        $executiveStaff->forum_id = null;
        $executiveStaff->save();
        return response()->json($executiveStaff,200);
    }
}
