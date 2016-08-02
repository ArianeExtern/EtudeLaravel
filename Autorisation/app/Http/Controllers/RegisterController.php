<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;

class RegisterController extends Controller
{
    //Constructeur
    public function __construct(){
    }


    /**
     * Fonction utiliser pour faire la validation des données du formulaire.
     *
     * @param array $data : Tableau associatif contenant les informations du formulaire
     * @return mixed : Validator
     */
    private function validateData(array $data){
        return Validator::make($data, [
            'name' => 'required|alpha_num|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'password' => 'required|min:6',
            'password1' => 'required|min:6',
        ]);
    }

    /**
     * Action à executer à la reception de la
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request){

        //On recupère les information du formulaire dans un tableau associatif (Clé valeur).
        $data = $request->all();

        //On valide les données
        $validator = $this->validateData($data);

        //On teste si la requête a échoué ou pas
        if($validator->fails()){
            //On conserve les données dans la session pour la requête suivante.
            Input::flash();

            return redirect('/')
                        ->withErrors($validator)
                        ->withInput(Input::except('password'));
        }

        //On teste si les 2 mots de passe saisis sont les mêmes
        if($data['password'] == $data['password1']){
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        }

        return redirect('/users');
    }

 }
