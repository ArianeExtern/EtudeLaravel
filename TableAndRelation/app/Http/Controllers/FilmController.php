<?php namespace App\Http\Controllers;


class FilmController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      //On recupere la liste des films selon le titre ascendant
      //On fait la pagination de 10 films/page
      $films = \App\Model\Film::orderBy('titre', 'asc')->paginate(10);

      return view('pages.index', ['films' => $films]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      //On recupere toutes les categories
      $categories = \App\Model\Categorie::orderBy('nom', 'asc')->get();

      //On recupère le metteur en scène avec les personne asscoier
      $mess = \App\Model\Mes::with('personne')->get();

      //Creation d'un film vide pour le formulaire
      $film = new \App\Model\Film;

      return view('pages.films', ['categories' => $categories, 'mess' => $mess, 'film' => $film]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
       $params = request()->all();

        //On recupere le metteur en scene
        $mes = \App\Model\Personne::find($params['mes_id']);
        $mes = $mes->infoable;


       //Création d'un nouveau film
       $film = \App\Model\Film::create($params);

      //Association du film au metteur en scene
      $film->mes()->associate($mes)->save();

      //Ajout du film à une categorie
      $film->categories()->attach($params['cat_id']);

       return redirect('/film');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      //On recupere le film dont l'id est passé en paramètre
      $film = \App\Model\Film::with('categories')->find($id);

      //Liste des catégories associer au film
      $categories = $film->categories()->get();

      return view('pages.show_film', ['film' => $film, 'categories' => $categories]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      //On recupère l'instance de film
      $film  = \App\Model\Film::find($id);

      //On recupere toutes les categories
      $categories = \App\Model\Categorie::orderBy('nom', 'asc')->get();

      //On recupère le metteur en scène avec les personne asscoier
      $mess = \App\Model\Mes::with('personne')->get();

      //Recuperation des Acteur
      $acteurs = \App\Model\Acteur::with('personne')->get();

      return view('pages.films', ['film' => $film, 'categories' => $categories, 'mess' => $mess, 'id' => $id, 'acteurs' => $acteurs]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      $film = \App\Model\Film::find($id);
      $film->update(request()->all());
      return redirect('/film');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      \App\Model\Film::find($id)->delete();
      return redirect('/film');
  }

  /**
   *  Fonction utiliser pour ajouter le role à film
   */
  public function addRole()
  {
      $film = \App\Model\Film::find(request()->get('idFilm'));

      $film->roles()->save(new \App\Model\Role(['nom' => request()->get('role')]));

      return redirect('/film/'.request()->get('idFilm').'/edit');
  }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function roleToActeur(){

      //Recupere le film en question
      $film = \App\Model\Film::with('roles')
          ->find(request()->get('idFilm'));

      //On recupère l'acteur
      $acteur = \App\Model\Acteur::find(request()->get('acteur_id'));

      //Association du role à l'acteur
      $film->roles()
          ->where('id', request()->get('role_id'))
          ->get()->first()
          ->acteur()->associate($acteur)->save();

      return redirect('/film/'.request()->get('idFilm').'/edit');
  }
  
}

/*
 * ['titre' => $params['titre'],
                         'annee' => $params['annee'],
                         'description' => $params['description'],
       ]
 */

?>