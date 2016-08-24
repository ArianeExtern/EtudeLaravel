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

/**
 * Route vers la page d'enregistrement
 */
Route::get('/', ['as' => 'Page D\'enregistrment', function(){
      return view('pages/register');
}]);

/**
 * Route pour accéder à la liste des enregistrement
 */
Route::get('/users', ['as' => 'Liste des enregistrements', function(){
        return view('pages/users', ['users' => App\User::get()]);
}]);


/**
 * Route pointant sur le controlleur qui va gérer l'enregistrement
 */
Route::group(['prefix' => 'auth'], function(){

    Route::post('/register', ['as' => 'Controller Enregistrement', 'uses' => 'InscriptionController@registerHandler']);

});

