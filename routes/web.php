<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::post('/projects/new', 'ProjectController@store');
Route::post('/projects/staffs/new', 'StaffController@store');
Route::post('/projects/costs/new', 'CostController@store');
Route::post('/projects/judgement/{id}', 'JudgementController@insert_grade')->middleware('auth:web');
Route::post('/projects/finalJudgement/{id}', 'JudgementController@final_insert_grade')->middleware('auth:web');


Route::post('/colleges/new', 'CollegeController@store');


Route::post('/forums/new', 'ForumController@store');
Route::post('/forums/staffs/new', 'StaffController@forum_staff_store');






Route::get('/test', 'ProjectController@test');
Route::get('/charts', 'ChartController@showCharts');


Route::get('/projects/add', 'ProjectController@add')->middleware('auth:web');
Route::get('/projects', 'ProjectController@index')->middleware('auth:web');
Route::get('/projects/{id}', 'ProjectController@show')->middleware('auth:web');
Route::get('/projects/judge/{id}', 'JudgementController@set_grade')->middleware('auth:web');
Route::get('/projects/finalJudge/{id}', 'JudgementController@index_grades')->middleware('auth:web');


Route::get('/colleges/add', 'CollegeController@add')->middleware('auth:web');
Route::get('/colleges', 'CollegeController@index')->middleware('auth:web');


Route::get('/forums/add', 'ForumController@add')->middleware('auth:web');
Route::get('/forums', 'ForumController@index')->middleware('auth:web');
Route::get('/forums/{id}', 'ForumController@show')->middleware('auth:web');
