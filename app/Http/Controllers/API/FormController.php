<?php

namespace App\Http\Controllers\API;

use App\Factor;
use App\Form;
use App\FormFactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
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

        $form_name = $request->form_name;
        $project_type_id = $request->project_type_id ;
        $existing_factors = $request->existing_factors;
        $new_factors = $request->new_factors;

        $new_request = new \Illuminate\Http\Request();
        $new_request->replace($new_factors);

     /*    validating factor ids   */
     $temp = Factor::findMany($existing_factors);
     if (count($temp) == count($existing_factors)){
         $factors= app('App\Http\Controllers\API\FactorController')->store($new_request);

         $active_form = Form::where('project_type_id', $project_type_id)->where('active', '1')->get();
         if (count($active_form) > 0){
             $active_form[0]->active = 0;
             $active_form[0]->save();
         }

         $new_form = Form::create([
             'name' => $form_name,
             'project_type_id' => $project_type_id,
             'active' => 1
         ]);

         foreach ($factors->original as $item ){
            $toSave = FormFactor::create([
                'form_id' => $new_form->id ,
                'factor_id' => $item->id
            ]);
            $toSave->save();
         }
         for ($i = 0 ; $i < count($existing_factors) ; $i++){
             $save_existing_factors = FormFactor::create([
                 'form_id' => $new_form->id ,
                 'factor_id' => $existing_factors[$i]
             ]);
             $save_existing_factors->save();
         }



         $out = $new_form->factors;
     }

        return response()->json(compact('out'),200);

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
