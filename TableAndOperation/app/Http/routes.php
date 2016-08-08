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

Route::post('/postVideo', 'Video\VideoController@postVideo');

Route::get('/searchVideo', 'Video\VideoController@searchVideo');

Route::get('/home/sortVideo', ['middleware' => 'auth', 'uses' => 'Video\VideoController@sortVideos']);
