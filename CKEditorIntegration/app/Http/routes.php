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

Route::post('addPost', 'PostController@store');
Route::get('getPost', 'PostController@getPost');
Route::post('deletePost/{post}', 'PostController@deletePost');
Route::get('editPost', 'PostController@editPost');
Route::post('updatePost/{post}', 'PostController@updatePost');
Route::post('addComment/{post}', 'PostController@addComment');
Route::post('addReponse/{comment}', 'PostController@addReponse');

Route::get('/home', function () {
    return view('pages.home', ['posts' => \App\Post::all(), 'post' => new \App\Post()]);
});

Route::get('/', function (){
    return view('welcome');
});

Route::auth();

