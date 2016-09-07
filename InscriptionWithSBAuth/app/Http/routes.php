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


//à l'url "mondomaine.com/" on retourne la page "ressources/views/pages/register.blade.php"
Route::get('/', function () {
    return view('pages/register');
});

//à l'url "mondomaine.com/users" on retourne la page "ressources/views/pages/users.blade.php"
Route::get('/users', function(){
    return view('pages/users', ['users' => App\User::all()]);
});

//Route Gerant la soumission du formulaire
Route::post('auth/register', ['as' => 'Route de soumission de formulaire', 'uses' => 'InscriptionController@gestionnaireSoumission']);
