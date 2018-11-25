<?php

namespace App\Http\Controllers\API;

use App\Factor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactorController extends Controller
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

        foreach ($request as $reqItem){
            $p = Factor::create([
                'name' => $reqItem['name'],
                'coefficient' => $reqItem['coefficient'],
                'level' => '1'
            ]);
            if (count($reqItem['children']) > 0){
            $children1 = $reqItem['children'];
            foreach ($children1 as $child1){
                    $ch = Factor::create([
                        'name' => $child1['name'],
                        'coefficient' => $child1['coefficient'],
                        'parent' => $p->id,
                        'level' => '2'
                    ]);
                    if (count($child1['children']) > 0){
                        $children2 = $child1['children'];
                        foreach ($children2 as $child2){
                            Factor::create([
                                'name' => $child2['name'],
                                'coefficient' => $child2['coefficient'],
                                'parent' => $ch->id,
                                'level' => '3'
                            ]);
                        }
                    }
                }
            }
        }

        return response()->json($p, 200);
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
