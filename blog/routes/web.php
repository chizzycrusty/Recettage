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
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'PitchController@destroy']);
});


Route::resource('cahier', 'CahierController');