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

<<<<<<< HEAD
Route::resource('cahier', 'CahierController');
=======
Route::post('/cahier/create', 'CahierController@store');
Route::get('/cahier/{$id}', 'CahierController@single');
Route::get('/cahier/destroy/{$id}', 'CahierController@destroy');
>>>>>>> 248d22cd991af6f349ccdaf64cf41e918551b0eb
