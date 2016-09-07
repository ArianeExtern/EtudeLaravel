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

Route::post('/home/postFilm', ['middleware' => 'auth', 'uses' => 'Film\FilmController@postFilm']);

Route::get('/home/searchFilm', ['middleware' => 'auth', 'uses' => 'Film\FilmController@searchFilm']);

Route::get('/home/sortFilm', ['middleware' => 'auth', 'uses' => 'Film\FilmController@sortFilm']);

//Liste des route générer
Route::resource('film', 'FilmController');
Route::post('film/addRole', 'FilmController@addRole');
Route::post('film/roleToActeur', 'FilmController@roleToActeur');
Route::post('film/roleToActeur', 'FilmController@categorieToFilm');

Route::resource('categorie', 'CategorieController');
Route::resource('mes', 'MesController');
Route::resource('role', 'RoleController');
Route::resource('acteur', 'ActeurController');
Route::resource('personne', 'PersonneController');
Route::resource('categoriefilm', 'CategorieFilmController');
Route::resource('filmrole', 'FilmRoleController');

