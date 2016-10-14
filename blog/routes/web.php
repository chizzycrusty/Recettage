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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'cahier'], function () {
    Route::get('{id}', ['as' => 'cahier.show', 'uses' => 'CahierController@show']);
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'CahierController@destroy']);
});

Route::group(['prefix' => 'pitch'], function () {
    Route::post('/store', ['as' => 'cahier.store', 'uses' => 'PitchController@store']);
    Route::put('/update', ['as' => 'cahier.update', 'uses' => 'PitchController@update']);
    Route::get('/last', ['as' => 'cahier.last', 'uses' => 'PitchController@last']);
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'PitchController@destroy']);
});

Route::group(['prefix' => 'cdc'], function () {
    Route::post('/store', ['as' => 'cdc.store', 'uses' => 'CDCController@store']);
    Route::put('/update', ['as' => 'cahier.update', 'uses' => 'PitchController@update']);
    Route::get('/last', ['as' => 'cahier.last', 'uses' => 'PitchController@last']);
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'PitchController@destroy']);
});

Route::group(['prefix' => 'objectif'], function () {
    Route::post('/store', ['as' => 'cdc.store', 'uses' => 'ObjectifController@store']);
    Route::put('/update', ['as' => 'cahier.update', 'uses' => 'ObjectifController@update']);
    Route::get('/last', ['as' => 'cahier.last', 'uses' => 'ObjectifController@last']);
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'ObjectifController@destroy']);
});


Route::resource('cahier', 'CahierController');