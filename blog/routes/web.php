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

    //Routing Seminaire

    Route::get('{id}', ['as' => 'cahier.show', 'uses' => 'CahierController@show']);
    Route::put('{id}/edit', ['as' => 'cahier.edit', 'uses' => 'CahierController@edit']);
    Route::get('/destroy/{id}', ['as' => 'cahier.destroy', 'uses' => 'CahierController@destroy']);




});


Route::resource('cahier', 'CahierController');