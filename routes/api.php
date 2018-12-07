<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('signup', 'API\AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('user', 'API\AuthController@user');
    });
});


/*colleges*/
Route::group([
    'prefix' => 'colleges',
    //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\CollegeController@index');
    Route::post('/add', 'API\CollegeController@store');
    Route::get('/remove/{college}', 'API\CollegeController@destroy');
    Route::patch('/edit/{college}', 'API\CollegeController@update');//id bayad begire
});

/*forums*/
Route::get('/forums', 'API\ForumController@index');
Route::get('/forums/{forum}', 'API\ForumController@show');
Route::post('/forums/add', 'API\ForumController@store');
Route::get('/forums/add_staff', 'API\ForumController@add_staff');
Route::get('/forums/remove/{forum}', 'API\ForumController@destroy');
Route::patch('/forums/edit/{forum}', 'API\ForumController@update');
Route::get('/forums/show_staff', 'API\ForumController@show_staff');
Route::get('/forums/destroy_staff/{executiveStaff}', 'API\ForumController@destroy_staff');




/*projects*/
Route::get('/projects', 'API\ProjectController@index');
Route::get('/projects/add', 'API\ProjectController@store');
Route::get('/projects/remove/{project}', 'API\ProjectController@destroy');
Route::patch('/projects/edit/{project}', 'API\ProjectController@update');
Route::patch('/projects/edit_cost/{cost}', 'API\ProjectController@update_cost');
Route::get('/projects/add_staff', 'API\ProjectController@add_staff');
Route::get('/projects/{id}/show_staff', 'API\ProjectController@show_staff');
Route::get('/projects/remove_staff', 'API\ProjectController@destroy_staff');
Route::post('/projects/search', 'API\ProjectController@search');
Route::post('/projects/show/{Project}', 'API\ProjectController@show');
Route::get('/projects/add_cost', 'API\ProjectController@add_cost');
Route::get('/projects/{id}/costs', 'API\ProjectController@index_cost');


/*factor-controller*/
Route::post('/factors/add', 'API\FactorController@store');
Route::get('/factors', 'API\FactorController@index');



/*form-controller*/
Route::post('/forms/add', 'API\FormController@store');
Route::get('/forms/show/{id}', 'API\FormController@show');





/*results */
Route::post('/results/add', 'API\ResultController@store');
Route::post('/results/final_judge', 'API\ResultController@final_judge');

//test
//Route::get('/test', 'API\APIJudgmentController@test_method');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
