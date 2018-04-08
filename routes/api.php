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
Route::get('/login', 'API\APILoginController@getToken'); // bayad post beshe!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*forums*/
Route::post('/forums', 'API\APIForumController@index');
Route::post('/forums/add', 'API\APIForumController@store');

/*projects*/
Route::post('/projects', 'API\APIProjectController@index');
Route::get('/projects/add', 'API\APIProjectController@store');
Route::get('/projects/remove/{project}', 'API\APIProjectController@destroy');
Route::patch('/projects/edit/{project}', 'API\APIProjectController@update');
Route::patch('/projects/edit_cost/{cost}', 'API\APIProjectController@update_cost');
Route::get('/projects/add_staff', 'API\APIProjectController@add_staff');
Route::get('/projects/show_staff', 'API\APIProjectController@show_staff');
Route::get('/projects/remove_staff', 'API\APIProjectController@destroy_staff');
Route::get('/projects/search', 'API\APIProjectController@search');
Route::get('/projects/add_cost', 'API\APIProjectController@add_cost');
Route::get('/projects/costs', 'API\APIProjectController@index_cost');


/*colleges*/
Route::get('/colleges', 'API\APICollegeController@index');
Route::get('/colleges/add', 'API\APICollegeController@store');
Route::get('/colleges/remove/{college}', 'API\APICollegeController@destroy');
Route::patch('/colleges/edit/{college}', 'API\APICollegeController@update');//id bayad begire

/*forums*/
Route::get('/forums', 'API\APIForumController@index');
Route::get('/forums/add', 'API\APIForumController@store');
Route::get('/forums/add_staff', 'API\APIForumController@add_staff');
Route::get('/forums/remove/{forum}', 'API\APIForumController@destroy');
Route::patch('/forums/edit/{forum}', 'API\APIForumController@update');
Route::get('/forums/show_staff', 'API\APIForumController@show_staff');
Route::get('/forums/destroy_staff/{executiveStaff}', 'API\APIForumController@destroy_staff');

/*judgement*/
Route::get('/grade_index', 'API\APIJudgmentController@grade_index');
Route::get('/grade_index/referee', 'API\APIJudgmentController@grade_index_referee');
Route::get('/judgment/set_grade', 'API\APIJudgmentController@set_grade');
Route::get('/judgment/get_grades', 'API\APIJudgmentController@get_grades');




//test
Route::get('/test', 'API\APIJudgmentController@test_method');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
