<?php

namespace App\Http\Controllers\Film;

use Illuminate\Http\Request;

use App\Film\Film;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use \Validator;

class FilmController extends Controller
{

    //Validation des données
    public function validateFilm($array){
        return Validator::make($array, [
            'titre' => 'required|min:3',
            'categorie' => 'required',
            'annee' => 'required',
            'description' => 'required',
        ]);
    }

    //Ajout du film
    public function postFilm(Request $request){

        //Validation des données
        $validator = $this->validateFilm($request->all());
        if($validator->fails()){
            return redirect('/home');
        }

        //Creation et insertion du film
        Film::create($request->all());
        //redirection vers la route '/home'
        return redirect('/home');
    }

    //Recheche de la Film
    public function searchFilm(Request $request){
        $keyword = $request->get('keyword');
        $keyword = '%'.$keyword.'%';
        $films = Film::where('titre', 'like', $keyword)
            ->orWhere('categorie', 'like', $keyword)
            ->orWhere('annee', 'like', $keyword)
            ->orWhere('description', 'like', $keyword)
            ->orderBy('titre', 'asc')
            ->paginate(10); //Pagination 10 films par page

        return view('home', ['films' => $films]);
    }

    //Trie des films sophistiqués
    public function sortFilm(Request $request){
        //On recupere une instance de QueryBuilder
        $films = Film::query();

        /*if($request->has('page')){
            $films = $films->skip($request->get('page')*10);
        }*/

        if($request->exists('titre')){
            $films = $films->orderBy('titre', $this->getOrder('titre'));
        }

        if($request->exists('annee')){
            $films = $films->orderBy('annee', $this->getOrder('annee'));
        }

        $films = $films->paginate(10);
        //$films->setPath($request->path());
        //Pagination de 10 Films par page
        return view('home', ['films' => $films]);
    }

    //Fonction permettant de gerer l'ordre de trie
    private function getOrder($param){
        if(Session::has($param)){
            Session::put($param, Session::get($param) == 'asc' ? 'desc':'asc');
        }else{
            Session::put($param, 'asc');
        }
        return Session::get($param);
    }

    //if($request->has('page')){
    //$films->skip($request->get('page')*2);
    //->paginate(2)

}
