<?php

namespace App\Http\Controllers\API;

use App\college;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return forum[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $colleges = College::all();
        return $colleges;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {

        $college=College::create($request->all());

        return $college;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param college $college
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(College $college, Request $request)
    {

        $college->update($request->all());
        return $college;

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
        return $college;
    }
}
