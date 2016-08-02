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

//Acceuil d'un utilisateur avec le controller "WelcomeController" et la methode execute dans le controller est home(....)
Route::get('accueil/{name}', ['as' => 'Accueil', 'uses' => 'WelcomeController@home']);


//Route with parameter
Route::get("/hello/{name}", function($name){
    return "Hello $name";
});

//Route avec parametre formatter & Nom
//Use where('param', 'RegExp') to specify the params format (Apply to request return value)
/***
get(path, Ressource)
->path : est le url à ecouter par la requete Http
->Ressource : ici c'est un tableau associatif
--->La clé 'as' : specifie un nom descriptif de la route
--->La clé 'middleware' : specifie le middleware entre la requête et controller
--->La 'uses' : specifie le controller
--->Function anonyme qui sera excecuté
*/
Route::get("hello/{name}-{age}-{sexe}", ['as' => 'Hello Formater', function($name, $age, $sexe){
    return "Lien : " .route('hello', ['name' => 'Seydou', 'age' => $age, 'sexe' => $sexe]);
}])->where('name', '[a-zA-Z0-9\-]+')->where('age', '[0-9]+')->where('sexe', '[M|F|A]');

//Regroupement de route encore appeller BackOffice
Route::group(['prefix' => 'my', 'middleware' => 'ip'], function(){

    //Cette route n'est accessible que si elle est prefixé par "/my"
    Route::get('home', function(){
        return "Home Called";
    });
});
