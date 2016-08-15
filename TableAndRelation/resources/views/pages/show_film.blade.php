@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="col-md-3">
                <img src="http://lorempixel.com/200/200" />
            </div>
            
            <div class="col-md-7">
                <h3 class="text-danger">Titre : <small>{{$film->titre}}</small></h3>
                <label class="text-danger">Année : <small>{{$film->annee}}</small></label> <br/>
                <label class="text-danger">Categories :
                    @forelse($categories as $category)
                        <small>{{$category->nom}} </small>
                    @empty
                        <small>Aucune catégorie.</small>
                    @endforelse
                </label> <br/>

                <label class="text-danger">Roles :
                    @forelse($film->roles()->get() as $role)
                        <small>{{$role->nom}} </small>
                    @empty
                        <small>Aucun role.</small>
                    @endforelse
                </label> <br/>

                <p>
                    {{$film->description}}
                </p>
            </div>
        </div>
    </div>

@endsection