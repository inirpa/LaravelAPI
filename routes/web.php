<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('saveIt','MyController@save');
Route::post('saveThisItem','MyController@storeIt');


Route::get('getUsers','UserController@getUsers');
Route::get('allUsers','NormalController@getUsers');

//Route::get('insertUser','UserController@putUsers');
Route::get('userForm',function(){
	return view('userForm');
});
Route::post('saveUser','UserController@putUsers');



