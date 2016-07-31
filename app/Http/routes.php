<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/grade/{level}', 'DataSetController@grades');
Route::post('/grade/{level}', 'DataSetController@setGrades');
Route::post('/grade/edit/{grade}', 'DataSetController@editGrades');
Route::get('/ncae', 'DataSetController@ncae');
Route::post('/ncae', 'DataSetController@setNcae');
Route::post('/ncae/edit/{ncae}', 'DataSetController@editNcae');
Route::get('/preference', 'DataSetController@preference');
Route::post('/preference', 'DataSetController@setPreference');
Route::post('/preference/edit/{preference}', 'DataSetController@editPreference');
Route::get('/awards', 'DataSetController@awards');
Route::post('/awards', 'DataSetController@addAward');
Route::get('/award/edit/{award}', 'DataSetController@oneAward');
Route::post('/award/edit/{award}', 'DataSetController@editAward');
Route::post('/award/delete/{award}', 'DataSetController@deleteAward');
Route::get('/compute', 'HomeController@compute');
