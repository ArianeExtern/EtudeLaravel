@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!--Formulaire de recherche de video-->
                    <form action="/searchVideo" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-info">Rechercher : </h4>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group-lg">
                                    <input type="text" class="form-control" name="keyword" placeholder="Rechercher par mot clé" />
                                </div>
                               </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-lg btn-danger">Rechecher</button>
                            </div>
                        </div>
                    </form>

                    <!--Formulaire d'insertion de video-->
                    <h4 class="text-info">Ajouter une Video :</h4>
                    <form action="postVideo" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">Name :</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" />
                            </div>

                            <div class="col-md-3">
                                <label for="url">URL:</label>
                                <input type="url" class="form-control" name="url" placeholder="Url" />
                            </div>

                            <div class="col-md-2">
                                <label for="duree">Durée :</label>
                                <input type="number" class="form-control" name="duree" placeholder="Duree" />
                            </div>

                            <div class="col-md-3">
                                <label for="description">Description :</label>
                                <textarea class="form-control" name="description" rows="3" cols="40" placeholder="Description"></textarea>
                            </div>

                            <div class="col-md-1">
                                <br/>
                                <button type="submit" class="btn btn-default">Add</button>
                            </div>

                        </div>
                    </form>

                    <!--Affichage de la liste des videos-->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                <a href="{{url('/home/sortVideo?name')}}">Name</a>
                            </th>
                            <th>Url</th>
                            <th>
                                <a href="{{url('/home/sortVideo?duree')}}">Durée</a>
                            </th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($videos as $video)
                            <tr>
                                <td>{{$video->name}}</td>
                                <td>{{$video->url}}</td>
                                <td>{{$video->duree}} min</td>
                                <td>{{$video->description}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No video.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <!--Code affichant les boutons de paginations-->
                    {!! $videos->render() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
