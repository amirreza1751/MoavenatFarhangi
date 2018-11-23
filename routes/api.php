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
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


/*colleges*/
Route::group([
    'prefix' => 'colleges',
    //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\APICollegeController@index');
    Route::post('/add', 'API\APICollegeController@store');
    Route::get('/remove/{college}', 'API\APICollegeController@destroy');
    Route::patch('/edit/{college}', 'API\APICollegeController@update');//id bayad begire
});

/*forums*/
Route::group([
    'prefix' =>'forums',
        //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\APIForumController@index');
    Route::post('/add', 'API\APIForumController@store');
    Route::post('/add_staff', 'API\APIForumController@add_staff');
    Route::get('/remove/{forum}', 'API\APIForumController@destroy');
    Route::patch('/edit/{forum}', 'API\APIForumController@update');
    Route::get('/show_staff', 'API\APIForumController@show_staff');
    Route::get('/destroy_staff/{executiveStaff}', 'API\APIForumController@destroy_staff');
});


//test
//Route::get('/test', 'API\APIJudgmentController@test_method');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
