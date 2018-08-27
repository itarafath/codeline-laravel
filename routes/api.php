<?php

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

Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('films', 'FilmController@index');
Route::get('films/{slug}', 'FilmController@show');
Route::post('register', 'AuthenticateController@store');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', 'UserController@show');
    Route::post('user/profile/update', 'UserController@updateProfile');
    Route::post('user/password/update', 'UserController@updatePassword');
    Route::post('film/create', 'FilmController@store');
    Route::get('/get-country', 'CountryController@index');
    Route::post('/comment', 'CommentController@store');
});
