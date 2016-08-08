<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class VideoController extends Controller
{

    public function validateVideo($array){
        return Validator::make($array, [
            'name' => 'required|min:3',
            'url' => 'required|unique:videos',
            'duree' => 'required',
            'description' => 'required',
        ]);
    }

    //Ajout de la video
    public function postVideo(Request $request){

        //Validate data
        $validator = $this->validateVideo($request->all());
        if($validator->fails()){
            return redirect('/home');
        }
        //Creation et insertion de la video
        Video::create($request->all());
        //redirection vers la route '/home'
        return redirect('/home');
    }

    //Recheche de la video
    public function searchVideo(Request $request){
        $keyword = $request->get('keyword');
        $keyword = '%'.$keyword.'%';
        $videos = Video::where('name', 'like', $keyword)
                ->orWhere('url', 'like', $keyword)
                ->orWhere('duree', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
                 ->paginate(2);

        return view('home', ['videos' => $videos]);
    }

    //Trie des videos sophistiqués
    public function sortVideos(Request $request){
        //On recupere une instance de QueryBuilder
        $videos = Video::query();

        if($request->has('page')){
            $videos->skip($request->get('page')*2);
        }

        if($request->exists('name')){
            $videos = $videos->orderBy('name', $this->getOrder('name'));
        }

        if($request->exists('duree')){
            $videos = $videos->orderBy('duree', $this->getOrder('duree'));
        }

        return view('/home', ['videos' => $videos->paginate(2)]);
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



}
