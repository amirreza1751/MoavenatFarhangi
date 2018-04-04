<?php

namespace App\Http\Controllers;

use App\forum;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $projects = project::where('name', 'عنوان طرح')->first();
        $role =  Auth::user()->role()->first()->name;
        if ($role == "دبیر کمیته علمی"){
            return view('home');
        }
        if ($role == "کاربر"){
            return view('staffHome');
        }
        else if ($role == "داور") {
            return view('refereeHome');

        }


    }
}
