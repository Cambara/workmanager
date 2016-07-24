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

Route::group(['prefix' => 'user'],function(){
    Route::get('',['uses' => 'UserController@index']);
    Route::get('{id}',['uses' => 'UserController@show']);
    Route::post('',['uses' => 'UserController@store']);
    Route::put('{id}',['uses' => 'UserController@update']);
});