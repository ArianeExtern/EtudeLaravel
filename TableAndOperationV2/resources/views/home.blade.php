@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!--Formulaire de recherche de film-->
                    <form action="{{url('home/searchFilm')}}" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-info">Rechercher : </h4>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group-lg">
                                    <input type="text" class="form-control" name="keyword" placeholder="Recherche par mot clé" />
                                </div>
                               </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-lg btn-danger">Rechecher</button>
                            </div>
                        </div>
                    </form>

                    <!--Formulaire d'insertion de Film-->
                    <h4 class="text-info">Ajouter un Film :</h4>
                    <form action="{{url('home/postFilm')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <div class="col-md-2">
                                <label for="titre">Titre :</label>
                                <input type="text" class="form-control" name="titre" placeholder="Titre..." />
                            </div>

                            <div class="col-md-3">
                                <label for="categorie">Catégorie :</label>
                                <input type="text" class="form-control" name="categorie" placeholder="Catégorie..." />
                            </div>

                            <div class="col-md-2">
                                <label for="annee">Année :</label>
                                <input type="number" class="form-control" name="annee" placeholder="Année..." />
                            </div>

                            <div class="col-md-3">
                                <label for="description">Description :</label>
                                <textarea class="form-control" name="description" rows="3" cols="40" placeholder="Description"></textarea>
                            </div>

                            <div class="col-md-1">
                                <br/>
                                <button type="submit" class="btn btn-default">Ajouter</button>
                            </div>

                        </div>
                    </form>

                    <!--Affichage de la liste des videos-->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                <a href="{{url('/home/sortFilm?titre')}}">Titre</a>
                            </th>
                            <th>Catégorie</th>
                            <th>
                                <a href="{{url('/home/sortFilm?annee')}}">Année</a>
                            </th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($films as $film)
                            <tr>
                                <td>{{$film->titre}}</td>
                                <td>{{$film->categorie}}</td>
                                <td>{{$film->annee}}</td>
                                <td>{{$film->description}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Film.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {!! $films->render() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
