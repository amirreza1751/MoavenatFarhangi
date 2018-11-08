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



/*colleges*/
Route::get('/colleges', 'API\APICollegeController@index');
Route::get('/colleges/add', 'API\APICollegeController@store');
Route::get('/colleges/remove/{college}', 'API\APICollegeController@destroy');
Route::patch('/colleges/edit/{college}', 'API\APICollegeController@update');//id bayad begire

/*forums*/
Route::get('/forums', 'API\APIForumController@index');
Route::post('/forums/add', 'API\APIForumController@store');
Route::get('/forums/add_staff', 'API\APIForumController@add_staff');
Route::get('/forums/remove/{forum}', 'API\APIForumController@destroy');
Route::patch('/forums/edit/{forum}', 'API\APIForumController@update');
Route::get('/forums/show_staff', 'API\APIForumController@show_staff');
Route::get('/forums/destroy_staff/{executiveStaff}', 'API\APIForumController@destroy_staff');




//test
Route::get('/test', 'API\APIJudgmentController@test_method');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
