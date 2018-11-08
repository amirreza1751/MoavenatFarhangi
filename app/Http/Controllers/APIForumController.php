<?php

namespace App\Http\Controllers\API;

use App\college;
use App\forum;
use App\executiveStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIForumController extends Controller
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
        $request = $request->all();
        $college_name = $request[0]['college_name'];
        $college = college::where('name', '=', $college_name)->first();
        $forum = Forum::create([
            'name' => $request[0]['name'],
            'forum_history' => $request[0]['forum_history'],
            'forum_statute' => $request[0]['forum_statute'],
            'college_id' => $college->id
        ]);

        for ($i=1; $i<sizeof($request); $i++) {
            executiveStaff::create([
                'fname' => $request[$i]['fname'],
                'lname' => $request[$i]['lname'],
                'student_id' => $request[$i]['student_id'],
                'phone_number' => $request[$i]['phone_number'],
                'field' => $request[$i]['field'],
                'forum_post' => $request[$i]['forum_post'],
                'votes' => $request[$i]['votes'],
                'forum_id' => $forum->id
            ]);
        }


        return response()->json([ 'status'=>200 ,'forum'=>$forum]);
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
     * @param forum $forum
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Forum $forum, Request $request)
    {
        $forum->update($request->all());
        return redirect('/api/forums');
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
        return redirect('/api/forums');
    }
    public function add_staff(Request $request)
    {
        executiveStaff::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'forum_post' => $request['forum_post'],
            'forum_id' => $request['forum_id']
        ]);
        return redirect('/api/forums');
    }
    public function show_staff(Request $request)
    {
        if (!($request->has('id')) || $request->id==0){
            return response()->json('wrong id,bad request',400);
        }
        $staffs = Forum::findOrFail($request->id)->executive_staff()->get();
        return response()->json($staffs, 200);
    }
    public function destroy_staff(executiveStaff $executiveStaff)
    {
        $executiveStaff->delete();
        return redirect('/api/forums');
    }
}
