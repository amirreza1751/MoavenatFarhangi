<?php

namespace App\Http\Controllers;

use App\college;
use App\forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function add(){
        $colleges = college::all();
        return view('createForum', compact('colleges'));
    }
    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required|unique:forums,name'
        ]);
        $forum = forum::create([
            'name' => $request['name'],
            'forum_history' => $request['forum_history'],
            'forum_statute' => $request['forum_statute'],
            'college_id' => $request['college_id'],
        ]);

//        Log::info("create college");
//        return college::create([
//            'name' => $request['name']
//        ])->toSql();
        return view('createForumStaff', compact('forum'));
//        return $request->all();

    }

    public function index(){
        $forums = forum::all();
        return view('forums', compact('forums'));
    }
    public function show($id){
        $forum = forum::with('executive_staff')->where('id', $id)->first();
        return $forum;
    }
}
