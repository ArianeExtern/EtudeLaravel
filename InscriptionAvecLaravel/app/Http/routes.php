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
Route::get('/', 'Auth\AuthController@getLogin');

Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/accueil', ['middleware' => 'auth', function(){
    return view("pages/accueil");
}]);

Route::get('/auth/logout', function (){

    Auth::logout(); //Ligne de code permettant de faire la deconnection

    //On retourne vers la page de connexion
    return redirect('/');
});

//Autre moyen de gérer la deconnection
//Route::get('/auth/logout', 'Auth\AuthController@getLogout');

//Les Routes utiliser pour reinitialiser le mot de passe
Route::post('/password/email', 'Auth\PasswordController@postEmail'); //Route gérant la soumission du formulaire

Route::get('password/email', 'Auth\PasswordController@getEmail'); //Route retournant le formulaire de soumission de l'adresse mail

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset'); //Route gérant la réprentation du formulaire

Route::post('password/reset', 'Auth\PasswordController@postReset'); //Route gérant la soumission du formulaire de soumission

