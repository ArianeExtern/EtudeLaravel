@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1 class="text-danger">Listes des films</h1>
        </div>

        <div class="col-md-5">

            <!--Rechercher un film-->
            {!! Form::open(array('method' => 'GET')) !!}
                <div class="form-group">
                    {{Form::text('keyword', 'Recherche par mot clé', ['class' => 'form-control'])}}
                </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            <!--Button Create pour créer un film-->
            {!! Form::open(array('method' => 'GET', 'route' => 'film.create')) !!}
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>

    <!--Affichage de la liste des videos-->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Année</th>
            <th>RETRIEVE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
        @forelse($films as $film)
            <tr>
                <td>{{$film->titre}}</td>
                <td>
                    @forelse($film->categories()->get() as $categorie)
                        <small>{{$categorie->nom." "}}</small>
                    @empty
                        <small>Pas de catégorie.</small>
                    @endforelse
                </td>
                <td>{{$film->annee}}</td>
                <td>
                    {!! Form::open(array('method' => 'GET', 'route' => ['film.show', $film->id])) !!}
                        {!! Form::submit('RETRIEVE', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>

                <td>
                    {!! Form::open(array('method' => 'GET', 'url' => 'film/'.$film->id.'/edit')) !!}
                        {!! Form::submit('EDIT', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>

                <td>
                    {!! Form::open(array('method' => 'DELETE', 'route' => ['film.destroy', $film->id])) !!}
                        {!! Form::submit('DELETE', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-info"><span>No Film.</span></td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!--Affichage des boutons de pagination -->
    {!! $films->render() !!}
@endsection