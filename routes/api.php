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

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

//Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/api/books', 'BookController@index');
    Route::get('/api/books/{id}', 'BookController@show');
    Route::post('/api/books', 'BookController@store');
    Route::post('/api/saveUser','UserController@putUsers');
    Route::put('/api/books/{id}', 'BookController@update');
    Route::delete('/api/books/{id}', 'BookController@destroy');
//});

// API for accounts//
Route::post('api/saveUser','AccountApiController@saveUser');
Route::post('api/loginUser','AccountApiController@logInUser');
Route::get('api/getFullName/{email}','AccountApiController@getFullName');


// API for documnets //
Route::get('api/getDocuments','DocumentApiController@getDocuments');
Route::get('api/getDocuments/{id}','DocumentApiController@getThisDocuments');
Route::get('api/getFilteredDocuments/{status}','DocumentApiController@getFilteredDocuments');
Route::post('api/postDocuments','DocumentApiController@postDocuments');
Route::put('api/putDocuments/{id}','DocumentApiController@putDocuments');
Route::delete('api/deleteDocuments/{id}','DocumentApiController@deleteDocuments');


//API for university
Route::get('api/getUniversity','UniversityApiController@getUniversity');
Route::get('api/getUniversity/{id}','UniversityApiController@getThisUniversity');
Route::get('api/getUniversityByCountry/{country}','UniversityApiController@getUniversityByCountry');
Route::post('api/postUniversity','UniversityApiController@postUniversity');
Route::put('api/putUniversity/{id}','UniversityApiController@putUniversity');
Route::delete('api/deleteUniversity/{id}','UniversityApiController@deleteUniversity');


// API for university address //
Route::get('api/getUniversityAddress','UniversityApiController@getUniversityAddress');
Route::get('api/getUniversityAddress/{id}','UniversityApiController@getThisUniversityAddress');
Route::post('api/postUniversityAddress','UniversityApiController@postUniversityAddress');
Route::put('api/putUniversityAddress/{id}','UniversityApiController@putUniversityAddress');
Route::delete('api/deleteUniversityAddress/{id}','UniversityApiController@deleteUniversityAddress');


//API for university contents
Route::get('api/getUniversityContent','UniversityApiController@getUniversityContent');
Route::get('api/getUniversityContent/{id}','UniversityApiController@getThisUniversityContent');
Route::post('api/postUniversityContent','UniversityApiController@postUniversityContent');
Route::put('api/putUniversityContent/{id}','UniversityApiController@putUniversityContent');
Route::delete('api/deleteUniversityContent/{id}','UniversityApiController@deleteUniversityContent');

//API for university ranking
Route::get('api/getUniversityRank/{id}','UniversityApiController@getUniversityRank');
Route::get('api/sortUniversityRank/{sortAs}','UniversityApiController@sortUniversityRank');
Route::get('api/sortUniversityRank/{type}/{sortAs}','UniversityApiController@sortUniversityByType');
Route::post('api/postUniversityRank','UniversityApiController@postUniversityRank');
/*
Route::put('api/putUniversity/{id}','UniversityApiController@putUniversity');
Route::delete('api/deleteUniversity/{id}','UniversityApiController@deleteUniversity');
*/


//API for requirements
Route::get('api/getRequirement','RequirementApiController@getRequirement');
Route::get('api/getRequirementFor/{uniId}','RequirementApiController@getRequirementFor'); //get every requirement for particular Uni
Route::get('api/sortUniversityBy/{requirement}/{inverse}','RequirementApiController@sortUniversityBy'); // get every university with particular requirement
Route::post('api/postRequirement','RequirementApiController@postRequirement'); //save new requirement like IETLS SAT GRE etc
Route::post('api/postRequirementFor','RequirementApiController@postRequirementFor'); //save requirement for specific university with 

//Route::put('api/putUniversityContent/{id}','UniversityApiController@putUniversityContent');
//Route::delete('api/deleteUniversityContent/{id}','UniversityApiController@deleteUniversityContent');

//API for sendbird
Route::post('api/sendBirdUser','SendBirdApiController@createSendBirdUser');
Route::get('api/getOnlineUser','ChatApiController@getOnlineUser');
Route::get('api/userType/{sendBirdId}','AccountApiController@getUserType');
Route::get('api/getCounselor','ChatApiController@getCounselor');


