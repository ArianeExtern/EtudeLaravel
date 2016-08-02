<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    //contructeur de la classe Controller
    public function __construct(){
        //$this->
    }

    //Action associer à la page d'accueil
    public function home($name){
      return view('pages/index', ['name' => $name]);
    }

}
