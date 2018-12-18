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


Route::group([
    'prefix' => 'project_types',
    //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\ProjectTypeController@index');
    Route::post('/add', 'API\CollegeController@store');
    Route::get('/remove/{college}', 'API\CollegeController@destroy');
    Route::patch('/edit/{college}', 'API\CollegeController@update');
});


Route::group([
    'prefix' => 'forums',
    //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\ForumController@index');
    Route::get('/{forum}', 'API\ForumController@show');
    Route::post('/add', 'API\ForumController@store');
    Route::post('/add_staff', 'API\ForumController@add_staff');
    Route::get('/remove/{forum}', 'API\ForumController@destroy');
    Route::patch('/edit/{forum}', 'API\ForumController@update');
    Route::get('/show_staff', 'API\ForumController@show_staff');

    Route::get('/destroy_staff/{executiveStaff}', 'API\ForumController@destroy_staff');
    Route::get('/destroy_staff/{executiveStaff}', 'API\forumController@destroy_staff');
});


Route::group([
    'prefix' => 'projects',
    //'middleware' =>'auth:api'
],function(){
    Route::get('/', 'API\ProjectController@index');
    Route::post('/add', 'API\ProjectController@store');
    Route::get('/remove/{project}', 'API\ProjectController@destroy');
    Route::patch('/edit/{project}', 'API\ProjectController@update');
    Route::patch('/edit_cost/{cost}', 'API\ProjectController@update_cost');
    Route::post('/add_staff', 'API\ProjectController@add_staff');
    Route::get('/{id}/show_staff', 'API\ProjectController@show_staff');
    Route::get('/remove_staff', 'API\ProjectController@destroy_staff');
    Route::post('/search', 'API\ProjectController@search');
    Route::get('/show/{Project}', 'API\ProjectController@show');
    Route::post('/add_cost', 'API\ProjectController@add_cost');
    Route::get('/{id}/costs', 'API\ProjectController@index_cost');
});





Route::group([
    'prefix' => 'factors',
    //'middleware' =>'auth:api'
],function(){
    Route::post('/add', 'API\FactorController@store');
    Route::get('/', 'API\FactorController@index');
});




Route::group([
    'prefix' => 'forms',
    //'middleware' =>'auth:api'
],function(){
    Route::post('/add', 'API\FormController@store');
    Route::get('/show/{id}', 'API\FormController@show');
});



Route::group([
    'prefix' => 'results',
    //'middleware' =>'auth:api'
],function(){
    Route::post('/add', 'API\ResultController@store');
    Route::post('/final_judge', 'API\ResultController@final_judge');
});


